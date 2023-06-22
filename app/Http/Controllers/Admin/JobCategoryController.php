<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobCategory\CreateUpdateRequest;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobCategories=JobCategory::orderBy('id','DESC')->get();
        return view('admin.manage_jobs.job_category.index',compact('jobCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage_jobs.job_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUpdateRequest $request)
    {
        try {
            JobCategory::create($request->validated());

            return to_route('admin.jobCategory.index')->with('success','Job Category has been successfully Added');
        } catch (\Exception $e) {
            return to_route('admin.jobCategory.index')->with('error','Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobCategory $jobCategory)
    {
        return view('admin.manage_jobs.job_category.edit',compact('jobCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateUpdateRequest $request, JobCategory $jobCategory)
    {
        try {
            if ($request->has('status'))
            $status = '1';
            else 
            $status = '0';

            $jobCategory->update(['name'=>$request->input('name'),'icon'=>$request->input('icon'),'status'=>$status]);

            return to_route('admin.jobCategory.index')->with('success','Job Category has been successfully Updated');
        } catch (\Exception $e) {
            return to_route('admin.jobCategory.index')->with('error','Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobCategory $jobCategory)
    {
        $jobCategory->delete();
        return to_route('admin.jobCategory.index')->with('error','Job Category deleted successfully.');
    }
}
