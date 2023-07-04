@extends('layouts.app') 
@section('title','Dashboard') 
@section('top_heading')
<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
   <!--begin::Page title-->
   <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
      <!--begin::Title-->
      <h1 class="d-flex text-dark fw-bold m-0 fs-3">Jobs</h1>
      <!--end::Title-->
      <!--begin::Breadcrumb-->
      <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
         <!--begin::Item-->
         <li class="breadcrumb-item text-gray-600">Dashboard</li>
         <!--end::Item-->
         <!--begin::Item-->
         <li class="breadcrumb-item text-gray-600">Jobs</li>
         <!--end::Item-->
         <!--begin::Item-->
         <li class="breadcrumb-item text-gray-500">Edit Job</li>
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
                  <h2>Edit Job</h2>
               </div>
               <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
               <!--begin::Form-->
               <form class="form" action="{{ route('admin.jobs.update',$job) }}" method="POST">
                  {{ csrf_field() }}
                  @method('PUT')
                  <div class="row border">
                    <div class="col-md-12 p-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Title</span>
                              {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's name."></i> --}}
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="title" placeholder="Enter Title" value="{{ $job->title ?? '' }}" />
                           @error('title')
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
                              <span class="required">Company</span>
                              {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's name."></i> --}}
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <select name="company" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Company" class="form-select form-select-solid">
                              <option value=""></option>
                              @forelse ($companies as $company)
                              <option data-kt-flag="flags/united-states.svg" @selected($company->id == $job->company_id) value="{{ $company->id ?? '' }}">{{ ucwords($company->company_name) ?? '' }}</option>
                              @empty @endforelse
                           </select>
                           @error('company')
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
                              <span class="required">Category</span> 
                              {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's name."></i> --}}
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <select name="category" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Category" class="form-select form-select-solid">
                              <option value=""></option>
                              @forelse ($categories as $category)
                              <option data-kt-flag="flags/united-states.svg" @selected($category->id == $job->job_category_id) value="{{ $category->id ?? '' }}">{{ ucwords($category->name) ?? '' }}</option>
                              @empty @endforelse
                           </select>
                           @error('category')
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
                              <span class="required">Vacancies </span>
                              {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's name."></i> --}}
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="vacancies" placeholder="Enter Vacancies" value="{{ $job->vacancies ?? '' }}" />
                           @error('vacancies')
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
                              <span class="required">Deadline</span>
                              {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's name."></i> --}}
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="date" class="form-control form-control-solid" name="deadline" placeholder="Enter Deadline" value="{{ $job->deadline ?? '' }}" />
                           @error('deadline')
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
                     <label class="fs-6 fw-semibold form-label p-3">
                        <span style="margin-left: -7px;">Salary Details</span>
                     </label>
                     <hr class="p-3 mt-3" />
                     <div class="col-md-12">
                        <div class="form-group">
                            <label class="fs-6 fw-semibold form-label">Job Feature</label>
                            <div class="radio-inline mt-8">
                              @php
                                 $features = ['Salary Range'=>'salary_range','Custom Salary'=>'custom_salary'];
                                 $selected_features = json_decode($job->salary_details,true);
                              @endphp
                              <input type="hidden" value="{{ $selected_features['job_feature_type'] }}" id="selected_feature">
                              @foreach ($features as $feature_key => $feature_val)
                              <label class="radio radio-square">
                                 <input type="radio" @checked($feature_val == $selected_features['job_feature_type']) id="{{ $feature_val ?? '' }}" class="form-check-input" value="{{ $feature_val ?? '' }}" name="salary_details">
                                 <span></span>
                                 {{ ucwords($feature_key) ?? '' }}
                             </label>
                              @endforeach
                            </div>
                        </div>
                        <div class="row" id="salary_range_row">
                           <div class="col-md-6">
                              <div class="fv-row mb-7">
                                 <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Minimum Salary ($)</span>
                                 </label>
                                 <hr class="p-3" />
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input type="number" value="@isset($selected_features['min_salary']){{ $selected_features['min_salary'] ?? '' }}@endisset" class="form-control form-control-solid" name="min_salary_range" placeholder="Min Salary Range" value="{{ old('min_salary_range') }}" />
                                 @error('min_salary_range')
                                 <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                                 <!--end::Input-->
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="fv-row mb-7">
                                 <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Maximum Salary ($)</span>
                                 </label>
                                 <hr class="p-3" />
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input type="number" value="@isset($selected_features['max_salary']){{ $selected_features['max_salary'] ?? '' }}@endisset" class="form-control form-control-solid" name="max_salary_range" placeholder="Max Salary Range" value="{{ old('max_salary_range') }}" />
                                 @error('max_salary_range')
                                 <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                                 <!--end::Input-->
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row d-none" id="custom_salary_row"> 
                        <div class="col-md-6">
                           <div class="fv-row mb-7">
                              <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3">
                                 <span class="required">Custom Salary</span>
                              </label>
                              <hr class="p-3" />
                              <!--end::Label-->
                              <!--begin::Input-->
                              <input type="text" value="Competitive" class="form-control form-control-solid" name="custom_salary" placeholder="Custom Salary" value="{{ old('custom_salary') }}" />
                              @error('custom_salary')
                              <span class="text-danger">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                              <!--end::Input-->
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="fv-row mb-7">
                              <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3">
                                 <span class="required">Salary Type</span>
                              </label>
                              <hr class="p-3" />
                              <!--end::Label-->
                              <!--begin::Input-->
                              <select name="salary_type" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Salary Type" class="form-select form-select-solid">
                                 <option value=""></option>
                              @php
                              $salary_type = ['Project-Basis','Hourly','Yearly'];
                              @endphp
                                 @foreach ($salary_type as $st)
                                 <option data-kt-flag="flags/united-states.svg" @selected($st == $job->salary_type) value="{{ $st }}">{{ ucwords($st) ?? '' }}</option>
                                 @endforeach
                              </select>
                              @error('salary_type')
                              <span class="text-danger">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                              <!--end::Input-->
                           </div>
                        </div>
                     </div>
                    </div>
                  <div class="row mt-5">
                     <div class="col-md-6 border p-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Country</span>
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="country" placeholder="Type Country" value="{{ $job->country ?? '' }}" />
                           @error('country')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <div class="col-md-6 border p-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Location</span>
                           </label>
                           <hr class="p-3" />
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="location" placeholder="Enter Location" value="{{ $job->location ?? '' }}" />
                           @error('location')
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
                    <div class="col-md-6">
                        <label class="fs-6 fw-semibold form-label">
                            <span style="margin-left: -7px;">Applicant Options</span>
                         </label>
                         <hr class="p-3 mt-3" />
                         <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold fs-6 text-gray-700 required">Receive Applications</label>
                            @php
                              $applicant = json_decode($job->applicant,true);
                            @endphpp
                            <input type="hidden" value="{{ $applicant['receive_application_type'] }}" id="applicant_apply">
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select name="receive_applications" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Receive Applications" class="form-select form-select-solid">
                               <option value=""></option>
                              @php
                              $receive_applications = ['Current-Platform','Email-Address','Custom-URL'];
                              @endphp
                              @if ($applicant['receive_application_type'] == 'Custom-URL')
                                 @php
                                    $email = '';
                                    $custom_url = $applicant['apply_url'];
                                 @endphp
                              @elseif ($applicant['receive_application_type'] == 'Email-Address')
                                 @php
                                    $custom_url = '';
                                    $email = $applicant['email'];
                                 @endphp
                              @endif
                               @foreach ($receive_applications as $ra)
                               <option data-kt-flag="flags/united-states.svg" @selected($ra == $applicant['receive_application_type']) value="{{ $ra }}">{{ ucwords($ra) ?? '' }}</option>
                               @endforeach
                            </select>
                            <!--end::Select-->
                            @error('receive_applications')
                            <span class="text-danger">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                         </div>
                         <div class="mb-10 d-none" id="emailAddress">
                            <!--begin::Label-->
                            <label class="form-label fw-bold fs-6 text-gray-700 required">Email Address</label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <input type="text" class="form-control form-control-solid" name="email" placeholder="Enter Email" value="{{ $email ?? '' }}" />
                            <!--end::Select-->
                            @error('email')
                            <span class="text-danger">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                         </div>
                         <div class="mb-10 d-none" id="applyUrl">
                            <!--begin::Label-->
                            <label class="form-label fw-bold fs-6 text-gray-700 required">Apply URL</label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <input type="text" class="form-control form-control-solid" name="apply_url" placeholder="Enter URL" value="{{ $custom_url ?? '' }}" />
                            <!--end::Select-->
                            @error('apply_url')
                            <span class="text-danger">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                         </div>
                    </div>
                    <div class="col-md-6">
                     <label class="fs-6 fw-semibold form-label">
                        <span style="margin-left: -7px;">Other</span>
                     </label>
                     <hr class="p-3 mt-3" />
                     <div class="form-group">
                         <label class="fs-6 fw-semibold form-label">Job Feature</label>
                         <div class="radio-inline mt-8">
                            @php
                                $jobFeatures = ['featured','highlight'];
                            @endphp

                            @foreach ($jobFeatures as $key)
                            <label class="radio radio-square">
                                <input type="radio" @checked($key == $job->job_feature) id="{{ $key ?? '' }}" class="form-check-input" value="{{ $key ?? '' }}" name="jobfeature">
                                <span></span>
                                {{ Str::ucfirst($key) }}
                            </label>
                            @endforeach
                         </div>
                     </div>
                 </div>
                  </div>
                  <div class="row mt-5 border p-4">
                     <label class="fs-6 fw-semibold form-label">
                        <span style="margin-left: -7px;">Profile Details</span>
                     </label>
                     <hr class="p-3 mt-3" />
                  
                     <div class="col-md-4">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700 required">Experience</label>
                           <!--end::Label-->
                           <!--begin::Select-->
                           <select name="experience" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Experience" class="form-select form-select-solid">
                              <option value=""></option>
                              @forelse ($experiences as $experience)
                              <option data-kt-flag="flags/united-states.svg" @selected($experience == $job->experience) value="{{ $experience }}">{{ ucwords($experience) ?? '' }}</option>
                              @empty @endforelse
                           </select>
                           <!--end::Select-->
                           @error('experience')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700 required">Job Role</label>
                           <!--end::Label-->
                           <!--begin::Select-->
                           <select name="job_role" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Role" class="form-select form-select-solid">
                              <option value=""></option>
                              @foreach ($jobRoles as $jobRole)
                              <option data-kt-flag="flags/united-states.svg" @selected($jobRole->id == $job->job_role_id) value="{{ $jobRole->id }}">{{ ucwords($jobRole->name) ?? '' }}</option>
                              @endforeach
                           </select>
                           <!--end::Select-->
                           @error('job_role')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700 required">Education</label>
                           <!--end::Label-->
                           <!--begin::Select-->
                           <select name="education" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Education" class="form-select form-select-solid">
                              <option value=""></option>
                              @forelse ($educations as $education)
                              <option data-kt-flag="flags/united-states.svg" @selected($education == $job->education) value="{{ $education }}">{{ ucwords($education) ?? '' }}</option>
                              @empty @endforelse
                           </select>
                           <!--end::Select-->
                           @error('education')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700">Tags</label>
                           <!--end::Label-->
                           <!--begin::Select-->
                           <select multiple name="tags[]" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Tags" class="form-select form-select-solid">
                              <option value=""></option>
                              @forelse ($tags as $tag)
                                <option data-kt-flag="flags/united-states.svg" @foreach($job->tags as $selectedTag) @selected($selectedTag->id == $tag->id) @endforeach  value="{{ $tag->id }}">{{ ucwords($tag->name) ?? '' }}</option>
                              @empty
                                 
                              @endforelse
                           </select>
                           <!--end::Select-->
                           @error('tags')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700">Benefit</label>
                           <!--end::Label-->
                           <!--begin::Select-->
                           <select multiple name="benefit[]" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Benefit" class="form-select form-select-solid">
                              <option value=""></option>
                              @forelse ($benefits as $benefit)
                              <option data-kt-flag="flags/united-states.svg" @foreach($job->benefits as $bene) @selected($bene->id == $benefit->id) @endforeach value="{{ $benefit->id }}">{{ ucwords($benefit->name) ?? '' }}</option>
                              @empty
                                 
                              @endforelse
                           </select>
                           <!--end::Select-->
                           @error('benefit')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700 required">Job Type</label>
                           <!--end::Label-->
                           <!--begin::Select-->
                           <select name="job_type" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Job Type" class="form-select form-select-solid">
                              <option value=""></option>
                              @forelse ($jobTypes as $jobType)
                              <option data-kt-flag="flags/united-states.svg" @selected($jobType == $job->job_type) value="{{ $jobType }}">{{ ucwords($jobType) ?? '' }}</option>
                              @empty
                                 
                              @endforelse
                           </select>
                           <!--end::Select-->
                           @error('job_type')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-12">
                        <div class="mb-10">
                           <!--begin::Label-->
                           <label class="form-label fw-bold fs-6 text-gray-700">Description</label>
                           <!--end::Label-->
                           <!--begin::Select-->
                           <textarea name="bio" id="description" rows="10" cols="80">{{ $job->description ?? '' }}</textarea>
                           <!--end::Select-->
                        </div>
                     </div>
                  </div>
                  <!--begin::Action buttons-->
                  <div class="d-flex justify-content-end mt-4">
                     <!--begin::Button-->
                     <a href="{{ route('admin.candidate.index') }}" class="btn btn-light me-3">Cancel</a>
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
