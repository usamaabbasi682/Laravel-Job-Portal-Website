<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use App\Models\Industry;
use App\Traits\ProfileTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\CompanyServiceInterface;
use App\Http\Requests\Company\{CreateRequest,UpdateRequest};

class CompanyController extends Controller
{
    use ProfileTrait;
    protected $companyService;
    public function __construct(CompanyServiceInterface $companyService) {
        $this->companyService = $companyService;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $companies = $this->companyService->index($request);
        $organizations = $this->organization_type();
        $industries = Industry::orderBy('name')->get();
        return view('admin.order.company.index',compact('companies','organizations','industries'));
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
        $result=$this->companyService->store($request);        
        if ($result){
            return to_route('admin.company.index')->with('success','Company Details has been successfully Added');
        } 
        return to_route('admin.company.index')->with('error','Something went wrong!');
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
        $result=$this->companyService->update($request,$company);  
        if ($result) {
            return to_route('admin.company.index')->with('success','Company Information has been successfully Updated');
        } 
        return to_route('admin.company.index')->with('error','Something went wrong!');
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
