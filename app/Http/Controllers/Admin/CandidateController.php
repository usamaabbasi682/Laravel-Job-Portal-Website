<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ProfileTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Language,Candidate,Skill,User,};
use App\Http\Requests\Candidate\{UpdateRequest,CreateRequest};
use App\Services\Interfaces\CandidateServiceInterface;

class CandidateController extends Controller
{
    use ProfileTrait;
    protected $candidateService;

    public function __construct(CandidateServiceInterface $candidateService) {
        $this->candidateService = $candidateService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $candidates=$this->candidateService->index($request);
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
        $result=$this->candidateService->store($request);        
        if ($result){
            return to_route('admin.candidate.index')->with('success','Candidate Information has been successfully Added');
        } 
         
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
        $result=$this->candidateService->update($request,$candidate);  

        if ($result) {
            return to_route('admin.candidate.index')->with('success','Candidate Information has been successfully Updated');
        } 
         
        return to_route('admin.candidate.index')->with('error','Something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return to_route('admin.candidate.index')->with('error','Candidate deleted successfully.');
    }
}
