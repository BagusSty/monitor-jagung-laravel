<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "username"=> "admin123",
            "password"=> bcrypt("admin123"),
            "role"=> 1,
            "created_at"=> Carbon::now()->format("Y-m-d H:i:s"),
        ]);
    }
}
