<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Tag;
use App\Models\Benefit;
use App\Models\Company;
use App\Models\JobRole;
use App\Models\JobCategory;
use App\Traits\ProfileTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Job\CreateRequest;

class JobController extends Controller
{
    use ProfileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.manage_jobs.jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $experiences = $this->experience();
        $jobRoles = JobRole::orderBy('name')->get();
        $educations = $this->education();
        $jobTypes = $this->job_type();
        $companies = Company::orderBy('company_name')->get();
        $categories = JobCategory::orderBy('name')->get();
        $tags = Tag::orderBy('id','DESC')->get();
        $benefits = Benefit::orderBy('id','DESC')->get();
        return view('admin.manage_jobs.jobs.create',compact(
            'companies','experiences','jobRoles','educations','categories','tags','benefits','jobTypes',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    // CreateRequest
    public function store(Request $request)
    {
        try {
            if ($request->input('salary_details') == 'salary_range') {
                $salaryDetails = [
                    'job_feature_type' => 'salary_range',
                    'min_salary' => $request->input('min_salary_range'),
                    'max_salary' => $request->input('max_salary_range'),
                ];
            } else {
                $salaryDetails = [
                    'job_feature_type' => 'custom_salary',
                    'custom_salary' => $request->input('custom_salary'),
                ];
            }
    
            if($request->input('receive_applications') == 'Email-Address') {
                $r_a = json_encode([
                    'receive_application_type' => 'Email-Address',
                    'email' => $request->input('email'),
                ]);
            } elseif($request->input('receive_applications') == 'Custom-URL') {
                $r_a = json_encode([
                    'receive_application_type' => 'Custom-URL',
                    'apply_url' => $request->input('apply_url'),
                ]);
            } else {
                $r_a = null;
            }
    
            $job = Job::create([
                'company_id' => $request->input('company'),
                'job_category_id' => $request->input('category'),
                'job_role_id' => $request->input('job_role'),
                'title' => $request->input('title'),
                'vacancies' => $request->input('vacancies'),
                'deadline' => $request->input('deadline'),
                'salary_details' => json_encode($salaryDetails),
                'salary_type' => $request->input('salary_type'),
                'country' => $request->input('country'),
                'location' => $request->input('location'),
                'applicant' => $r_a,
                'job_feature' => $request->input('jobfeature'),
                'experience' => $request->input('experience'),
                'education' => $request->input('education'),
                'job_type' => $request->input('job_type'),
                'description' => $request->input('bio'),
            ]);   
    
            if (!empty($request->input('tags'))) {
                $job->tags()->attach($request->input('tags'));
            }
    
            if (!empty($request->input('benefit'))) {
                $job->benefits()->attach($request->input('benefit'));
            }
    
            return to_route('admin.jobs.index')->with('success','Job has been successfully Added');
        } catch (\Exception $e) {
            return to_route('admin.jobs.index')->with('error','Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.manage_jobs.jobs.view');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $experiences = $this->experience();
        $jobRoles = JobRole::orderBy('name')->get();
        $educations = $this->education();
        $jobTypes = $this->job_type();
        $companies = Company::orderBy('company_name')->get();
        $categories = JobCategory::orderBy('name')->get();
        $tags = Tag::orderBy('id','DESC')->get();
        $benefits = Benefit::orderBy('id','DESC')->get();
        return view('admin.manage_jobs.jobs.edit',compact(
            'job','companies','experiences','jobRoles','educations','categories','tags','benefits','jobTypes',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
