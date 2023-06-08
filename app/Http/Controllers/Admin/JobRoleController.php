<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobRoles=JobRole::orderBy('id','DESC')->get();
        return view('admin.manage_jobs.job_role.index',compact('jobRoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage_jobs.job_role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=$request->validate(['name'=>'required']);
        try {
            JobRole::create($validator);
            return to_route('admin.jobRole.index')->with('success','Job Role has been successfully Added');
        } catch (\Exception $e) {
            return to_route('admin.jobRole.index')->with('error','Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobRole $jobRole)
    {
        return view('admin.manage_jobs.job_role.edit',compact('jobRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobRole $jobRole)
    {
        $validator=$request->validate(['name'=>'required']);
        try {
            $jobRole->update($validator);
            return to_route('admin.jobRole.index')->with('success','Job Role has been successfully Updated');
        } catch (\Exception $e) {
            return to_route('admin.jobRole.index')->with('error','Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobRole $jobRole)
    {
        $jobRole->delete();
        return to_route('admin.jobRole.index')->with('error','Job Role deleted successfully.');
    }
}
