<?php

use App\Patient;
use App\Task;
use App\User;
use App\Activity;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AddFakeDataToDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function up()
    {
        if(env('APP_DEBUG') && env('APP_STATUS') == 'dev'){
            Log::debug('debug is true and adding fake data to database');

            //Create fake user begeleider
            $user = new User;
            $user->name = 'Johan';
            $user->email = 'Johan@example.com';
            $user->password = Hash::make('password');
            $user->email_verified_at = Carbon::now();
            $user->active = true;
            $user->payment_id = 0;
            $user->save();

            //create fake activities for patient
            for($i = 0; $i < 3; $i++){
                $activity = new Activity;
                $activity->title = 'some Activity title ' . $i;
                $activity->description = 'nce the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset she';
                $activity->image = 'some_icon';
                $activity->save();
            }

            //create fake patient
            for($i = 0; $i < 4; $i++){
                $activity = new Patient;
                $activity->name = 'some Patient name ' . $i;
                $activity->color_code = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);;
                $activity->user_id = 1;
                $activity->save();
            }

            //create fake task for activities
            for($i = 0; $i < 40; $i++){
                $task = new Task;
                $task->title = 'some Step title ' . $i;
                $task->description = 'nce the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset she';
                $task->step_id = $i;
                $task->activity_id = random_int(1,3);
                $task->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
