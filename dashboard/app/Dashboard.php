<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{

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

    public function generateArrayOfAllDaysInMonth($totalDays){
        $monthArray = [];
        for($i = 0; $i < $totalDays; $i++){
            $monthArray[] = $day[$i] = [];
        }

        return $monthArray;
    }

    public function generateArrayOfAllDaysInWeek(){
        $weekArray = [];
        for($i = 0; $i < 7; $i++){
            $weekArray[] = $day[$i] = [];
        }

        return $weekArray;
    }

    public function days_in_month($month, $year){
        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }

    public function getWeekStartAndEndDate($date) {
        $date = new Carbon($date);

        $week = new \stdClass();
        $week->start = $date->startOfWeek();
        $week->end = $week->start->copy()->endOfWeek();

        return $week;
    }
}
