<?php 
namespace App\Services;

use App\Models\Company;
use App\Services\Interfaces\CompanyServiceInterface;

class CompanyService implements CompanyServiceInterface
{
    public function index($request):object {
        try {
            $companies = Company::latest()->get();
            // Filter for Organization and Industry
            if ($request->filled('org_type')) {
                if ($request->filled('industry_type')) {
                    $companies = Company::search($request->get('org_type'))
                    ->where('industry_id',$request->get('industry_type'))
                    ->get();
                } elseif($request->filled('sort_by')) {
                    $companies = Company::search($request->get('org_type'))
                    ->orderBy('id',$request->get('sort_by'))
                    ->get();
                } else {
                    $companies = Company::search($request->get('org_type'))->get();
                }
            } 
    
            // Filter for Latest & Oldest
            if ($request->filled('sort_by') && !$request->filled('org_type')) {
                $companies = Company::orderBy('id',$request->get('sort_by'))->get();
            }
    
            // Filter for Industry
            if($request->filled('industry_type')) {
                $companies = Company::search($request->get('industry_type'))->get();
            } 
            return $companies;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function store($request):bool 
    {
        try {
            $company = Company::create([
                'user_id' => $request->input('employee'),
                'industry_id' => $request->input('industry'),
                'company_name' => $request->input('company_name'),
                'country' => $request->input('country'),
                'location' => $request->input('location'),
                'contact' => $request->input('phone'),
                'email' => $request->input('email'),
                'org_type' => $request->input('organization'),
                'team_size' => $request->input('member'),
                'website' => $request->input('website'),
                'establishment_date' => $request->input('establishment_date'),
                'bio' => $request->input('bio'),
                'vision' => $request->input('vision'),
            ]);
    
            $this->uploadFile($request,$company,"logo","company_logo");
            $this->uploadFile($request,$company,"banner","company_banner");
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function update($request,object $company):bool {
        try {
            $company->update([
                'user_id' => $request->input('employee'),
                'industry_id' => $request->input('industry'),
                'company_name' => $request->input('company_name'),
                'country' => $request->input('country'),
                'location' => $request->input('location'),
                'contact' => $request->input('phone'),
                'email' => $request->input('email'),
                'org_type' => $request->input('organization'),
                'team_size' => $request->input('member'),
                'website' => $request->input('website'),
                'establishment_date' => $request->input('establishment_date'),
                'bio' => $request->input('bio'),
                'vision' => $request->input('vision'),
            ]);
                
            $this->uploadFile($request,$company,"logo","company_logo");
            $this->uploadFile($request,$company,"banner","company_banner");
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