<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Dashboard;
use App\Patient;
use App\Rules\ActivityExist;
use App\Task;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
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
        $this->middleware(['auth','verified', 'isUserActive'])->except('index');
    }

    /**
     * @return Factory|RedirectResponse|View
     */
    public function index(){

        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('index');

    }

    /**
     * @return Factory|View
     * @throws Exception
     */
    public function dashboard(){
        $dashboard = new Dashboard;
        $monthArray = $dashboard->generateMonthArray(Carbon::now());
        return view('dashboard', ['data' => $monthArray]);
    }

    /**
     * @param $date
     * @return JsonResponse
     * @throws Exception
     */
    public function month($date){
        $dashboard = new Dashboard;
        $date = $dashboard->parseCarbonDate($date);
        return response()->json($dashboard->generateMonthArray($date));
    }

    /**
     * @param $date
     * @return JsonResponse
     * @throws Exception
     */
    public function week($date){// note future self this per week so that means that 24 / 30 is same week and will put on same place doesnt matter if ur between day 24 - 30
        $dashboard = new Dashboard;
        $weekArray = $dashboard->generateArrayOfAllDaysInWeek();
        $date = $dashboard->parseCarbonDate($date);
        $startOfWeek = $date->copy()->startOfWeek();
        $endOfWeek = $date->copy()->endOfWeek();

        $weekArray = $dashboard->fillArrayWithPlannedActivities($weekArray, $dashboard->getAllPlannedActivitiesInTimePeriodForUser(Auth::id(), $startOfWeek, $endOfWeek), $startOfWeek->day);
        return response()->json($weekArray);
    }

    /**
     * @param $date
     * @return JsonResponse
     */
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

    /**
     * @param $id
     * @return Factory|View
     */
    public function patientProfile($id){
        $patient = Patient::find($id);
        return view('partials.Dashboard.Patient.profile', ['patient' => $patient]);
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function patientTasksFirst($id){
        $patient = Patient::find($id);
        $activities = Activity::all();

        return view('partials.Dashboard.Patient.Tasks.first', ['patient' => $patient, 'activities' => $activities]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function patientTasksPostFirst(Request $request, $id){
        $patient = Patient::find($id);

        $validated = $request->validate([
            'activity_id' => ['required','integer', new ActivityExist],
        ]);

        session(['activity_id' => $validated['activity_id']]);

        return redirect()->route('dashboard.patient.tasks.second', $patient->id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return Factory|View
     */
    public function patientTasksSecond(Request $request, $id){
        $patient = Patient::find($id);
        $activity = Activity::find($request->session()->get('activity_id'));
        $tasks = Task::query()->where('activity_id', $request->session()->get('activity_id'))->orderBy('step_id', 'ASC')->get();

        return view('partials.Dashboard.Patient.Tasks.second', ['patient' => $patient, 'activity' => $activity, 'tasks' => $tasks]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function patientTasksPostSecond(Request $request, $id){

        $validated = $request->validate([
            'tasks' => ['required'],
        ]);

        session(['tasks' => $validated['tasks']]);
        $patient = Patient::find($id);

        return redirect()->route('dashboard.patient.tasks.third', $patient->id);
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function patientTasksThird($id){
        $patient = Patient::find($id);
        return view('partials.Dashboard.Patient.Tasks.third', ['patient' => $patient]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function patientTasksPostThird(Request $request, $id){

        $validated = $request->validate([
            'date' => ['required','date'],
        ]);

        $date = $validated['date'];
        $patient = Patient::find($id);
        $activity = Activity::find($request->session()->get('activity_id'));
        $tasks = $request->session()->get('tasks');

        DB::table('foreign_activity_belongs_to_patient')->insert([
           'planned_date' => $date,
           'activity_id' => $activity->id,
           'patient_id' => $patient->id,
            'created_at' => Carbon::now(),
        ]);

        $insertArray = [];
        foreach ($tasks as $key => $task){
            $tmpArray = [
                'task_id' => $key,
                'activity_id' => $activity->id,
                'created_at' => Carbon::now(),
            ];

            array_push($insertArray, $tmpArray);
        }

        DB::table('task_belong_to_activity')->insert($insertArray);

        return redirect()->route('dashboard');
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function patientCalender($id){
        $patient = Patient::find($id);
        return view('partials.Dashboard.Patient.calender', ['patient' => $patient]);
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function patientSummary($id){
        $patient = Patient::find($id);
        return view('partials.Dashboard.Patient.summary', ['patient' => $patient]);
    }

}
