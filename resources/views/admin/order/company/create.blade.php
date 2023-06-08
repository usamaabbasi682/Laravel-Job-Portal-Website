@extends('layouts.app') 
@section('title','Dashboard') 
@section('top_heading')
<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
   <!--begin::Page title-->
   <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
      <!--begin::Title-->
      <h1 class="d-flex text-dark fw-bold m-0 fs-3">Companies</h1>
      <!--end::Title-->
      <!--begin::Breadcrumb-->
      <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
         <!--begin::Item-->
         <li class="breadcrumb-item text-gray-600">Dashboard</li>
         <!--end::Item-->
         <!--begin::Item-->
         <li class="breadcrumb-item text-gray-600">Companies</li>
         <!--end::Item-->
         <!--begin::Item-->
         <li class="breadcrumb-item text-gray-500">Add Company</li>
         <!--end::Item-->
      </ul>
      <!--end::Breadcrumb-->
   </div>
   <!--end::Page title-->
</div>
@endsection 
@section('main_content')
<div class="content flex-row-fluid" id="kt_content">
   <!--begin::Contacts App- Add New Contact-->
   <div class="row g-7">
      <div class="col-xl-12">
         <!--begin::Contacts-->
         <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_chat_contacts_header">
               <!--begin::Card title-->
               <div class="card-title">
                  <h2>Add Company</h2>
               </div>
               <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
               <!--begin::Form-->
               <form class="form" action="{{ route('admin.company.store') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                     <div class="col-md-12 border p-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Employee</span>
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <select name="employee" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Employee" class="form-select form-select-solid">
                              <option value=""></option>
                              @forelse ($employees as $employee)
                                <option data-kt-flag="flags/united-states.svg" @selected($employee->id == old('employee')) value="{{ $employee->id ?? '' }}">{{ ucwords($employee->name) ?? '' }}</option>
                              @empty @endforelse
                           </select>
                           @error('employee')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <div class="col-md-12 border p-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Company Name</span>
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="company_name" id="company_name" placeholder="Enter Name.." value="{{ old('company_name') }}" />
                           @error('company_name')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                     </div>
                  </div>
                  <div class="row mt-5 border">
                     <div class="col-md-6 p-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                              <span>Logo</span>
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="file" class="form-control form-control-solid" name="logo" />
                           @error('logo')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <div class="col-md-6 p-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                              <span>Banner</span>
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="file" class="form-control form-control-solid" name="banner" />
                           @error('banner')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                     </div>
                  </div>
                  <div class="row mt-5 border">
                     <div class="col-md-6 p-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Country</span>
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="country" placeholder="Type Country" value="{{ old('country') }}" />
                           @error('country')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <div class="col-md-6 p-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Location</span>
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="location" placeholder="Enter Location" value="{{ old('location') }}" />
                           @error('location')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <div class="col-md-6 p-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Phone</span>
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="phone" placeholder="Enter Phone" value="{{ old('phone') }}" />
                           @error('phone')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <div class="col-md-6 p-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Email</span>
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="email" placeholder="Enter Email" value="{{ old('email') }}" />
                           @error('email')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                     </div>
                  </div>
                  <div class="row mt-5 border p-4">
                     <label class="fs-6 fw-semibold form-label">
                        <span style="margin-left: -7px;">Profile Details</span>
                     </label>
                     <hr class="p-3 mt-3" />
                     <div class="col-md-6">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700 required">Organization Type</label>
                           <!--end::Label-->
                           <!--begin::Select-->
                           <select name="organization" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Org" class="form-select form-select-solid">
                              <option value=""></option>
                              @forelse ($organizations as $organization)
                                <option data-kt-flag="flags/united-states.svg" @selected($organization == old('organization')) value="{{ $organization }}">{{ ucwords($organization) ?? '' }}</option>
                              @empty @endforelse
                           </select>
                           <!--end::Select-->
                           @error('organization')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700 required">Industry Type</label>
                           <!--end::Label-->
                           <!--begin::Select-->
                           <select name="industry" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Industry" class="form-select form-select-solid">
                              <option value=""></option>
                              @forelse ($industries as $industry)
                              <option data-kt-flag="flags/united-states.svg" @selected($industry->id == old('industry')) value="{{ $industry->id }}">{{ ucwords($industry->name) ?? '' }}</option>
                              @empty @endforelse
                           </select>
                           <!--end::Select-->
                           @error('industry')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700">Team Size</label>
                           <!--end::Label-->
                           <!--begin::Select-->
                           <select name="member" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Team Size" class="form-select form-select-solid">
                              <option value=""></option>
                              @foreach ($members as $member)
                              <option data-kt-flag="flags/united-states.svg" @selected($member == old('member')) value="{{ $member }}">{{ ucwords($member) ?? '' }}</option>
                              @endforeach
                           </select>
                           <!--end::Select-->
                        </div>
                     </div>
                     <div class="col-md-6"></div>
                     <div class="col-md-6">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700">Website</label>
                           <!--end::Label-->
                           <!--begin::Select-->
                           <input type="text" class="form-control form-control-solid" name="website" placeholder="Enter Url" value="{{ old('website') }}" />
                           <!--end::Select-->
                           @error('website')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700">Establishment Date</label>
                           <!--end::Label-->
                           <input type="date" name="establishment_date" id="establishment_date" class="form-control form-control-solid" />
                           @error('establishment_date')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700">Bio</label>
                           <!--end::Label-->
                           <!--begin::Select-->
                           <textarea name="bio" id="bio" rows="10" cols="80">{{ old('bio') }}</textarea>
                           <!--end::Select-->
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700">Vision</label>
                           <!--end::Label-->
                           <!--begin::Select-->
                           <textarea name="vision" id="vision" rows="10" cols="80">{{ old('vision') }}</textarea>
                           <!--end::Select-->
                        </div>
                     </div>
                  </div>
                  <!--begin::Action buttons-->
                  <div class="d-flex justify-content-end mt-4">
                     <!--begin::Button-->
                     <a href="{{ route('admin.company.index') }}" class="btn btn-light me-3">Cancel</a>
                     <!--end::Button-->
                     <!--begin::Button-->
                     <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                        <span class="indicator-label">Save</span>
                     </button>
                     <!--end::Button-->
                  </div>
                  <!--end::Action buttons-->
               </form>
               <!--end::Form-->
            </div>
            <!--end::Card body-->
         </div>
         <!--end::Contacts-->
      </div>
   </div>
   <!--end::Contacts App- Add New Contact-->
</div>
@endsection
