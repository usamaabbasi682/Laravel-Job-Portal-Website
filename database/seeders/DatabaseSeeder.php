<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            LanguageASkillSeeder::class,
            IndustrySeeder::class,
            JobPlanSeeder::class,
        ]);
        // \App\Models\User::factory(5)->create();

        $users = [
            ['name' => 'Admin','email'=>'admin@test.com','role'=>'admin'],
            ['name' => 'Usama Abbasi','email'=>'usamaabbasi682@gmail.com','role'=>'employee'],
            ['name' => 'Haris','email'=>'haris@gmail.com','role'=>'candidate'],
        ];

        foreach ($users as $user) 
        {
            $result=User::factory()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('12345678')
            ]);
            $result->assignRole($user['role']);
        } 

    }
}
