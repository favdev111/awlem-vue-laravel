<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;
use App\Restorant;
use App\Role;
use App\Type;
use App\User;
use App\Week;
use Illuminate\Support\Facades\Auth;

class RestorantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('Super Admin')) {
            $restorants = Restorant::with('user', 'category')->paginate(10);
        } elseif ($user->hasRole('Restorant')) {
            $restorants = Restorant::where('user_id', Auth::user()->id)->with('user', 'category')->paginate(10);
        } else {
            return view('forbidden');
        }

        // return $restorants;
        return view('admin.restorants.view', ['restorants' => $restorants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('parent_restorant', 0)->where('id', '!=', 7)->pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        $types = Type::pluck('name', 'id')->all();
        $areas = Area::pluck('name', 'id')->all();

        $regionsWithArea = Region::with(array('area' => function ($query) {
            $query->select('id', 'region_id', 'name');
        }))->select('id', 'name')->get();
        // return $regionsWithArea;
        $newreAreaArr = [];
        $newreRegionArr = [];
        foreach ($regionsWithArea as $key => $value) {
            if (count($value->area) > 0) {
                foreach ($value->area as $key2 => $value2) {
                    $newreAreaArr[$key][$value2['id']] = $value2['name'];
                }
            } else {
                $newreAreaArr[$key] = [];
            }
            $newreRegionArr[$value['name']] = $newreAreaArr[$key];
        }
        return view('admin.restorants.add', ['users' => $users, 'categories' => $categories, 'types' => $types, 'areas' => $areas, 'newreRegionArr' => $newreRegionArr]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validator =  $request->validate(
            [
                'name' => 'required',
                'user_id' => 'required',
                'category_id' => 'required',
                'photo'    => 'required|max:10000|mimes:jpg,jpeg,png',

            ]
        );
        $input = $request->all();
        $request->featured = ($request->featured == 'on') ? true : false;
        $request->accepted = ($request->accepted == 'on') ? true : false;
        if ($request->file('photo')) {
            $photo =  $request->file('photo')->getClientOriginalName();
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $name = 'awlem' . time() . '.' . $extension;
            $input['photo'] = $name;
        }
        $featured_meals = implode(' , ', $request->featured_meals);

        $restorant = Restorant::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'featured' => $request->featured,
            'accepted' => $request->accepted,
            'featured_meals' => $featured_meals,
            'photo' => $input['photo']
        ]);
        $restorant->types()->sync($request->types);
        $restorant->areas()->sync($request->areas);
        $restorant->photo = 'images/restorant/' . $restorant->id . '/photo/' . $input['photo'];
        $restorant->save();
        if ($request->file('photo')) {
            $request->file('photo')->move('images/restorant/' . $restorant->id . '/photo', $input['photo']);
        }
        session()->flash('notif', __('General.added_successfully'));
        return redirect('admin/restorants');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restorant = Restorant::with('types', 'areas', 'branch', 'user', 'category', 'types', 'productMeal', 'meal')->find($id);
        $restorantEmployees = User::select('id', 'parent_restorant', 'name')->where('parent_restorant', $restorant->id)->get();
        $user = Auth::user();
        if ($restorant->user_id == $user->id  || $user->hasRole('Super Admin')) {
            return view('admin.restorants.show', ['restorant' => $restorant, 'restorantEmployees' => $restorantEmployees]);
        } else {
            return view('forbidden');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('hasAdminAccess', 'true')->pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        $types = Type::pluck('name', 'id')->all();
        $regionsWithArea = Region::with(array('area' => function ($query) {
            $query->select('id', 'region_id', 'name');
        }))->select('id', 'name')->get();
        $newreAreaArr = [];
        $newreRegionArr = [];
        foreach ($regionsWithArea as $key => $value) {
            if (count($value->area) > 0) {
                foreach ($value->area as $key2 => $value2) {
                    $newreAreaArr[$key][$value2['id']] = $value2['name'];
                }
            } else {
                $newreAreaArr[$key] = [];
            }
            $newreRegionArr[$value['name']] = $newreAreaArr[$key];
        }
        $restorant = Restorant::find($id);
        $restorantTypes = $restorant->types->pluck('id', 'id')->all();
        $restorantAreas = $restorant->areas->pluck('id', 'id')->all();
        return view('admin.restorants.edit', compact('restorant', 'users', 'categories', 'types', 'restorantTypes', 'newreRegionArr', 'restorantAreas'));
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
        $validator =  $request->validate(
            [
                'name' => 'required',
                'user_id' => 'required',
                'category_id' => 'required',

            ]
        );
        $data = Restorant::find($id);
        $input = $request->all();
        if ($request->file('photo')) {
            $photo =  $request->file('photo')->getClientOriginalName();
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $name = 'awlem' . time() . '.' . $extension;
            $input['photo'] = 'images/restorant/' . $id . '/photo/' . $name;
            $request->file('photo')->move('images/restorant/' . $id . '/photo', $name);
        } else {
            $input['photo'] = $data->photo;
        }
        if (Auth::user()->hasRole('Super Admin')) {
            $data->featured = ($request->featured == 'on') ? true : false;
        }
        $data->accepted = ($request->accepted == 'on') ? true : false;
        $featured_meals = implode(' , ', $request->featured_meals);
        $data->featured_meals        = $featured_meals;
        $data->name        = $request->name;
        $data->user_id        = $request->user_id;
        $data->category_id        = $request->category_id;
        $data->photo        =  $input['photo'];
        // return $data;
        $data->save();
        $data->types()->sync($request->types);
        $data->areas()->sync($request->areas);
        session()->flash('notif', __('General.modified_successfully'));
        return redirect('admin/restorants');
    }

    public function updatePriority(Request $request, $id)
    {
        $data = Restorant::find($id);
        $data->priority        = $request->priority;
        $data->save();
        session()->flash('notif', __('General.modified_successfully'));
        return redirect('admin/restorants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Restorant::find($id);
        $data->types()->sync([]);
        $data->areas()->sync([]);
        Restorant::where('id', $id)->delete();
        session()->flash('notif', __('General.deleted_successfully'));
        return redirect('admin/restorants');
    }

    private function getYearMonths()
    {
        return array('', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
    }
    public function getRestorantsDaily()
    {
        $year = date('Y');
        $month = date('n');
        $day = date('j');
        $hour = date('G');

        $prev12HoursHour = date('G', strtotime('-12 hours', strtotime(date("Y-m-d H:i:s"))));

        $months = $this->getYearMonths();

        $RestorantsData = [];
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
            $Restorants = Restorant::whereDate('created_at', '=', $date)->count();

            array_unshift($RestorantsData, $Restorants);
            $hour--;
            $i--;
        } while ($i > 0);

        echo json_encode(compact('RestorantsData'));
        exit();
    }
    public function getRestorantsMonthly()
    {
        $year = date('Y');
        $month = date('n');
        $currentDay = date('j');

        $months = $this->getYearMonths();

        $day = $currentDay;

        $RestorantsData = [];
        $i = 31;
        do {
            if ($day < 1) {
                $newYear = date('Y', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));
                $newMonth = date('n', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));

                $year = $newYear;
                $month = $newMonth;
                $day = date('t', strtotime($year . '-' . $month));
            }
            $Restorants = Restorant::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->whereDay('created_at', '=', $day)->count();

            $day--;
            array_unshift($RestorantsData, $Restorants);
            $i--;
        } while ($i > 0);
        echo json_encode(compact('RestorantsData'));
        exit();
    }

    public function getRestorantsWeekly($type)
    {
        $year = date('Y');
        $month = date('n');
        $day = date('j');

        $months = $this->getYearMonths();

        $lastWeekDay = date('j', strtotime("-8 days"));
        $RestorantsData = [];
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
            $Restorants = Restorant::whereDate('created_at', '=', $date)->count();

            array_unshift($RestorantsData, $Restorants);
            $day--;
            $i--;
        } while ($i > 0);

        echo json_encode(compact('RestorantsData'));
        exit();
    }

    public function getRestorantsYearly()
    {
        $year = date('Y');
        $currentMonth = date('n');
        $months = $this->getYearMonths();
        $month = $currentMonth;
        $RestorantsData = [];
        $i = 12;
        do {
            if ($month < 1) {
                $month = 12;
                $year--;
            }
            $date = $year . '-' . $month;
            $Restorants = Restorant::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->count();

            array_unshift($RestorantsData, $Restorants);
            $month--;
            $i--;
        } while ($i > 0);

        echo json_encode(compact('RestorantsData'));
        exit();
    }
}
