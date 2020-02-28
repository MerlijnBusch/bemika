<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlannedActivities extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'foreign_activity_belongs_to_patient';

    protected $fillable = [
        'planned_date', 'activity_id', 'patient_id',
    ];

    public function patient(){

        return $this->belongsTo('App\Patient');

    }

    public function activity(){

        return $this->belongsTo('App\Activity');

    }
}
