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
      <li class="breadcrumb-item text-gray-500">Companies</li>
      <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
  </div>
  <!--end::Page title-->
</div>
@endsection 
@section('main_content')
<!--begin::Post-->
<div class="content flex-row-fluid" id="kt_content">
  <form id="company_filter_form" action="{{ route('admin.company.index') }}" method="get">
  <div class="row pb-4">
		<div class="col-md-4 fv-row">
      <label class="fs-6 fw-semibold mb-2">Organization Type</label>
      <select class="form-select form-select-solid company_filter" data-control="select2" data-hide-search="true" data-placeholder="Organization Type" name="org_type">
        <option value="">Select ...</option>
        @forelse ($organizations as $organization)
          <option value="{{ $organization ?? '' }}" @selected($organization == request()->get('org_type')) >{{ ucwords($organization) ?? '' }}</option>
        @empty
          
        @endforelse
      </select>
    </div>
    <div class="col-md-4 fv-row">
      <label class="fs-6 fw-semibold mb-2">Industry Type</label>
      <select class="form-select form-select-solid company_filter" data-control="select2" data-hide-search="true" data-placeholder="Industry Type" name="industry_type">
        <option value="">Select ...</option>
        @forelse ($industries as $industry)
          <option value="{{ $industry->id ?? '' }}">{{ ucwords($industry->name) ?? '' }}</option>
        @empty
          
        @endforelse
      </select>
    </div>
    <div class="col-md-4 fv-row">
      <label class="fs-6 fw-semibold mb-2">Sort By</label>
      <select class="form-select form-select-solid company_filter" data-control="select2" data-hide-search="true" data-placeholder="Sort By" name="sort_by">
        <option value="">Select ...</option>
        <option value="desc">{{ __('Latest') }}</option>
        <option value="asc">{{ __('Oldest') }}</option>
      </select>
    </div>
  </div>
</form>
  <!--begin::Card-->
  <div class="card">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
      <!--begin::Card title-->
      <div class="card-title">
        <!--begin::Search-->
        <div class="d-flex align-items-center position-relative my-1">
          <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
          <span class="svg-icon svg-icon-1 position-absolute ms-6">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
              <path
                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                fill="currentColor"
              />
            </svg>
          </span>
          <!--end::Svg Icon-->
          <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Company" />
        </div>
        <!--end::Search-->
      </div>
      <!--begin::Card title-->
      <!--begin::Card toolbar-->
      <div class="card-toolbar">
        <!--begin::Group actions-->
        <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
          <div class="fw-bold me-5"><span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
          <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
        </div>
        <!--end::Group actions-->
        <a href="{{ route('admin.company.index') }}" class="btn btn-primary">Reset Filters</a>

        <a href="{{ route('admin.company.create') }}" class="btn btn-primary mr-4" style="margin-left: 11px;">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                </svg>
            </span>
            <!--end::Svg Icon-->Add Company
        </a>
      </div>
      <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body py-4">
      <!--begin::Table-->
      <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
        <!--begin::Table head-->
        <thead>
          <!--begin::Table row-->
          <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-20px pe-2">#</th>
            <th class="min-w-215px">Company</th>
            <th class="min-w-115px">Active Job</th>
            <th class="min-w-115px">Organization/Country</th>
            <th class="min-w-115px">Establishment Date</th>
            <th class="min-w-115px">Account Status</th>
            <th class="text-end min-w-90px">Actions</th>
          </tr>
          <!--end::Table row-->
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
            @forelse ($companies as $company)
            <tr>
                <td>{{ $loop->iteration ?? '' }}</td>
                <td class="d-flex align-items-center">
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="javascript:void(0)">
                      <div class="symbol-label">
                        @php
                          $companyLogo=$company->getMedia('company_logo')->first();
                        @endphp
                        @isset($companyLogo)
                          <img src="{{ asset('storage/'.$companyLogo->id.'/'.$companyLogo->file_name) ?? '' }}" class="w-100" alt="image" />
                        @else 
                          <img src="{{ asset('assets/media/avatars/300-6.jpg') }}" alt="Default Logo" class="w-100" />
                        @endisset
                      </div>
                    </a>
                  </div>
    
                  <div class="d-flex flex-column">
                    <a href="javascript:void(0)" class="text-gray-800 text-hover-primary mb-1">{{ ucwords($company->user->name) ?? '' }}</a>
                    <span>{{ $company->company_name ?? '' }}</span>
                  </div>
                </td>
                <td><span class="badge badge-light-primary fw-bold">66 Active Jobs</span></td>
                <td>
                    <p>{{ strtoupper($company->org_type) ?? '' }} ({{ Str::ucfirst($company->country) ?? '-' }}) <br> {{ Str::limit($company->location, 50, '...') ?? '' }}</p>
                </td>
                <td>{{ $company->establishment_date ?? 'N/A' }}</td>
                <td>
                    @if ($company->user->account_status)
                        <span class="badge badge-light-success fw-bold">Activated</span>
                    @else
                        <span class="badge badge-light-danger fw-bold">Deactivated</span>
                    @endif
                </td>
                <td class="text-end">
                  <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    Actions
                    <span class="svg-icon svg-icon-5 m-0">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                          fill="currentColor"
                        />
                      </svg>
                    </span>
                  </a>
                  <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                    <div class="menu-item px-3">
                      <a href="{{ route('admin.company.edit',$company) }}" class="menu-link form-control px-3">Edit</a>
                    </div>
                    <div class="menu-item px-3">
                      <a href="{{ route('admin.company.show',$company) }}" class="menu-link form-control px-3">View</a>
                    </div>
                    <div class="menu-item px-3">
                        <form action="{{ route('admin.company.destroy',$company) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button  class="menu-link form-control px-3 b-0"  type="submit">{{ __('Delete') }}</button>
                        </form>
                    </div>
                  </div>
                </td>
              </tr>
            @empty
                
            @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--end::Post-->
@endsection
