<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $users=[
			['name'=>'Admin','mobile'=>'8978456525','role_id'=>1,'email'=>'admin@gmail.com','password'=>Hash::make('abcd1234'),'created_at'=>Carbon::now()],
		];
		foreach($users as $user){
			DB::table('users')->insert($user);
		}
    }
}
