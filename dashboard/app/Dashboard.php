<?php

namespace App;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class Dashboard extends Model
{
    /**
     * @param $userId
     * @param $startOfTimePeriod
     * @param $endOfTimePeriod
     * @return mixed
     */
    public function getAllPlannedActivitiesInTimePeriodForUser($userId, $startOfTimePeriod, $endOfTimePeriod){
        $patientIds = Patient::all()
            ->where('user_id', $userId)
            ->pluck('id')
            ->toArray();
        return PlannedActivities::whereIn('patient_id', $patientIds)
            ->where('planned_date', '>', $startOfTimePeriod)
            ->where('planned_date', '<', $endOfTimePeriod)
            ->orderBy('planned_date', 'ASC')
            ->get();
    }

    public function fillArrayWithPlannedActivities($monthArray, $plannedActivities){
        foreach ($plannedActivities as $plannedActivity){
            $day = substr(explode("-", new Carbon($plannedActivity->planned_date))[2], 0, 2);
            $tmpObject = new stdClass();
            $tmpObject->planned_date = $plannedActivity->planned_date;
            $tmpObject->activity = Activity::find($plannedActivity->activity_id);
            $tmpObject->patient = Patient::find($plannedActivity->patient_id);
            array_push($monthArray[$day], $tmpObject);
        }

        return json_encode($monthArray, true);
    }

    /**
     * @param $totalDays
     * @return array
     */
    public function generateArrayOfAllDaysInMonth($totalDays){
        $monthArray = [];
        for($i = 0; $i < $totalDays; $i++){
            $monthArray[] = $day[$i] = [];
        }

        return $monthArray;
    }

    /**
     * @return array
     */
    public function generateArrayOfAllDaysInWeek(){
        $weekArray = [];
        for($i = 0; $i < 7; $i++){
            $weekArray[] = $day[$i] = [];
        }

        return $weekArray;
    }

    /**
     * @param $month
     * @param $year
     * @return int
     */
    public function days_in_month($month, $year){
        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }

    /**
     * @param $date
     * @return stdClass
     * @throws Exception
     */
    public function getWeekStartAndEndDate($date) {
        $date = new Carbon($date);

        $week = new stdClass();
        $week->start = $date->startOfWeek();
        $week->end = $week->start->copy()->endOfWeek();

        return $week;
    }
}
