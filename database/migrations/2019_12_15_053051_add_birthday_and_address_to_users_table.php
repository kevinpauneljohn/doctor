<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBirthdayAndAddressToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('birthday')->after('landline')->nullable();
            $table->integer('refregion')->after('address')->nullable();
            $table->integer('refprovince')->after('refregion')->nullable();
            $table->integer('refcitymun')->after('refprovince')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['birthday','refregion','refprovince','refcitymun']);
        });
    }
}
