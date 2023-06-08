<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use App\Models\Industry;
use App\Traits\ProfileTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\{CreateRequest,UpdateRequest};

class CompanyController extends Controller
{
    use ProfileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::latest()->get();
        return view('admin.order.company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = User::role('employee')->get();
        $organizations = $this->organization_type();
        $industries = Industry::orderBy('name')->get();
        $members = $this->team_size();
        return view('admin.order.company.create',compact('employees','organizations','industries','members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
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
    
            if ($request->hasFile('logo')) 
            $company->addMediaFromRequest('logo')->toMediaCollection('company_logo');
            
            if ($request->hasFile('banner')) 
            $company->addMediaFromRequest('banner')->toMediaCollection('company_banner');
    
            return to_route('admin.company.index')->with('success','Company Details has been successfully Added');

        } catch (\Exception $e) {
            return to_route('admin.company.index')->with('error','Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('admin.order.company.view',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $employees = User::role('employee')->get();
        $organizations = $this->organization_type();
        $industries = Industry::orderBy('name')->get();
        $members = $this->team_size();
        return view('admin.order.company.edit',compact('company','employees','organizations','industries','members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Company $company)
    {
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

            if ($request->hasFile('logo')) {
                $logo = $company->getFirstMedia('company_logo');
                if (!empty($logo)) {
                    $logo->delete();
                }
                $company->addMediaFromRequest('logo')->toMediaCollection('company_logo');
            }

            if ($request->hasFile('banner')) {
                $banner = $company->getFirstMedia('company_banner');
                if (!empty($banner)) {
                    $banner->delete();
                }
                $company->addMediaFromRequest('banner')->toMediaCollection('company_banner');
            }

            return to_route('admin.company.index')->with('success','Company Information has been successfully Updated');

        } catch (\Exception $e) {
            return to_route('admin.company.index')->with('error','Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return to_route('admin.company.index')->with('error','Company deleted successfully.');
    }
}
