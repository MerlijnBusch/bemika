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
        $monthArray = $dashboard->generateMonthArray(Carbon::now());
        return view('dashboard', ['data' => $monthArray]);
    }

    public function month($date){
        $dashboard = new Dashboard;
        $date = $dashboard->parseCarbonDate($date);
        return response()->json($dashboard->generateMonthArray($date));
    }

    public function week($date){// note future self this per week so that means that 24 / 30 is same week and will put on same place doesnt matter if ur between day 24 - 30
        $dashboard = new Dashboard;
        $weekArray = $dashboard->generateArrayOfAllDaysInWeek();
        $date = $dashboard->parseCarbonDate($date);
        $startOfWeek = $date->copy()->startOfWeek();
        $endOfWeek = $date->copy()->endOfWeek();

        $weekArray = $dashboard->fillArrayWithPlannedActivities($weekArray, $dashboard->getAllPlannedActivitiesInTimePeriodForUser(Auth::id(), $startOfWeek, $endOfWeek), $startOfWeek->day);
        return response()->json($weekArray);
    }

    public function day($date){
        $dashboard = new Dashboard;
        $date = $dashboard->parseCarbonDate($date);

        $startOfDay = $date->copy()->startOfDay();
        $endOfDay = $date->copy()->endOfDay();

        $plannedActivities = $dashboard->getAllPlannedActivitiesInTimePeriodForUser(Auth::id(), $startOfDay, $endOfDay);

        $activities = array();
        foreach ($plannedActivities as $plannedActivity){
            $tmpObject = new stdClass();
            $tmpObject->planned_date = $plannedActivity->planned_date;
            $tmpObject->activity = Activity::find($plannedActivity->activity_id);
            $tmpObject->patient = Patient::find($plannedActivity->patient_id);
            array_push($activities, $tmpObject);
        }

        return response()->json(json_encode($activities, true));
    }

}
