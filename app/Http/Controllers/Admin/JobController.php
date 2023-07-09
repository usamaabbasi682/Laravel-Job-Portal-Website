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
use App\Services\Interfaces\JobServiceInterface;

class JobController extends Controller
{
    use ProfileTrait;
    protected $jobService;

    public function __construct(JobServiceInterface $jobService) {
        $this->jobService = $jobService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jobs = $this->jobService->index($request);
        $categories = JobCategory::orderBy('name')->get();
        $jobTypes = $this->job_type();
        $experiences = $this->experience();
        return view('admin.manage_jobs.jobs.index',compact('jobs','categories','jobTypes','experiences'));
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
    public function store(CreateRequest $request)
    {
        $result=$this->jobService->store($request);        
        if ($result){
            return to_route('admin.jobs.index')->with('success','Job has been successfully Added');
        } 
        return to_route('admin.jobs.index')->with('error','Something went wrong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('admin.manage_jobs.jobs.view',compact('job'));
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
    public function update(CreateRequest $request, Job $job)
    {
        $result=$this->jobService->update($request,$job);        
        if ($result){
            return to_route('admin.jobs.index')->with('success','Job has been successfully Updated');
        } 
        return to_route('admin.jobs.index')->with('error','Something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return to_route('admin.jobs.index')->with('error','Job deleted successfully.');
    }

    public function update_job_status(Job $job, $status) {
        $result=$this->jobService->status($job,$status);        
        if ($result){
            return to_route('admin.jobs.index')->with('success','Job Status has been successfully Updated');
        } 
        return to_route('admin.jobs.index')->with('error','Something went wrong!');
    }
}
