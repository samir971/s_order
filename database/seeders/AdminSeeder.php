<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name'=>'samir',
                'email'=>'samir@gmail.com',
                'mobile'=>'0993355888',
                'password'=>Hash::make('123456789'),
                'type'=>'admin',
                'active'=>true,
                'package_id'=>null,
                'area_id'=>null,
                'Expire'=>null,
                'notes'=>null,
                'address'=>'hama',
                'uuid'=>(string) Str::uuid(),

                
            ]
        );
    }
}
