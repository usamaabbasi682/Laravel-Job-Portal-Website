<?php 

namespace App\Traits;

trait ProfileTrait {

    public function profession() 
    {
        return [
            'Physician',
            'Engineer',
            'Chef',
            'Lawyer',
            'Designer',
            'Labourer',
            'Dentist',
            'Accountant',
            'Dental Hygienist',
            'Actor',
            'Electrician',
            'Software Developer',
            'Technical',
            'Artist',
            'Teacher',
            'Journalist',
            'Cashier',
            'Secretary',
            'Scientist',
            'Soldier',
            'Gardener',
            'Driver',
            'Fisherman',
            'Police Officer',
            'Tailor',
        ];
    }

    public function experience() 
    {
        return [
            'Fresher',
            '1 Year',
            '2 Year',
            '3+ Years',
            '8+ Years',
            '10+ Years',
            '15+ Years'
        ];
    }

    public function job_role() {
        return [
            'Team Leader',
            'Manager',
            'Assistant Manager',
            'Executive',
            'Director',
        ];
    }

    public function education() 
    {
        return [
            'High School',
            'Bachelor Degree',
            'Master Degree',
            'Graduated',
            'PhD',
            'Any',
        ];
    }

    public function gender() 
    {
        return [
            'Male',
            'Female',
            'Other',
        ];
    }

    public function marital_status() 
    {
        return [
            'Married',
            'Single',
        ];
    }
}