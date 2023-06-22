<?php

namespace Database\Seeders;

use App\Models\JobPlan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobPlans = [
            [
                'label' => 'Free',
                'currency_symbol' => '$',
                'price' => 0,
                'job_post_limit' => 20,
                'featured_job_post_limit' => 10,
                'highlight_job_post_limit' => 10,
                'profile_view_limitation' => 'limited',
                'cv_view_limit' => 500,
                'display_frontend' => '1',
                'desc' => 'This is the free plan',
            ],
            [
                'label' => 'Basic',
                'currency_symbol' => '$',
                'price' => 20,
                'job_post_limit' => 50,
                'featured_job_post_limit' => 30,
                'highlight_job_post_limit' => 15,
                'profile_view_limitation' => 'limited',
                'cv_view_limit' => 600,
                'display_frontend' => '1',
                'desc' => 'This is the basic plan',
            ],
            [
                'label' => 'Standard',
                'currency_symbol' => '$',
                'price' => 50,
                'job_post_limit' => 60,
                'featured_job_post_limit' => 40,
                'highlight_job_post_limit' => 30,
                'profile_view_limitation' => 'limited',
                'cv_view_limit' => 800,
                'display_frontend' => '1',
                'desc' => 'This is the standard plan',
            ],
            [
                'label' => 'Premium',
                'currency_symbol' => '$',
                'price' => 100,
                'job_post_limit' => 100,
                'featured_job_post_limit' => 70,
                'highlight_job_post_limit' => 60,
                'profile_view_limitation' => 'unlimited',
                'cv_view_limit' => null,
                'display_frontend' => '1',
                'desc' => 'This is the premium plan',
            ]
        ];

        foreach ($jobPlans as $key) {
            JobPlan::create([
                'label' => $key['label'],
                'currency_symbol' => $key['currency_symbol'],
                'price' => $key['price'],
                'job_post_limit' => $key['job_post_limit'],
                'featured_job_post_limit' => $key['featured_job_post_limit'],
                'highlight_job_post_limit' => $key['highlight_job_post_limit'],
                'profile_view_limitation' => $key['profile_view_limitation'],
                'cv_view_limit' => $key['cv_view_limit'],
                'display_frontend' => $key['display_frontend'],
                'desc' => $key['desc'],
            ]);
        }
    }
}
