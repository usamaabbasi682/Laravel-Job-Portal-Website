@extends('layouts.app') 
@section('title','Dashboard') 
@section('top_heading')
<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
   <!--begin::Page title-->
   <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
      <!--begin::Title-->
      <h1 class="d-flex text-dark fw-bold m-0 fs-3">Job Planes</h1>
      <!--end::Title-->
      <!--begin::Breadcrumb-->
      <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
         <!--begin::Item-->
         <li class="breadcrumb-item text-gray-600">Dashboard</li>
         <!--end::Item-->
         <!--begin::Item-->
         <li class="breadcrumb-item text-gray-600">Job Planes</li>
         <!--end::Item-->
         <!--begin::Item-->
         <li class="breadcrumb-item text-gray-500">Add JobPlan</li>
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
                  <h2>Add JobPlan</h2>
               </div>
               <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
               <!--begin::Form-->
               <form class="form" action="{{ route('admin.jobPlan.store') }}" method="POST">
                  {{ csrf_field() }}

                  <div class="row mt-5">
                     <div class="col-md-6 p-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Label</span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="label" placeholder="Basic / Standard / Premium" value="{{ old('label') }}" />
                           @error('label')
                           <span class="text-danger">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <div class="col-md-6 p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Currency Symbols</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" name="currency_symbol" placeholder="Enter Symbol" value="{{ old('currency_symbol') }}" />
                                @error('currency_symbol')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Price</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" class="form-control form-control-solid" name="price" placeholder="Enter Price" value="{{ old('price') }}" />
                                @error('price')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Job Post Limit</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control form-control-solid" name="post_limit" placeholder="Enter Post Limit" value="{{ old('post_limit') }}" />
                        @error('post_limit')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Featured Job Post Limit</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control form-control-solid" name="featured_post_limit" placeholder="Enter Featured Post Limit" value="{{ old('featured_post_limit') }}" />
                        @error('featured_post_limit')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Highlighted Job Post Limit</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control form-control-solid" name="highlighted_post_limit" placeholder="Enter Highlighted Post Limit" value="{{ old('highlighted_post_limit') }}" />
                        @error('highlighted_post_limit')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col-md-6" x-data="{show:true}">
                        <div class="form-group">
                            <label class="fs-6 fw-semibold form-label mt-3">Candidate Profile View Limitation</label>
                            <div class="radio-inline mt-8">
                                <label class="radio radio-square">
                                    <input type="radio" id="limited" class="form-check-input" value="limited" checked="checked" name="view_limit"/>
                                    <span></span>
                                    Limited
                                </label>
                                <label class="radio radio-square" style="padding-left: 20px;">
                                    <input type="radio" id="unlimited" class="form-check-input" value="unlimited"  name="view_limit"/>
                                    <span></span>
                                    Unlimited
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" id="preview_limit">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Candidate Cv Preview Limit</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control form-control-solid" name="cv_preview_limit" placeholder="Enter CV Preview Limit" value="{{ old('cv_preview_limit') }}" />
                        @error('cv_preview_limit')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="fs-6 fw-semibold form-label mt-3">Show this package on frontend</label>
                            <div class="radio-inline mt-8">
                                <label class="radio radio-square">
                                    <input type="radio" class="form-check-input" value="1" checked="checked" name="show_frontend"/>
                                    <span></span>
                                    Yes
                                </label>
                                <label class="radio radio-square" style="padding-left: 20px;">
                                    <input type="radio" value="0" class="form-check-input" name="show_frontend"/>
                                    <span></span>
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Description</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Use <br/> tag to breat the line."></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control form-control-solid" name="description" cols="30" rows="6"></textarea>
                        @error('description')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                  </div>
                  <!--begin::Action buttons-->
                  <div class="d-flex justify-content-end mt-4">
                     <!--begin::Button-->
                     <a href="{{ route('admin.jobPlan.index') }}" class="btn btn-light me-3">Cancel</a>
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
