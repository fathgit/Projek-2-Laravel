<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'Fathan',
            'email'=>'fathan@gmail.com',
            'password'=>'$2y$12$0wgCjEK91.9WbGss3h1.R.y1xkuUCjpP2B1rv3Gi392e7CHVE5Ga2',
            'level'=>'admin',
        ]);
    }
}
