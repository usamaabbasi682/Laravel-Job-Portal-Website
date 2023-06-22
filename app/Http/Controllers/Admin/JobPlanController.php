<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobPlan\CreateRequest;

class JobPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobPlans = JobPlan::orderBy('id','ASC')->get();
        return view('admin.manage_jobs.price_plan.index',compact('jobPlans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage_jobs.price_plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        try {
            JobPlan::create([
                'label' => $request->input('label'),
                'currency_symbol' => $request->input('currency_symbol'),
                'price' => $request->input('price'),
                'job_post_limit' => $request->input('post_limit'),
                'featured_job_post_limit' => $request->input('featured_post_limit'),
                'highlight_job_post_limit' => $request->input('highlighted_post_limit'),
                'profile_view_limitation' => $request->input('view_limit'),
                'cv_view_limit' => $request->input('cv_preview_limit'),
                'display_frontend' => $request->input('show_frontend'),
                'desc' => $request->input('description'),
            ]);
    
            return to_route('admin.jobPlan.index')->with('success','Job Plan has been successfully Added');
        } catch (\Exception $e) {
            return to_route('admin.jobPlan.index')->with('error','Something went wrong!');
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
    public function edit(JobPlan $jobPlan)
    {
        return view('admin.manage_jobs.price_plan.edit',)->with('jobPlan',$jobPlan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateRequest $request, JobPlan $jobPlan)
    {
        try {
            if ($request->input('view_limit') == 'unlimited') {
                $previewLimit = null;
            } else {
                $previewLimit = $request->input('cv_preview_limit');
            }
            $jobPlan->update([
                'label' => $request->input('label'),
                'currency_symbol' => $request->input('currency_symbol'),
                'price' => $request->input('price'),
                'job_post_limit' => $request->input('post_limit'),
                'featured_job_post_limit' => $request->input('featured_post_limit'),
                'highlight_job_post_limit' => $request->input('highlighted_post_limit'),
                'profile_view_limitation' => $request->input('view_limit'),
                'cv_view_limit' => $previewLimit,
                'display_frontend' => $request->input('show_frontend'),
                'desc' => $request->input('description'),     
            ]);
            return to_route('admin.jobPlan.index')->with('success','Job Plan has been successfully Updated.');
        } catch (\Exception $e) {
            return to_route('admin.jobPlan.index')->with('error','Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPlan $jobPlan)
    {
        $jobPlan->delete();
        return to_route('admin.jobPlan.index')->with('error','Job Plan deleted successfully.');
    }
}
