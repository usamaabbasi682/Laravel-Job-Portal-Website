@extends('layouts.app') 
@section('title','Dashboard')
@section('top_heading')
<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
  <!--begin::Page title-->
  <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
    <!--begin::Title-->
    <h1 class="d-flex text-dark fw-bold m-0 fs-3">Tags</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
      <!--begin::Item-->
      <li class="breadcrumb-item text-gray-600">Dashboard</li>
      <!--end::Item-->
      <!--begin::Item-->
      <li class="breadcrumb-item text-gray-600">Tags</li>
      <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">Add Tag</li>
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
        <div class="col-md-3"></div>
        <div class="col-xl-6 ">
            <!--begin::Contacts-->
            <div class="card card-flush h-lg-100" id="kt_contacts_main">
                <!--begin::Card header-->
                <div class="card-header pt-7" id="kt_chat_contacts_header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Add Tag</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-5">
                    <!--begin::Form-->
                    <form class="form" action="{{ route('admin.tags.store') }}" method="POST">
                        {{ csrf_field() }}
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Name</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's name."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" value="{{ old('name') }}" name="name" autofocus placeholder="Enter Name" />
                            @error('name')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Action buttons-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('admin.tags.index') }}"  class="btn btn-light me-3">Cancel</a>
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
        <div class="col-md-3"></div>
    </div>
    <!--end::Contacts App- Add New Contact-->
</div>
@endsection
