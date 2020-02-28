<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 * @property string description
 * @property int activity_id
 * @property int step_id
 */

class Task extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'task_belong_to_activity';

    protected $fillable = [
        'title', 'description', 'activity_id', 'step_id',
    ];

    public function activity(){

        return $this->belongsTo('App\Activity');

    }
}
