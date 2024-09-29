<?php 
namespace App\Services;

use App\Models\Job;
use Illuminate\Support\Str;
use App\Services\Interfaces\JobServiceInterface;

class JobService implements JobServiceInterface
{
    public function index($request):object {
        try {
            if ($request->filled('job_category')) 
            {
                $jobs = Job::where('job_category_id',$request->get('job_category'));
                if($request->filled('job_type')) {
                    $jobs->where('job_type',$request->get('job_type'));
                }
                if ($request->filled('experience')) {
                    $jobs->where('experience',$request->get('experience'));
                }
                if ($request->filled('sort_by')) {
                    $jobs->orderBy('id',$request->get('sort_by'));
                }
                return $jobs = $jobs->get(); 
            } elseif($request->filled('job_type')) {
                $jobs = Job::where('job_type',$request->get('job_type'));
                if ($request->filled('experience')) {
                    $jobs->where('experience',$request->get('experience'));
                }
                if ($request->filled('sort_by')) {
                    $jobs->orderBy('id',$request->get('sort_by'));
                }
                return $jobs = $jobs->get(); 
            } elseif ($request->filled('experience')) {
                $jobs = Job::where('experience',$request->get('experience'));
                if ($request->filled('sort_by')) {
                    $jobs->orderBy('id',$request->get('sort_by'));
                }
                return $jobs = $jobs->get();
            } elseif($request->filled('sort_by')) {
                return $jobs = $jobs->orderBy('job_type',$request->get('job_type'))->get();
            } else {
                return $jobs = Job::all();
            } 
            return $jobs;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function store($request):bool {
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
                $r_a = json_encode([
                    'receive_application_type' => 'Current-Platform',
                ]);
            }

            $job = Job::create([
                'company_id' => $request->input('company'),
                'job_category_id' => $request->input('category'),
                'job_role_id' => $request->input('job_role'),
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')).'_'.uniqid(true),
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

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function update($request,object $job):bool {
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
                $r_a = json_encode([
                    'receive_application_type' => 'Current-Platform',
                ]);
            }

            $job->update([
                'company_id' => $request->input('company'),
                'job_category_id' => $request->input('category'),
                'job_role_id' => $request->input('job_role'),
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')).'_'.uniqid(true),
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
                $job->tags()->sync($request->input('tags'));
            }
    
            if (!empty($request->input('benefit'))) {
                $job->benefits()->sync($request->input('benefit'));
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function status(object $job,string $status):bool {
        try {
            if ($status == 'publish') 
            $update_status = '1';
            else 
            $update_status = '0';
    
            $job->update(['status'=>$update_status]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}


?>