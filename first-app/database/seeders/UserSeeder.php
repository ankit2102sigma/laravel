<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=> 'Ankit Arora',
            'email'=>'ankit@gmail.comfs',
            'password'=>Hash::make('Ankit@123')
        ]);
//



        //
    }
}
