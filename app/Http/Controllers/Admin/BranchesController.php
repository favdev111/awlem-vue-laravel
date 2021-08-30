<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Branch;
use App\BranchPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;
use App\Order;
use App\Restorant;
use App\User;
use App\Week;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent = new Agent();
        $this->user = Auth::user();
        if ($this->user->hasRole('Super Admin')) {
            $branches = Branch::with('user', 'restorantUserandMeals')->paginate(18);
        } elseif ($this->user->hasRole('Restorant')) {
            $restorantIds = Restorant::select('id')->where('user_id', $this->user->id)->get();
            $branches = Branch::whereIn('restorant_id', array_column($restorantIds->toArray(), 'id'))->with('user', 'restorantUserandMeals')->paginate(18);
        } elseif ($this->user->hasRole('Branch')) {
            $branches = Branch::where('user_id', '=', $this->user->id)->with('user', 'restorantUserandMeals')->paginate(18);
            if ($agent->isMobile() or $agent->isTablet()) {
                return view('admin.branches.mobile_view', ['branches' => $branches]);
            }
        } else {
            return view('forbidden');
        }

        return view('admin.branches.view', ['branches' => $branches]);
    }

    public function ordersCategory($branch_id)
    {
        return view('admin.branches.ordersCategory', ['branch_id' => $branch_id]);
    }

    public function branchOrdersMobile($branch_id, $orders_type)
    {
        $basicConditionsArr[] = ['branch_id', '=', $branch_id];
        switch ($orders_type) {
            case 'pending':
                $orders = Order::where($basicConditionsArr)->where('status', 'submited')->orderBy('updated_at', 'DESC')->paginate(10);
                break;
            case 'working':
                $orders = Order::where($basicConditionsArr)->whereIn('status',['preparing','prepared','arrival'])->orderBy('updated_at', 'DESC')->paginate(10);
                break;
            case 'previous':
                $orders = Order::where($basicConditionsArr)->whereIn('status',['rejected','canceled','done'])->orderBy('updated_at', 'DESC')->paginate(10);
                break;

            default:
                # code...
                break;
        }

        // return $orders;
        return view('admin.orders.branch_orders_mobile', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restorants = Restorant::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $areas = Area::pluck('name', 'id');
        $week = Week::pluck('name', 'id')->all();
        return view('admin.branches.add', ['restorants' => $restorants, 'users' => $users, 'areas' => $areas, 'week' => $week]);
    }

    public function creatBranchFromRestorant($restorantId)
    {
        $users = User::where('parent_restorant', $restorantId)->pluck('name', 'id');
        $user = Auth::user();
        $restorant = Restorant::select('id', 'user_id')->find($restorantId);
        $areas = Area::pluck('name', 'id');
        $week = Week::pluck('name', 'id')->all();
        if ($user->id == $restorant->user_id || $user->hasRole('Super Admin')) {
            return view('admin.branches.creatBranchFromRestorant', ['users' => $users, 'restorantId' => $restorantId, 'areas' => $areas, 'week' => $week]);
        } else {
            return view('forbidden');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  $request->validate(
            [
                'user_id' => 'required',
                'area_id' => 'required',
                'restorant_id' => 'required',
                'name' => 'required',
                'location_name' => 'required',
                'location_lat' => 'required',
                'location_lon' => 'required',
                'open_from' => 'required',
                'open_to' => 'required',
                'description' => 'required'
            ]
        );

        $request->open_dayes = json_encode(array_map('intval', $request->open_dayes));
        $request->eat_in_branch = ($request->eat_in_branch == 'on') ? true : false;
        $request->delever_to_car = ($request->delever_to_car == 'on') ? true : false;
        $branch = Branch::create([
            'user_id' => $request->user_id,
            'area_id' => $request->area_id,
            'restorant_id' => $request->restorant_id,
            'name' => $request->name,
            'location_name' => $request->location_name,
            'location_lat' => $request->location_lat,
            'location_lon' => $request->location_lon,
            'open_from' => $request->open_from,
            'open_to' => $request->open_to,
            'open_dayes' => $request->open_dayes,
            'description' => $request->description,
            'eat_in_branch' => $request->eat_in_branch,
            'delever_to_car' => $request->delever_to_car,
        ]);

        //saving uploaded Images  
        if (session()->exists('files')) {

            for ($i = 0; $i < count(session()->get('files')); $i++) {
                BranchPhoto::create(['branch_id' => $branch->id, 'photo' => 'images/branch/' . session()->get('files')[$i]['file'], 'uuid' => session()->get('files')[$i]['id']]);
            }
            session()->forget('files');
        }

        session()->flash('notif', __('General.added_successfully'));
        if ($request->from_restorant == true) {
            return redirect('admin/restorants/' . $request->restorant_id);
        } elseif ($request->from_restorant == false) {
            return redirect('admin/branches');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch = Branch::with(['user', 'restorantUserandMeals', 'branchPhoto', 'productMeal' => function ($query) {
            $query->orderByDesc('id');
        }])->find($id);
        $meals = Meal::where('restorant_id', '=', $branch->restorant_id)->withCount('product')->get();
        $agent = new Agent();
        if ($agent->isMobile() or $agent->isTablet()) {
            return view('admin.branches.show_mobile', ['branch' => $branch, 'meals' => $meals]);
        }
        // return $branch->productMeal[0]->pivot->available;
        return view('admin.branches.show', ['branch' => $branch, 'meals' => $meals]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $branch = Branch::find($id);
        $hisDays = json_decode($branch->open_dayes);
        $areas = Area::pluck('name', 'id');
        $week = Week::pluck('name', 'id')->all();
        if (Auth::user()->hasRole('Restorant')) {
            $getFrom = 'Restorant';
            $users = User::where('parent_restorant', $branch->restorant_id)->pluck('name', 'id');
            $restorants = [];
        } elseif (Auth::user()->hasRole('Branch')) {
            $getFrom = 'Branch';
            $users = [];
            $restorants = [];
        } else {
            $getFrom = 'Super Admin';
            $users = User::pluck('name', 'id');
            $restorants = Restorant::pluck('name', 'id');
        }
        return view('admin.branches.edit', compact('branch', 'restorants', 'users', 'getFrom', 'areas', 'week', 'hisDays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //TODO Check Valid Date
        $validator =  $request->validate(
            [
                'name'             => 'required',
                'area_id'             => 'required',
                'location_name'            => 'required',
                'location_lat'           => 'required',
                'location_lon'         => 'required',
                'open_from'         => 'required',
                'open_to'         => 'required',
                'description'         => 'required'

            ]
        );

        $request->open_dayes = json_encode(array_map('intval', $request->open_dayes));
        $input = $request->all();
        $input['eat_in_branch'] = ($request->eat_in_branch == "on") ? true : false;
        $input['delever_to_car'] = ($request->delever_to_car == "on") ? true : false;
        // return $input;
        $input['open_dayes'] = $request->open_dayes;
        Branch::find($id)->update($input);
        //saving uploaded Images  
        if (session()->exists('files')) {
            $prevPhotos = BranchPhoto::where('branch_id', $id)->get();
            $uuidArr = [];
            foreach ($prevPhotos as $key => $value) {
                $uuidArr[$key] = $value->uuid;
            }
            for ($i = 0; $i < count(session()->get('files')); $i++) {
                if (!in_array(session()->get('files')[$i]['id'], $uuidArr)) {
                    BranchPhoto::create(['branch_id' => $id, 'photo' => 'images/branch/' . session()->get('files')[$i]['file'], 'uuid' => session()->get('files')[$i]['id']]);
                }
            }
            session()->forget('files');
        }
        if ($request->getFrom == 'Restorant') {
            return redirect('admin/restorants/' . $request->restorant_id);
        } elseif ($request->getFrom == 'Branch') {
            return redirect('admin/branches/' . $id);
        } else {
            return redirect('admin/branches');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Branch::find($id);
        $data->Products()->sync([]);
        BranchPhoto::where('branch_id', '=', $id)->delete();
        Branch::where('id', $id)->delete();
        session()->flash('notif', __('General.deleted_successfully'));
        return redirect('admin/branches');
    }

    public function imageuploads(Request $request)
    {
        $input = $request->all();
        if ($request->file('qqfile')) {
            $file = $request->file('qqfile');
            $photo =  $request->file('qqfile')->getClientOriginalName();
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $name = 'awlem' . time() . '.' . $extension;
            $file->move('images/branch', $name);
            $input['qqfile'] = $name;
            if (session()->exists('files')) {
                session()->push('files', ['file' => $name, 'id' => $request->qquuid]);
            } else {
                session(['files' => [['file' => $name, 'id' => $request->qquuid]]]);
            }
        }
        return  ["success" => true, "imageID" => $request->qquuid]; //{"success": true}';
    }

    public function getuploadedImages($id = null)
    {
        //$d[0] = ['name'=>'15623202131.jpg','uuid'=>'a6ce3c8d-6d41-4d9e-81d0-c3e460853797','thumbnailUrl'=>url('/images/15623202131.jpg')];
        $d = [];
        $data = BranchPhoto::where('branch_id', $id)->get();
        if (count($data)) {
            foreach ($data as $values) {

                $d[] = ['name' => $values->photo, 'uuid' => $values->uuid, 'thumbnailUrl' => url($values->photo)];

                if (session()->exists('files')) {
                    session()->push('files', ['file' => $values->photo, 'id' => $values->uuid]);
                } else {
                    session(['files' => [['file' => $values->photo, 'id' => $values->uuid]]]);
                }
            }
        }
        return $d;
    }

    public function imageuploadsdelete($id, Request $request)
    {
        $temp = [];
        if (session()->exists('files')) {
            $temp = session()->get('files');
            session()->forget('files');
            for ($i = 0; $i < count($temp); $i++) {
                if ($temp[$i]['id'] == $id) {
                    // session()->forget(session()->get('files')[$i]);
                    unset($temp[$i]);
                    continue;
                }
                if (!session()->exists('files')) {
                    session(['files' => [['file' => $temp[$i]['file'], 'id' => $temp[$i]['id']]]]);
                } else {
                    session()->push('files', ['file' => $temp[$i]['file'], 'id' => $temp[$i]['id']]);
                }
            }
            //session(['files'=>$temp]);
        }
        //check if image exits in database
        $image = BranchPhoto::where('uuid', $id)->delete();

        return session()->get('files');
    }

    public function ajaxChangeBusyStatus(Request $request)
    {
        $input['busy'] = (int)$request->status;
        Branch::find($request->branchId)->update($input);
        $branch = Branch::select('busy')->where('id', $request->branchId)->first();
        return $branch;
    }

    public function getBranchesWithPages()
    {
        $user_id = Auth::user()->id;
        $branches = Branch::where('user_id', $user_id)->select('id', 'name')->get();
        foreach ($branches as $key => $value) {
            $ordersCount = Order::where(['branch_id' => $value->id, 'status' => 'submited'])->count();
            $branches[$key]->orders = $ordersCount;
        }
        return $branches;
        // return response()->json(1);
    }

    private function getYearMonths()
    {
        return array('', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
    }
    public function getBranchesDaily()
    {
        $year = date('Y');
        $month = date('n');
        $day = date('j');
        $hour = date('G');

        $prev12HoursHour = date('G', strtotime('-12 hours', strtotime(date("Y-m-d H:i:s"))));

        $months = $this->getYearMonths();

        $BranchesData = [];
        $i = 12;

        do {
            if ($hour < 0) {
                $newYear = date('Y', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));
                $newMonth = date('m', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));
                $newDay = date('j', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));

                $year = $newYear;
                $month = $newMonth;
                $day = $newDay;
                $hour = 23;
            }
            $date = $year . '-' . $month . '-' . $day . ' ' . $hour;
            $Branches = Branch::whereDate('created_at', '=', $date)->count();

            array_unshift($BranchesData, $Branches);
            $hour--;
            $i--;
        } while ($i > 0);

        echo json_encode(compact('BranchesData'));
        exit();
    }
    public function getBranchesMonthly()
    {
        $year = date('Y');
        $month = date('n');
        $currentDay = date('j');

        $months = $this->getYearMonths();

        $day = $currentDay;

        $BranchesData = [];
        $i = 31;
        do {
            if ($day < 1) {
                $newYear = date('Y', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));
                $newMonth = date('n', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));

                $year = $newYear;
                $month = $newMonth;
                $day = date('t', strtotime($year . '-' . $month));
            }
            $Branches = Branch::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->whereDay('created_at', '=', $day)->count();

            $day--;
            array_unshift($BranchesData, $Branches);
            $i--;
        } while ($i > 0);
        echo json_encode(compact('BranchesData'));
        exit();
    }

    public function getBranchesWeekly($type)
    {
        $year = date('Y');
        $month = date('n');
        $day = date('j');

        $months = $this->getYearMonths();

        $lastWeekDay = date('j', strtotime("-8 days"));
        $BranchesData = [];
        $i = 7;
        do {
            if ($day < 1) {
                $newYear = date('Y', strtotime('-1 month', strtotime($year . '-' . $month)));
                $newMonth = date('n', strtotime('-1 month', strtotime($year . '-' . $month)));

                $year = $newYear;
                $month = $newMonth;
                $day = date('t', strtotime($year . '-' . $month));
            }
            $date = $year . '-' . $month . '-' . $day;
            $Branches = Branch::whereDate('created_at', '=', $date)->count();

            array_unshift($BranchesData, $Branches);
            $day--;
            $i--;
        } while ($i > 0);

        echo json_encode(compact('BranchesData'));
        exit();
    }

    public function getBranchesYearly()
    {
        $year = date('Y');
        $currentMonth = date('n');
        $months = $this->getYearMonths();
        $month = $currentMonth;
        $BranchesData = [];
        $i = 12;
        do {
            if ($month < 1) {
                $month = 12;
                $year--;
            }
            $date = $year . '-' . $month;
            $Branches = Branch::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->count();

            array_unshift($BranchesData, $Branches);
            $month--;
            $i--;
        } while ($i > 0);

        echo json_encode(compact('BranchesData'));
        exit();
    }
}
