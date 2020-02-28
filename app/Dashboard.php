<?php

namespace App;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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

    /**
     * @param $array
     * @param $plannedActivities
     * @param int $weekInt
     * @return false|string
     * @throws Exception
     */
    public function fillArrayWithPlannedActivities($array, $plannedActivities, $weekInt = 0){
        foreach ($plannedActivities as $plannedActivity){
            $day = (substr(explode("-", new Carbon($plannedActivity->planned_date))[2], 0, 2) - $weekInt);
            $tmpObject = new stdClass();
            $tmpObject->planned_date = $plannedActivity->planned_date;
            $tmpObject->activity = Activity::find($plannedActivity->activity_id);
            $tmpObject->patient = Patient::find($plannedActivity->patient_id);
            array_push($array[$day], $tmpObject);
        }

        return json_encode($array, true);
    }

    /**
     * @param $date
     * @return false|string
     * @throws Exception
     */
    public function generateMonthArray(Carbon $date){
        $startOfMonth = $date->copy()->startOfMonth();
        $endOfMonth = $date->copy()->endOfMonth();
        $totalDays = $this->days_in_month($date->month, $date->year);
        $monthArray = $this->generateArrayOfAllDaysInMonth($totalDays);

        $plannedActivities = $this->getAllPlannedActivitiesInTimePeriodForUser(Auth::id(), $startOfMonth, $endOfMonth);
        return $this->fillArrayWithPlannedActivities($monthArray, $plannedActivities);
    }

    /**
     * @param $date
     * @return Carbon
     */
    public function parseCarbonDate($date){
        try {
            return Carbon::parse(date_create($date));
        } catch (Exception $e) {
            abort('500');
        }
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
}
