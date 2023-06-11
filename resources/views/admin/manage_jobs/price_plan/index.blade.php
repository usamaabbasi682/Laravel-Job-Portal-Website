@extends('layouts.app') @section('title','Dashboard') @section('top_heading')
<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
   <!--begin::Page title-->
   <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
      <!--begin::Title-->
      <h1 class="d-flex text-dark fw-bold m-0 fs-3">Job Plan</h1>
      <!--end::Title-->
      <!--begin::Breadcrumb-->
      <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
         <!--begin::Item-->
         <li class="breadcrumb-item text-gray-600">Dashboard</li>
         <!--end::Item-->
         <!--begin::Item-->
         <li class="breadcrumb-item text-gray-500">Plans</li>
         <!--end::Item-->
      </ul>
      <!--end::Breadcrumb-->
   </div>
   <!--end::Page title-->
</div>
@endsection @section('main_content')
<div class="content flex-row-fluid" id="kt_content">
   <!--begin::Pricing card-->
   <div class="card" id="kt_pricing">
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
      <!--begin::Card body-->
      <div class="card-body p-lg-17">
         <!--begin::Plans-->
         <div class="d-flex flex-column">
            <!--begin::Heading-->
            <div class="mb-13 text-center">
               <h1 class="fs-2hx fw-bold mb-5">Job Plans Details</h1>
            </div>
            <!--end::Heading-->
            <!--begin::Nav group-->
            <div class="nav-group nav-group-outline mx-auto mb-15" data-kt-buttons="true">
               <a href="{{ route('admin.jobPlan.create') }}" class="btn btn-color-gray-400 btn-active btn-active-primary px-6 py-3 me-2 active">Create Plan</a>
            </div>
            <!--end::Nav group-->
            <!--begin::Row-->
            <div class="row g-10">
               <!--begin::Col-->
               @foreach ($jobPlans as $jobPlan)
               <div class="col-xl-4">
                  <div class="d-flex h-100 align-items-center">
                     <!--begin::Option-->
                     <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                        <!--begin::Heading-->
                        <div class="mb-7 text-center">
                           <!--begin::Title-->
                           <h1 class="text-dark mb-5 fw-bolder">{{ ucwords($jobPlan->label) ?? '' }}</h1>
                           <!--end::Title-->
                           <!--begin::Description-->
                           <div class="text-gray-400 fw-semibold mb-5">{!! $jobPlan->desc ?? '' !!}</div>
                           <!--end::Description-->
                           <!--begin::Price-->
                           <div class="text-center">
                              <span class="mb-2 text-primary">{{ $jobPlan->currency_symbol ?? '' }}</span>
                              <span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="39" data-kt-plan-price-annual="399">{{ $jobPlan->price ?? '' }}</span>
                              <span class="fs-7 fw-semibold opacity-50">/ <span data-kt-element="period">Unlimited</span></span>
                           </div>
                           <!--end::Price-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Features-->
                        <div class="w-100 mb-10">
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">Job Post Limit</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                              <span class="badge badge-light-success">{{ $jobPlan->job_post_limit ?? '' }}</span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">Featured Job Post Limit</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                              <span class="badge badge-light-success">{{ $jobPlan->featured_job_post_limit ?? '' }}</span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">Highlighted Job Post Limit</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                              <span class="badge badge-light-success">{{ $jobPlan->highlight_job_post_limit ?? '' }}</span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">Candidate Cv Preview Limit</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                 @if ($jobPlan->cv_view_limit > 0)     
                                 <span class="badge badge-light-success">
                                    {{ $jobPlan->cv_view_limit }}
                                 </span>                         
                                 @else
                                 <span class="svg-icon svg-icon-1" style="padding-right:3px;">
                                    <img src="{{ asset('assets/media/svg/infinity-svgrepo-com.svg') }}" width="17" alt="infinity">
                                 </span>
                                 @endif
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">Show this package on frontend</span>
                              @if ($jobPlan->display_frontend)
                              <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                              <span class="svg-icon svg-icon-1 svg-icon-success">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                              @else
                              <span class="svg-icon svg-icon-1">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor"></rect>
                                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor"></rect>
                                 </svg>
                              </span>
                              @endif
                           </div>
                           <!--end::Item-->
                        </div>
                        <!--end::Features-->
                        <!--begin::Select-->
                        <div class="d-flex">
                           <a href="{{ route('admin.jobPlan.edit',$jobPlan) }}" class="btn btn-sm btn-light-primary">Edit</a>
                           <form action="{{ route('admin.jobPlan.destroy',$jobPlan) }}" method="post">
                              {{ csrf_field() }}
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-light-danger" style="margin-left: 20px;">Delete</button>
                           </form>
                        </div>
                        <!--end::Select-->
                     </div>
                     <!--end::Option-->
                  </div>
               </div>
               @endforeach
               <!--end::Col-->
            </div>
            <!--end::Row-->
         </div>
         <!--end::Plans-->
      </div>
      <!--end::Card body-->
   </div>
   <!--end::Pricing card-->
</div>
@endsection
