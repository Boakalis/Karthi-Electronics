<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::where('id',1)->doesntexist()){
            User::create([
                'name' => 'Karthick',
                'email' =>  'admin@karthikelectronics.in',
                'password' => bcrypt('12345678'),
                'user_type' => 1,
            ]);
        }
    }
}
