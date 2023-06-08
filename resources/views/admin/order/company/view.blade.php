@extends('layouts.app') 
@section('title','Dashboard') 
@section('top_heading')
<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
   <!--begin::Page title-->
   <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
      <!--begin::Title-->
      <h1 class="d-flex text-dark fw-bold m-0 fs-3">Company Details</h1>
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
         <li class="breadcrumb-item text-gray-500">View Company</li>
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
   <!-- begin::Invoice 3-->
   <div class="card">
      <!-- begin::Body-->
      <div class="card-body py-20">
         <!-- begin::Wrapper-->
         <div class="mw-lg-950px mx-auto w-100">
            <!-- begin::Header-->
            <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
               <h4 class=" text-gray-800 fs-2qx pe-5 pb-7">{{ ucwords($company->company_name).' Details' ?? '' }}</h4>
               <!--end::Logo-->
               <div class="text-sm-end">
                  <!--begin::Logo-->
                  <a href="javascript:void(0)" class="d-block mw-150px ms-sm-auto">
                    @php
                        $logo=$company->getMedia('company_logo')->first();
                    @endphp
                    @isset($logo)
                        <img src="{{ asset('storage/'.$logo->id.'/'.$logo->file_name) ?? '' }}" class="w-50" alt="Logo" />
                    @else 
                        <img src="{{ asset('assets/media/avatars/default_logo.png') }}" alt="Default Logo" class="w-100" />
                    @endisset
                     {{-- <img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/lloyds-of-london-logo.svg') }}" class="w-100" /> --}}
                  </a>
                  <!--end::Logo-->
                  <!--begin::Text-->
                  <div class="text-sm-end fw-semibold fs-4 text-muted mt-7">
                     <div>{{ $company->contact ?? '' }}</div>
                     <div>{{ $company->email ?? '' }}</div>
                  </div>
                  <!--end::Text-->
               </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="pb-12">
               <!--begin::Wrapper-->
               <div class="d-flex flex-column gap-7 gap-md-10">
                  <!--begin::Message-->
                  <div class="fw-bold fs-2">
                     {{ $company->country ?? '' }} <span class="fs-6">({{ $company->org_type ?? '' }})</span>,
                     <br />
                     <span class="text-muted fs-5">{{ $company->location ?? '' }}</span>
                  </div>
                  <!--begin::Message-->
                  <!--begin::Separator-->
                  <div class="separator"></div>
                  <!--begin::Separator-->
                  <!--begin::Order details-->
                  <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                     <div class="flex-root d-flex flex-column">
                        <span class="text-muted">Team Size</span>
                        <span class="fs-5">{{ $company->team_size ?? '' }}</span>
                     </div>
                     <div class="flex-root d-flex flex-column">
                        <span class="text-muted">Establishment Date</span>
                        <span class="fs-5">{{ $company->establishment_date ?? '' }}</span>
                     </div>
                     <div class="flex-root d-flex flex-column">
                        <span class="text-muted">Website</span>
                        <span class="fs-5">{{ $company->website ?? 'N/A' }}</span>
                     </div>
                     <div class="flex-root d-flex flex-column">
                        <span class="text-muted">Industry</span>
                        <span class="fs-5">{{ $company->industry->name ?? '' }}</span>
                     </div>
                  </div>
                  <!--end::Order details-->

                  <!--begin:Order summary-->
                  <div class="d-flex justify-content-between flex-column mt-5">
                    <div class="row">
                        @if ($company->bio != '')
                        <div class="col-md-12 ">
                            <div class="fw-bold fs-2">
                                Description
                             </div>
                             <p>{!! $company->bio !!}</p>
                        </div>
                        @endif

                        @if ($company->vision != '')
                        <div class="col-md-12 ">
                            <div class="fw-bold fs-2">
                                Vision
                             </div>
                             <p>{!! $company->vision !!}</p>
                        </div>
                        @endif
                    </div>
                  </div>
                  <!--end:Order summary-->
               </div>
               <!--end::Wrapper-->
            </div>
            <!--end::Body-->
            <!-- begin::Footer-->
            <div class="d-flex flex-stack flex-wrap mt-lg-20 pt-6">

            </div>
            <!-- end::Footer-->
         </div>
         <!-- end::Wrapper-->
      </div>
      <!-- end::Body-->
   </div>
   <!-- end::Invoice 1-->
</div>
<!--end::Post-->
@endsection
