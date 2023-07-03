<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ProfileTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Language,
    Candidate,
    Skill,
    User,
};
use App\Http\Requests\Candidate\{UpdateRequest,CreateRequest};

class CandidateController extends Controller
{
    use ProfileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->filled('sort_by')) {
            $candidates = Candidate::orderBy('id',$request->get('sort_by'))->get();
        } else {
            $candidates = Candidate::latest()->get();
        }
        return view('admin.order.candidate.index',compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $candidates = User::role('candidate')->get();
        $professions = $this->profession();
        $experiences = $this->experience();
        $jobRoles = $this->job_role();
        $educations = $this->education();
        $genders = $this->gender();
        $maritalStatuses = $this->marital_status();
        $skills = Skill::orderBy('name')->get();
        $languages = Language::orderBy('name')->get();

        return view('admin.order.candidate.create',
        compact('candidates','professions','experiences','jobRoles','educations','genders','maritalStatuses','skills','languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $candidate = Candidate::create([
            'user_id' => $request->input('candidate'),
            'country' => $request->input('country'),
            'location' => $request->input('location'),
            'profession' => $request->input('profession'),
            'experience' => $request->input('experience'),
            'job_role' => $request->input('job_role'),
            'education' => $request->input('education'),
            'gender' => $request->input('gender'),
            'website' => $request->input('website'),
            'dob' => $request->input('dob'),
            'marital_status' => $request->input('marital_status'),
            'bio' => $request->input('bio'),
        ]);

        if ($request->has('skills')) 
        $candidate->skills()->attach($request->input('skills'));
        
        if ($request->has('language')) 
        $candidate->languages()->attach($request->input('language'));
        
        if ($request->hasFile('cv')) 
        $candidate->addMediaFromRequest('cv')->toMediaCollection('cv');
        
        if ($candidate) 
        return to_route('admin.candidate.index')->with('success','Candidate Information has been successfully Added');
         
        return to_route('admin.candidate.index')->with('error','Something went wrong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        return view('admin.order.candidate.view',compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        $candidates = User::role('candidate')->get();
        $professions = $this->profession();
        $experiences = $this->experience();
        $jobRoles = $this->job_role();
        $educations = $this->education();
        $genders = $this->gender();
        $maritalStatuses = $this->marital_status();
        $skills = Skill::orderBy('name')->get();
        $languages = Language::orderBy('name')->get();

        return view('admin.order.candidate.edit',
        compact('candidate','professions','experiences','jobRoles','educations','genders','maritalStatuses','skills','languages','candidates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Candidate $candidate)
    {
        $candidate->update([
            'user_id' => $request->input('candidate'),
            'location' => $request->input('location'),
            'country' => $request->input('country'),
            'profession' => $request->input('profession'),
            'experience' => $request->input('experience'),
            'job_role' => $request->input('job_role'),
            'education' => $request->input('education'),
            'gender' => $request->input('gender'),
            'website' => $request->input('website'),
            'dob' => $request->input('dob'),
            'marital_status' => $request->input('marital_status'),
            'bio' => $request->input('bio'),
        ]);

        if ($request->has('skills')) 
        $candidate->skills()->sync($request->input('skills'));

        if ($request->has('language')) 
        $candidate->languages()->sync($request->input('language'));

        if ($request->hasFile('cv')) {
            $file = $candidate->getFirstMedia('cv');
            if (!empty($file)) {
                $file->delete();
            }
            $candidate->addMediaFromRequest('cv')->toMediaCollection('cv');
        }

        if ($candidate) 
        return to_route('admin.candidate.index')->with('success','Candidate Information has been successfully Updated');
         
        return to_route('admin.candidate.index')->with('error','Something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort(404);
    }
}
