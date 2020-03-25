<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->where('email','amine.hatar@gmail.com')->first();
        if(!$users){
            User::create([
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('123456789'),
                'role'=>'admin'
            ]);
        }
    }
}
