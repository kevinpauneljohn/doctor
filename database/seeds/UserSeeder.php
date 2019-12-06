<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->firstname = "john kevin";
        $user->middlename = "pama";
        $user->lastname = "paunel";
        $user->username = "kevinpauneljohn";
        $user->email = "johnkevinpaunel@gmail.com";
        $user->password = bcrypt('123');
        $user->mobileNo ='09166520817';
        $user->address ='blk 141 lot 2, Bulaon Resettlement, City Of San Fernando, Pampanga';
        $user->status = "offline";

        $user->save();
    }
}