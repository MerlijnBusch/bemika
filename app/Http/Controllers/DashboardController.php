<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Dashboard;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use stdClass;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(){

        return view('index');

    }

    public function dashboard(){

        $dashboard = new Dashboard;
        $totalDays = $dashboard->days_in_month(Carbon::now()->month, Carbon::now()->year);
        $monthArray = $dashboard->generateArrayOfAllDaysInMonth($totalDays);

        $plannedActivities = $dashboard->getAllPlannedActivitiesInTimePeriodForUser(Auth::id(), Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());
        $monthArray = $dashboard->fillArrayWithPlannedActivities($monthArray, $plannedActivities);

        return view('dashboard', ['data' => $monthArray]);

    }

    public function month($date){
        $date = $this->makeNewDateObject($date);
        dd($date);
    }

    public function week($date){
        $date = $this->makeNewDateObject($date);
        dd($date);
    }

    public function day($date){
        $date = $this->makeNewDateObject($date);
        dd($date);
    }

    private function makeNewDateObject($date){
        try {
            return new Carbon($date);
        } catch (\Exception $e) {
            abort('500', 'invalid date object');
        }
    }

}
