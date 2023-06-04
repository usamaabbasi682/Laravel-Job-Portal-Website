<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin','employee','candidate'];

        for ($i=0; $i < count($roles); $i++) { 
            Role::create(['name' => $roles[$i]]);
        }
    }
}
