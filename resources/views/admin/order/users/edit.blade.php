@extends('layouts.app') 
@section('title','Dashboard')
@section('top_heading')
<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
  <!--begin::Page title-->
  <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
    <!--begin::Title-->
    <h1 class="d-flex text-dark fw-bold m-0 fs-3">Users</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
      <!--begin::Item-->
      <li class="breadcrumb-item text-gray-600">Dashboard</li>
      <!--end::Item-->
      <!--begin::Item-->
      <li class="breadcrumb-item text-gray-600">Users</li>
      <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">Add User</li>
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
                        <h2>Edit "{{ Str::ucfirst($user->name) ?? 'User' }}"</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-5">
                    <!--begin::Form-->
                    <form class="form" action="{{ route('admin.users.update',$user) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')

                        @isset($user->getRoleNames()[0])
                            <input type="hidden" name="user_selected_role" value="{{ $user->getRoleNames()[0] }}" />
                        @endisset
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Full Name</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's name."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" value="{{ $user->name ?? old('name') }}" name="name" autofocus placeholder="Enter Name" />
                            @error('name')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required">
                                <span>Email</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's company name (optional)."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="email" class="form-control form-control-solid" name="email" placeholder="Enter Email" value="{{ $user->email ?? old('email') }}" />
                            @error('email')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Input-->
                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label>
                                <span>Select Images</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" class="form-control form-control-solid" name="image"/>
                            @error('image')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Input-->
                        </div>

                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold fs-6 text-gray-700">Role</label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select id="role_edit" name="role" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select currency" class="form-select form-select-solid">
                                <option value=""></option>
                                @forelse ($roles as $role)
                                <option data-kt-flag="flags/united-states.svg" value="{{ $role->name ?? '' }}" @selected($role->name == $user->getRoleNames()[0])>
                                    {{ Str::ucfirst($role->name) ?? '' }}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                            <!--end::Select-->
                        </div>

                        <div class='separator my-5'></div>
                        <!--begin::Separator-->
                        <!--end::Separator-->
                        <!--begin::Action buttons-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('admin.users.index') }}"  class="btn btn-light me-3">Cancel</a>
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
