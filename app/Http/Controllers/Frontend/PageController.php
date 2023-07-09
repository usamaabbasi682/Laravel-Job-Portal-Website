<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,$page,$slug=null)
    {
        if ($page == 'job-details') {
            $page = $page.'/'.$slug;
        }
        
        switch ($page) {
            case 'home':
                $featured_highlighted_jobs=Job::latest('id')->featuredHighlightedJob()->limit(3)->get();
                return view('frontend.home',compact('featured_highlighted_jobs'));
                break;
            case 'jobs':
                $featured_highlighted_jobs=Job::latest('id')->featuredHighlightedJob()->get();
                $jobs = Job::latest('id')->jobs()->get();
                return view('frontend.jobs',compact('featured_highlighted_jobs','jobs'));
                break;
            case 'job-details/'.$slug:
                $job = Job::firstWhere('slug',$slug);
                if (Job::where('company_id',$job->company_id)->where('id','!=',$job->id)->exists()) {
                    $related_jobs = Job::where('company_id',$job->company_id)->where('id','!=',$job->id)->get();
                }
                return view('frontend.job_detail',compact('job','related_jobs'));
                break;
            default:
                dd('yes');
                break;
        }   
    }
}
