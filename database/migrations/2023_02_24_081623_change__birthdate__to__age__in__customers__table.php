<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBirthdateToAgeInCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE customers MODIFY birthdate INT UNSIGNED');
        DB::statement('UPDATE customers SET birthdate = TIMESTAMPDIFF(YEAR, birthdate, CURDATE())');
        DB::statement('ALTER TABLE customers CHANGE birthdate age TINYINT UNSIGNED');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE users CHANGE age birthdate DATE');
    }
}
