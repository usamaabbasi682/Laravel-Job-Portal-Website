@extends('layouts.app') 
@section('title','Dashboard')
@section('top_heading')
<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
  <!--begin::Page title-->
  <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
    <!--begin::Title-->
    <h1 class="d-flex text-dark fw-bold m-0 fs-3">Candidates</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
      <!--begin::Item-->
      <li class="breadcrumb-item text-gray-600">Dashboard</li>
      <!--end::Item-->
      <!--begin::Item-->
      <li class="breadcrumb-item text-gray-600">Candidates</li>
      <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">Add Candidate</li>
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
                        <h2>Add Candidate</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-5">
                    <!--begin::Form-->
                    <form class="form" action="{{ route('admin.candidate.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12 border p-4">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Candidate</span>
                                        {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's name."></i> --}}
                                    </label>
                                    <hr class="p-3">
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="candidate" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Candidate" class="form-select form-select-solid">
                                        <option value=""></option>
                                        @forelse ($candidates as $candidate)
                                            <option data-kt-flag="flags/united-states.svg" value="{{ $candidate->id ?? '' }}">{{ ucwords($candidate->name) ?? '' }}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                    @error('candidate')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-4 border p-4">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Country</span>
                                    </label>
                                    <hr class="p-3">
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
                            <div class="col-md-4 border p-4">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Location</span>
                                    </label>
                                    <hr class="p-3">
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
                            <div class="col-md-4 border p-4">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Files(CV)</span>
                                    </label>
                                    <hr class="p-3">
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="file" class="form-control form-control-solid" accept=".pdf,.docx" name="cv"/>
                                    @error('cv')
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
                            <hr class="p-3 mt-3">
                            <div class="col-md-4">
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold fs-6 text-gray-700 required">Profession</label>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <select name="profession" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select currency" class="form-select form-select-solid">
                                        <option value=""></option>
                                        @forelse ($professions as $profession)
                                            <option data-kt-flag="flags/united-states.svg" value="{{ $profession }}">{{ ucwords($profession) ?? '' }}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                    <!--end::Select-->
                                    @error('profession')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold fs-6 text-gray-700 required">Experience</label>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <select name="experience" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Experience" class="form-select form-select-solid">
                                        <option value=""></option>
                                        @forelse ($experiences as $experience)
                                            <option data-kt-flag="flags/united-states.svg" value="{{ $experience }}">{{ ucwords($experience) ?? '' }}</option>
                                        @empty
                                            
                                        @endforelse
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
                                            <option data-kt-flag="flags/united-states.svg" value="{{ $jobRole }}">{{ ucwords($jobRole) ?? '' }}</option>
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
                                            <option data-kt-flag="flags/united-states.svg" value="{{ $education }}">{{ ucwords($education) ?? '' }}</option>                                            
                                        @empty
                                            
                                        @endforelse
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
                                    <label class="form-label fw-bold fs-6 text-gray-700 required">Gender</label>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <select name="gender" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Gender" class="form-select form-select-solid">
                                        <option value=""></option>
                                        @forelse ($genders as $gender)
                                            <option data-kt-flag="flags/united-states.svg" value="{{ $gender }}">{{ ucwords($gender) ?? '' }}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                    <!--end::Select-->
                                    @error('gender')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold fs-6 text-gray-700 required">Website</label>
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
                                    <label class="form-label fw-bold fs-6 text-gray-700 required">DOB</label>
                                    <!--end::Label-->
                                    <input type="date" name="dob" id="dob" class="form-control form-control-solid" />
                                    @error('dob')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold fs-6 text-gray-700 required">Marital Status</label>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <select name="marital_status" aria-label="Select a Timezone" data-control="select2" data-placeholder="Marital Status" class="form-select form-select-solid">
                                        <option value=""></option>
                                        @forelse ($maritalStatuses as $m_status)
                                            <option data-kt-flag="flags/united-states.svg" value="{{ $m_status }}">{{ ucwords($m_status) ?? '' }}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                    @error('marital_status')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <!--end::Select-->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold fs-6 text-gray-700">Skills</label>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <select name="skills[]" aria-label="Select a Timezone" multiple data-control="select2" data-placeholder="Skills" class="form-select form-select-solid">
                                        <option value=""></option>
                                        @forelse ($skills as $skill)
                                            <option data-kt-flag="flags/united-states.svg" value="{{ $skill->id }}">{{ ucwords($skill->name) ?? '' }}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                    <!--end::Select-->
                                </div>
                            </div>

                            
                            <div class="col-md-6">
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold fs-6 text-gray-700">Languages</label>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <select name="language[]" aria-label="Select a Timezone" multiple data-control="select2" data-placeholder="Languages" class="form-select form-select-solid">
                                        <option value=""></option>
                                        @forelse ($languages as $language)
                                            <option data-kt-flag="flags/united-states.svg" value="{{ $language->id }}">{{ ucwords($language->name) ?? '' }}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                    <!--end::Select-->
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold fs-6 text-gray-700">Bio</label>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <textarea name="bio" id="bio" rows="10" cols="80"></textarea>
                                    <!--end::Select-->
                                </div>
                            </div>
                        </div>
                        <!--begin::Action buttons-->
                        <div class="d-flex justify-content-end mt-4">
                            <!--begin::Button-->
                            <a href="{{ route('admin.candidate.index') }}"  class="btn btn-light me-3">Cancel</a>
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
