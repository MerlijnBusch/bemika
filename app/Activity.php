<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 * @property string description
 * @property string image
 */

class Activity extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activity';

    protected $fillable = [
        'title', 'description', 'image',
    ];

    public function plannedActivities(){

        return $this->hasMany('App\PlannedActivities', 'activity_id');

    }
}
