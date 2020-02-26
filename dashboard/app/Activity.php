<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 * @property string description
 * @property string image_icon
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
        'title', 'description', 'image_icon',
    ];

    public function task(){

        return $this->hasMany('App\Task', 'activity_id');

    }
}
