<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Dashboard;
use App\Patient;
use App\PlannedActivities;
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

    public function overview(){

        $dashboard = new Dashboard;
        $totalDays = $dashboard->days_in_month(Carbon::now()->month, Carbon::now()->year);
        $monthArray = $dashboard->generateArrayOfAllDaysInMonth($totalDays);

        $plannedActivities = $dashboard->getAllPlannedActivitiesInTimePeriodForUser(Auth::id(), Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());

        foreach ($plannedActivities as $plannedActivity){
            $day = substr(explode("-", new Carbon($plannedActivity->planned_date))[2], 0, 2);
            $tmpObject = new stdClass();
            $tmpObject->planned_date = $plannedActivity->planned_date;
            $tmpObject->activity = Activity::find($plannedActivity->activity_id);
            $tmpObject->patient = Patient::find($plannedActivity->patient_id);
            array_push($monthArray[$day], $tmpObject);
        }

        return view('overview', ['data' => $monthArray]);

    }

}
