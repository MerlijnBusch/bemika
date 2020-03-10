<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddPaymentOptionsToDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('payment_options')->insert([
            ['id' => 0, 'title' => 'Default'],
            ['id' => 1, 'title' => 'Premium'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('database', function (Blueprint $table) {
            //
        });
    }
}
