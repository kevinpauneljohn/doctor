<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReceiverTerminalColumnToThresholdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thresholds', function (Blueprint $table) {
            $table->uuid('receiver_terminal')->after('action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thresholds', function (Blueprint $table) {
            $table->dropColumn('receiver_terminal');
        });
    }
}
