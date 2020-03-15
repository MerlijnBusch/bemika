<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 * @property string description
 * @property int step_id
 * @property int activity_id
 */

class Task extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'task';

    protected $fillable = [
        'title', 'description', 'step_id', 'activity_id'
    ];

    public function activity(){

        //

    }
}
