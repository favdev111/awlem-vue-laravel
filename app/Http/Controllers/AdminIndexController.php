<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Product;
use App\Vehicle;
use App\Brand;
use App\Article;
use App\Complaint;
use App\Notifications\UserCreated;
use App\Order;
use App\Restorant;
use App\User;

class AdminIndexController extends Controller
{

    public function index(Request $request)
    {
        if (isset($_GET['lang'])) {
            if ($_GET['lang'] == 'ar') {
                $request->session()->put('language', 1);
                //$this->language = 1; 
                App::setLocale('ar');
            } else {
                $request->session()->put('language', 2);
                //$this->language = 1; 
                App::setLocale('en');
            }

            return redirect($_SERVER['HTTP_REFERER']);
        }
        $retorants_pending =  Restorant::where('accepted', false)->with('user', 'category')->orderByRaw('updated_at DESC')->limit(10)->get();
        $last_orders = Order::orderByRaw('updated_at DESC')->limit(10)->get();
        $last_complaints = Complaint::with('user')->orderByRaw('updated_at DESC')->limit(10)->get();
        // return $last_complaints;
        return view('admin.index.index', compact('retorants_pending', 'last_orders', 'last_complaints'));
    }

    public function forbidden()
    {
        return view('forbidden');
    }

    private function getYearMonths()
    {
        return array('', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
    }
    private function getDailyChartLabels($year, $month, $day, $hour)
    {
        $currentYear = date('Y');
        $currentMonth = date('n');
        $currentDay = date('j');

        $prev12HoursYear = date('Y', strtotime('-12 hours', strtotime(date("Y-m-d H:i:s"))));
        $prev12HoursMonth = date('n', strtotime('-12 hours', strtotime(date("Y-m-d H:i:s"))));
        $prev12HoursDay = date('j', strtotime('-12 hours', strtotime(date("Y-m-d H:i:s"))));
        $prev12HoursHour = date('G', strtotime('-12 hours', strtotime(date("Y-m-d H:i:s"))));

        $label = '';
        $months = $this->getYearMonths();

        if ($hour == 0) {
            $hour = 12 . 'AM';
        } else if ($hour > 0 && $hour < 12) {
            $hour = $hour . 'AM';
        } else if ($hour == 12) {
            $hour = $hour . 'PM';
        } else if ($hour > 12) {
            $hour -= 12;
            $hour = $hour . 'PM';
        }

        if ($currentYear == $prev12HoursYear) {
            if ($currentMonth == $prev12HoursMonth) {
                if ($currentDay == $prev12HoursDay) {
                    $label = $hour;
                } else {
                    $dayName = date('D', strtotime($year . '-' . $month . '-' . $day));
                    $label = $dayName . ' at ' . $hour;
                }
            } else {
                $label = $month . '-' . $day . ' at ' . $hour;
            }
        } else {
            $label = "$months[$month] $day $year at $hour";
        }
        return $label;
    }

    public function getLabelsYearly()
    {
        $year = date('Y');
        $currentMonth = date('n');

        $months = $this->getYearMonths();
        $month = $currentMonth;

        $labels = [];
        $i = 12;
        do {
            if ($month < 1) {
                $month = 12;
                $year--;
            }

            array_unshift($labels, $months[$month--] . ' ' . $year);
            $i--;
        } while ($i > 0);

        echo json_encode(compact('labels'));
        exit();
    }

    public function getLabelsMonthly(Request $request)
    {

        $year = date('Y');
        $month = date('n');
        $currentDay = date('j');
        $months = $this->getYearMonths();
        $day = $currentDay;
        $labels = [];
        $i = 31;
        do {
            if ($day < 1) {
                $newYear = date('Y', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));
                $newMonth = date('n', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));

                $year = $newYear;
                $month = $newMonth;
                $day = date('t', strtotime($year . '-' . $month));
            }

            $label = $months[$month] . ' ' . $day--;

            array_unshift($labels, $label);
            $i--;
        } while ($i > 0);

        echo json_encode(compact('labels'));
        exit();
    }

    public function getLabelsWeekly()
    {
        $currentYear = date('Y');
        $month = date('n');
        $day = date('j');

        $months = $this->getYearMonths();

        $lastWeekYear = date('Y', strtotime("-8 days"));
        $lastWeekDay = date('j', strtotime("-8 days"));

        $labels = [];
        $year = $currentYear;

        $data = [];
        $i = 7;
        do {
            if ($day < 1) {
                $newYear = date('Y', strtotime('-1 month', strtotime($year . '-' . $month)));
                $newMonth = date('n', strtotime('-1 month', strtotime($year . '-' . $month)));

                $year = $newYear;
                $month = $newMonth;
                $day = date('t', strtotime($year . '-' . $month));
            }

            if ($currentYear == $lastWeekYear) {
                $label = $months[$month] . ' ' . $day;
            } else {
                $label = "$year $months[$month] $day";
            }

            array_unshift($labels, $label);
            $day--;
            $i--;
        } while ($i > 0);

        echo json_encode(compact('labels'));
        exit();
    }

    public function getLabelsDaily()
    {
        $year = date('Y');
        $month = date('n');
        $day = date('j');
        $hour = date('G');

        $prev12HoursHour = date('G', strtotime('-12 hours', strtotime(date("Y-m-d H:i:s"))));

        $months = $this->getYearMonths();



        $labels = [];
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
            $label = $this->getDailyChartLabels($year, $month, $day, $hour);

            array_unshift($labels, $label);
            $hour--;
            $i--;
        } while ($i > 0);
        // pr($labels)
        echo json_encode(compact('labels'));
        exit();
    }
}
