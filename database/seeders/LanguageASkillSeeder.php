<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguageASkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = ['English','Urdu','Hindi'];

        for ($i=0; $i < count($languages); $i++) { 
            Language::create([
                'name' => $languages[$i],
            ]);
        }

        $skills = ['Html','Css','Php','Laravel','Javascript','Bootstrap','.Net','React','Vue.js','Alpine.js'];
        for ($i=0; $i < count($skills); $i++) { 
            Skill::create([
                'name' => $skills[$i],
            ]);
        }
    }
}
