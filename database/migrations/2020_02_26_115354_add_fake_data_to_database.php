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
            $firstUser = new User;
            $firstUser->name = 'Johan';
            $firstUser->email = 'Johan@example.com';
            $firstUser->password = Hash::make('password');
            $firstUser->save();

            $secondUser = new User;
            $secondUser->name = 'Michail';
            $secondUser->email = 'Michail@example.com';
            $secondUser->password = Hash::make('password');
            $secondUser->save();

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
                $activity->user_id = random_int(1,2);
                $activity->save();
            }

            //create fake task for activities
            for($i = 0; $i < 12; $i++){
                $task = new Task;
                $task->title = 'some Step title ' . $i;
                $task->description = 'nce the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset she';
                $task->activity_id = random_int(1,3);
                $task->step_id = $i;
                $task->save();
            }

            //generate fake relations
            for($i = 0; $i < 8; $i++){ // optimize this code
                DB::table('foreign_activity_belongs_to_patient')->insert([
                    'activity_id' => random_int(1,3), 'patient_id' => random_int(1,4), 'planned_date' => Carbon::now()->subMinutes(rand(1, 55))
                ]);
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
