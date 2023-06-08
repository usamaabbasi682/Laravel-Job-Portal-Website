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

    public function organization_type() 
    {
        return [
            'Government',
            'Semi Government',
            'Public',
            'Private',
            'NGO',
            'International Agencies',
        ];
    }

    public function team_size() 
    {
        return [
            'Only Me',
            '10 Members',
            '10-20 Members',
            '20-50 Members',
            '50-100 Members',
            '100-200 Members',
            '200-500 Members',
            '500+ Members',
        ];
    }

}