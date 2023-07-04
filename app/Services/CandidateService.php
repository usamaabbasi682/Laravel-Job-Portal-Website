<?php 
namespace App\Services;

use App\Models\Candidate;
use App\Services\Interfaces\CandidateServiceInterface;

class CandidateService implements CandidateServiceInterface
{
    public function index($request):object {
        if($request->filled('sort_by')) {
            $candidates = Candidate::orderBy('id',$request->get('sort_by'))->get();
        } else {
            $candidates = Candidate::latest()->get();
        }
        return $candidates;
    }

    public function store($request):bool {
        try {
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

            $this->uploadFile($request,$candidate,"cv","cv");
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function update($request,object $candidate):bool 
    {
        try {
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
    
            $this->uploadFile($request,$candidate,"cv","cv");
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function uploadFile($request,$model,string $fileName,string $collectionName):void 
    {
        if ($request->hasFile($fileName)){
            $file = $model->getFirstMedia($collectionName);
            if (!empty($file)) {
                $file->delete();
            }
            $model->addMediaFromRequest($fileName)->toMediaCollection($collectionName);
        } 

    }
}


?>