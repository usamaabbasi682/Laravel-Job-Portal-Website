@extends('frontend.layouts.guest_mster')
@section('title','Job Details')
@section('main_content')
<div class="breadcrumbs breadcrumbs-height">
    <div class="container">
       <div class="breadcrumb-menu">
          <h6 class="f-size-18 m-0">
             Job Details
          </h6>
          <ul>
             <li><a href="../index.html">Home</a></li>
             <li>/</li>
             <li>Job Details</li>
          </ul>
       </div>
    </div>
 </div>
 <div class="breadcrumbs-height rt-pt-50">
    <div class="container">
       <div class="row align-items-center breadcrumbs-height">
          <div class="col-12">
             <div class="card jobcardStyle1 bg-transparent border-transparent hover:bg-transparent hover-shadow:none body-0">
                <div class="card-body">
                   <div class="rt-single-icon-box  flex-wrap">
                      <a href="javascript:void(0)" class="icon-thumb rt-mb-10 rt-mb-lg-20">
                        @php
                        $image=$job->company->getMedia('company_logo')->first();
                        @endphp
                        @isset($image)
                            <img src="{{ asset('storage/'.$image->id.'/'.$image->file_name) ?? '' }}" alt draggable="false" class="object-fit-contain" />
                        @else 
                            <img src="{{ asset('assets/media/avatars/defaultLogo.png') }}" alt draggable="false" class="object-fit-contain" />
                        @endisset
                      </a>
                      <div class="iconbox-content">
                         <div class="post-info2">
                            <div class="post-main-title2">
                               <a href="#">{{ ucwords($job->title) ?? '' }}</a>
                            </div>
                            <div class="tw-flex tw-items-center tw-gap-2">
                               <p class="tw-mb-0 tw-text-lg tw-text-[#474C54]">at
                                  <span>{{ ucwords($job->company->company_name) ?? '' }}</span>
                               </p>
                               <span class="tw-text-white tw-uppercase tw-text-sm tw-font-semibold tw-bg-[#0BA02C] tw-px-3 tw-py-1 tw-rounded-[3px]">
                               {{ ucfirst($job->job_type) ?? '' }}
                               </span>
                               <span class="tw-text-sm tw-font-semibold tw-bg-[#FFEDED] tw-py-1 tw-px-3 tw-rounded-[52px] tw-text-[#E05151]">
                               {{ ucfirst($job->job_feature) ?? '' }}
                               </span>
                            </div>
                         </div>
                      </div>
                      <div class="iconbox-extra align-self-center flex-md-row flex-column">
                         <div class="rt-mb-md-10">
                            <button type="button" class="bg-gray-10 text-primary-500 plain-button icon-56 hoverbg-primary-50 login_required">
                               <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M18 21L11.9993 17.25L6 21V4.5C6 4.30109 6.07902 4.11032 6.21967 3.96967C6.36032 3.82902 6.55109 3.75 6.75 3.75H17.25C17.4489 3.75 17.6397 3.82902 17.7803 3.96967C17.921 4.11032 18 4.30109 18 4.5V21Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                               </svg>
                            </button>
                         </div>
                         <a href="https://forms.gle/qhUeH3qte7N3rSJ5A" target="_blank" class="btn btn-primary btn-lg d-block">
                         <span class="button-content-wrapper ">
                         <span class="button-icon align-icon-right"><i class="ph-arrow-right"></i></span>
                         <span class="button-text">Apply Now</span>
                         </span>
                         </a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="single-job-content rt-pt-50 pb-5">
    <div class="container">
       <div class="row">
          <div class="col-lg-7 rt-mb-lg-30">
             <div class="body-font-1 ft-wt-5 rt-mb-20">
                Job Description
             </div>
             {!! $job->description ?? '' !!}
          </div>
          <div class="col-lg-5">
             <div class="p-32 border border-2 border-primary-50 rt-rounded-12 rt-mb-24 lg:max-536">
                <div class="row">
                   <div class="col-sm-6 salery tw-salery-border">
                      <h4>Salary</h4>
                      <h2>
                        @php
                        $selected_features = json_decode($job->salary_details,true);
                        @endphp
                        @if ($selected_features['job_feature_type'] == 'salary_range')
                            {{ $selected_features['min_salary'] ?? '' }} - {{ $selected_features['max_salary'] ?? '' }} USD
                        @else 
                            {{ $selected_features['custom_salary'] ?? '' }}
                        @endif
                      </h2>
                      <p>{{ $job->salary_type ?? '' }}</p>
                   </div>
                   <div class="col-sm-6 job-type">
                      <div class="remote">
                         <div class="text-center tw-mb-2">
                            <svg width="39" height="38" viewbox="0 0 39 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M32.73 10.6875H6.60498C5.94914 10.6875 5.41748 11.2192 5.41748 11.875V30.875C5.41748 31.5308 5.94914 32.0625 6.60498 32.0625H32.73C33.3858 32.0625 33.9175 31.5308 33.9175 30.875V11.875C33.9175 11.2192 33.3858 10.6875 32.73 10.6875Z" stroke="#0A65CC" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                               <path d="M25.604 10.6875V8.3125C25.604 7.68261 25.3538 7.07852 24.9084 6.63312C24.463 6.18772 23.8589 5.9375 23.229 5.9375H16.104C15.4741 5.9375 14.87 6.18772 14.4246 6.63312C13.9792 7.07852 13.729 7.68261 13.729 8.3125V10.6875" stroke="#0A65CC" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                               <path d="M33.9177 18.749C29.5867 21.2547 24.6701 22.5704 19.6665 22.5625C14.6638 22.5704 9.74794 21.2552 5.41748 18.7503" stroke="#0A65CC" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                               <path d="M17.8853 17.8125H21.4478" stroke="#0A65CC" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                         </div>
                         <h4 class="tw-mb-[2px]">{{ $job->job_type ?? '' }}</h4>
                         <p class="tw-mb-0">{{ $job->country ?? '' }}</p>
                      </div>
                   </div>
                </div>
             </div>
             <div class="p-32 border border-2 border-primary-50 rt-rounded-12 rt-mb-24 lg:max-536">
                <div class="row">
                   <div class="col-12">
                      <h2 class="tw-text-[#18191C] tw-text-lg tw-font-medium tw-mb-4"></h2>
                      <div class="tw-flex tw-flex-wrap tw-gap-2">
                        @forelse ($job->benefits as $benefit)
                        <span class="tw-bg-[#F1F2F4] tw-rounded-[4px] tw-text-[#098023] tw-text-sm tw-font-medium tw-px-3 tw-py-[7px]">
                            {{ ucwords($benefit->name) ?? '' }}
                        </span>
                        @empty
                            
                        @endforelse
                      </div>
                   </div>
                </div>
             </div>
             <div class="border border-2 border-primary-50 rt-rounded-12 rt-mb-24 lg:max-536">
                <div class="tw-px-8 tw-pb-6 tw-pt-8">
                   <div class="body-font-1 ft-wt-5 rt-mb-32 ">Job Overview</div>
                   <div class="row">
                      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 rt-mb-32">
                         <div class="single-jSidebarWidget">
                            <div class="icon-thumb">
                               <i class="ph-calendar-blank f-size-30 text-primary-500"></i>
                            </div>
                            <div class="iconbox-content">
                               <div class="f-size-12 text-gray-500 uppercase text-uppercase rt-mb-6">
                                  Job Posted:
                               </div>
                               <span class="d-block f-size-14 ft-wt-5 text-gray-900">
                                {{ $job->created_at->format('d M ,Y') }}
                               </span>
                            </div>
                         </div>
                      </div>
                      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 rt-mb-32">
                         <div class="single-jSidebarWidget">
                            <div class="icon-thumb">
                               <i class="ph-suitcase-simple f-size-30 text-primary-500"></i>
                            </div>
                            <div class="iconbox-content">
                               <div class="f-size-12 text-gray-500 uppercase text-uppercase rt-mb-6">
                                  Job Type
                               </div>
                               <span class="d-block f-size-14 ft-wt-5 text-gray-900">
                               {{ $job->job_type ?? '' }}
                               </span>
                            </div>
                         </div>
                      </div>
                      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 rt-mb-32">
                         <div class="single-jSidebarWidget">
                            <div class="icon-thumb">
                               <i class="ph-user f-size-30 text-primary-500"></i>
                            </div>
                            <div class="iconbox-content">
                               <div class="f-size-12 text-gray-500 uppercase text-uppercase rt-mb-6">
                                  Job Role
                               </div>
                               <span class="d-block f-size-14 ft-wt-5 text-gray-900">
                               {{ $job->jobrole->name ?? '' }}
                               </span>
                            </div>
                         </div>
                      </div>
                      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 rt-mb-32">
                         <div class="single-jSidebarWidget">
                            <div class="icon-thumb rt-mr-17">
                               <i class="ph-graduation-cap f-size-30 text-primary-500"></i>
                            </div>
                            <div class="iconbox-content">
                               <div class="f-size-12 text-gray-500 uppercase text-uppercase rt-mb-6">
                                  Education
                               </div>
                               <span class="d-block" f-size-14 ft-wt-5 text-gray-900">
                               {{ $job->education ?? '' }}
                               </span>
                            </div>
                         </div>
                      </div>
                      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 rt-mb-32">
                         <div class="single-jSidebarWidget">
                            <div class="icon-thumb rt-mr-17">
                               <i class="ph-clipboard-text f-size-30 text-primary-500"></i>
                            </div>
                            <div class="iconbox-content">
                               <div class="f-size-12 text-gray-500 uppercase text-uppercase rt-mb-6">
                                  Experience
                               </div>
                               <span class="d-block" f-size-14 ft-wt-5 text-gray-900">
                               {{ $job->experience ?? '' }}
                               </span>
                            </div>
                         </div>
                      </div>
                      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 rt-mb-32">
                         <div class="single-jSidebarWidget">
                            <div class="icon-thumb rt-mr-17">
                               <i class="ph-users f-size-30 text-primary-500"></i>
                            </div>
                            <div class="iconbox-content">
                               <div class="f-size-12 text-gray-500 uppercase text-uppercase rt-mb-6">
                                  Vacancies
                               </div>
                               <span class="d-block" f-size-14 ft-wt-5 text-gray-900">
                               {{ $job->vacancies ?? '' }}
                               </span>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="tw-share-area tw-px-8 tw-pt-6 tw-pb-8">
                   <h2 class="tw-text-[#18191C] tw-text-lg tw-font-medium tw-mb-2">Share This Job:</h2>
                   <ul class="tw-list-none tw-flex tw-items-center tw-gap-2 tw-p-0 tw-m-0 tw-mb-6">
                      <li class="tw-text-[#0A65CC] hover:tw-bg-[#0A65CC] tw-cursor-pointer hover:tw-text-white tw-flex tw-gap-1.5 tw-items-center tw-text-base tw-font-medium tw-bg-[#E7F0FA] tw-px-4 tw-py-2 tw-rounded-[4px]" onclick="copyUrl('mid-level-laravel-developer_1687761598_9272327890.html')">
                         <span>
                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M8.81787 15.1813L15.1818 8.81738" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                               <path d="M13.5904 16.7731L10.9388 19.4248C10.0948 20.2685 8.95028 20.7424 7.75694 20.7423C6.5636 20.7422 5.41916 20.2681 4.57534 19.4242C3.73152 18.5804 3.25743 17.436 3.25732 16.2426C3.25722 15.0493 3.73112 13.9048 4.5748 13.0608L7.22645 10.4092" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                               <path d="M16.7727 13.5899L19.4243 10.9383C20.268 10.0943 20.7419 8.94979 20.7418 7.75645C20.7417 6.56311 20.2676 5.41867 19.4238 4.57486C18.5799 3.73104 17.4355 3.25694 16.2422 3.25684C15.0488 3.25673 13.9043 3.73064 13.0603 4.57431L10.4087 7.22596" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                         </span>
                         <span>Copy Link</span>
                      </li>
                      <li>
                         <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://jobpilot.templatecookie.com/job/mid-level-laravel-developer_1687761598_9272327890" class="tw-inline-flex tw-bg-[#E7F0FA] tw-text-[#0A65CC] hover:tw-bg-[#0A65CC] hover:tw-text-white tw-rounded-[4px] tw-p-2.5">
                            <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <g clip-path="url(#clip0_3338_76929)">
                                  <path d="M20 10C20 4.47715 15.5229 0 10 0C4.47715 0 0 4.47715 0 10C0 14.9912 3.65684 19.1283 8.4375 19.8785V12.8906H5.89844V10H8.4375V7.79688C8.4375 5.29063 9.93047 3.90625 12.2146 3.90625C13.3084 3.90625 14.4531 4.10156 14.4531 4.10156V6.5625H13.1922C11.95 6.5625 11.5625 7.3334 11.5625 8.125V10H14.3359L13.8926 12.8906H11.5625V19.8785C16.3432 19.1283 20 14.9912 20 10Z" fill="none" />
                                  <path d="M13.8926 12.8906L14.3359 10H11.5625V8.125C11.5625 7.33418 11.95 6.5625 13.1922 6.5625H14.4531V4.10156C14.4531 4.10156 13.3088 3.90625 12.2146 3.90625C9.93047 3.90625 8.4375 5.29063 8.4375 7.79688V10H5.89844V12.8906H8.4375V19.8785C9.47287 20.0405 10.5271 20.0405 11.5625 19.8785V12.8906H13.8926Z" fill="currentColor" />
                               </g>
                               <defs>
                                  <clippath id="clip0_3338_76929">
                                     <rect width="20" height="20" fill="white" />
                                  </clipPath>
                               </defs>
                            </svg>
                         </a>
                      </li>
                      <li>
                         <a target="_blank" href="https://pinterest.com/pin/create/button/?url=http://jobpilot.templatecookie.com/job/mid-level-laravel-developer_1687761598_9272327890" class="tw-inline-flex tw-bg-[#E7F0FA] tw-text-[#0A65CC] hover:tw-bg-[#0A65CC] hover:tw-text-white tw-rounded-[4px] tw-p-2.5">
                            <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M6.2896 18.126C13.8368 18.126 17.9648 11.8732 17.9648 6.45084C17.9648 6.27324 17.9648 6.09644 17.9528 5.92044C18.7559 5.33957 19.4491 4.62034 20 3.79644C19.2512 4.12844 18.4567 4.34607 17.6432 4.44204C18.4998 3.92928 19.141 3.12269 19.4472 2.17244C18.6417 2.65045 17.7605 2.9873 16.8416 3.16844C16.2229 2.51059 15.4047 2.07497 14.5135 1.92901C13.6223 1.78305 12.7078 1.93487 11.9116 2.36098C11.1154 2.7871 10.4819 3.46375 10.109 4.28623C9.73605 5.10871 9.64462 6.03116 9.8488 6.91084C8.21741 6.82901 6.62146 6.40503 5.16455 5.66644C3.70763 4.92786 2.4223 3.89116 1.392 2.62364C0.867274 3.52697 0.70656 4.59633 0.942583 5.61399C1.17861 6.63165 1.79362 7.5211 2.6624 8.10124C2.00936 8.08211 1.37054 7.90594 0.8 7.58764V7.63964C0.800259 8.58702 1.12821 9.50514 1.72823 10.2383C2.32824 10.9714 3.16338 11.4744 4.092 11.662C3.4879 11.8268 2.85406 11.8509 2.2392 11.7324C2.50151 12.5477 3.01202 13.2606 3.69937 13.7716C4.38671 14.2825 5.21652 14.5658 6.0728 14.582C5.22203 15.2508 4.24776 15.7452 3.20573 16.037C2.16369 16.3289 1.07435 16.4124 0 16.2828C1.87653 17.487 4.05994 18.1258 6.2896 18.1228" fill="currentColor" />
                            </svg>
                         </a>
                      </li>
                   </ul>
                   <h2 class="tw-text-[#18191C] tw-text-lg tw-font-medium tw-mb-2">Job Tags:</h2>
                   <div class="tw-flex tw-gap-2 tw-flex-wrap tw-items-center">
                    @forelse ($job->tags as $tag)
                    <a href="javascript:void(0)" class="tw-inline-flex tw-text-[#5E6670] tw-text-sm tw-font-medium tw-px-2.5 tw-py-1 tw-bg-[#F1F2F4] tw-border tw-border-[#E4E5E8] tw-rounded-[4px] hover:tw-text-[#18191C]">
                     {{ $tag->name ?? '' }}
                    </a>
                    @empty
                        
                    @endforelse
                   </div>
                </div>
             </div>
             <div class="border border-2 border-primary-50 rt-rounded-12 rt-mb-24 lg:max-536">
                <div class="body-font-1 ft-wt-5 custom-p p-5">
                   Location <br>
                   <p class="body-font-3">{{ $job->location ?? '' }}</p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="rt-spacer-100 rt-spacer-md-50"></div>
 <hr class="hr-0">
 <section class="related-jobs-area rt-pt-100 rt-pt-md-50 mb-5">
    <div class="container">
       <h4>Related Jobs</h4>
       <div class="rt-spacer-40 rt-spacer-md-20"></div>
       <div class="related-jobs pb-5">
          <div class="row">
            @forelse ($related_jobs as $related_job)
            <div class="col-12 col-md-6 col-xl-4 mb-3">
               <div class="single-item">
                  <div class="card tw-card jobcardStyle1 ">
                     <div class="tw-p-6">
                        <div class="tw-mb-5">
                           <div class="tw-mb-1.5">
                              <a href="{{ url('job-details/'.$related_job->slug) }}" class="tw-text-[#18191C] tw-text-lg tw-font-medium">
                              {{ ucwords($related_job->title) ?? '' }}
                              </a>
                           </div>
                           <div class="tw-flex tw-gap-2 tw-items-center">
                              <span class="tw-text-[#0BA02C] tw-text-[12px] tw-leading-[12px] tw-font-semibold tw-bg-[#E7F6EA] tw-px-2 tw-py-1 tw-rounded-[3px]">{{ $related_job->job_type ?? '' }}</span>
                              <span class="tw-text-sm tw-text-[#767F8C]">
                              Salary:
                              @php
                              $selected_features = json_decode($related_job->salary_details,true);
                              @endphp
                              @if ($selected_features['job_feature_type'] == 'salary_range')
                                  {{ $selected_features['min_salary'] ?? '' }} - {{ $selected_features['max_salary'] ?? '' }} USD
                              @else 
                                  {{ $selected_features['custom_salary'] ?? '' }}
                              @endif
                              </span>
                           </div>
                        </div>
                        <div class="rt-single-icon-box tw-flex-wrap tw-gap-4">
                           <a href="{{ url('job-details/'.$related_job->slug) }}">
                              <div class="tw-w-[56px] tw-h-[56px]">
                                 @php
                                 $image=$related_job->company->getMedia('company_logo')->first();
                                 @endphp
                                 @isset($image)
                                     <img src="{{ asset('storage/'.$image->id.'/'.$image->file_name) ?? '' }}" class="tw-rounded-lg tw-w-[56px] tw-h-[56px]" alt draggable="false" />
                                 @else 
                                     <img src="{{ asset('assets/media/avatars/defaultLogo.png') }}" class="tw-rounded-lg tw-w-[56px] tw-h-[56px]" alt draggable="false" />
                                 @endisset
                              </div>
                           </a>
                           <div class="iconbox-content">
                              <div class="tw-mb-1 tw-inline-flex">
                                 <a href="{{ url('job-details/'.$related_job->slug) }}" class="tw-text-base tw-font-medium tw-text-[#18191C] tw-card-title">{{ $related_job->company->company_name ?? '' }}</a>
                              </div>
                              <span class="tw-flex tw-items-center tw-gap-1">
                              <i class="ph-map-pin"></i>
                              <span class="tw-location">{{ $related_job->country ?? '' }}</span>
                              </span>
                           </div>
                           <div class>
                              <div class="text-primary-500 hoverbg-primary-50 plain-button icon-button">
                                 <button type="button" class="tw-text-[#C8CCD1] hover:tw-text-[#0A65CC] hoverbg-primary-50 plain-button icon-button login_required">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M18 21L11.9993 17.25L6 21V4.5C6 4.30109 6.07902 4.11032 6.21967 3.96967C6.36032 3.82902 6.55109 3.75 6.75 3.75H17.25C17.4489 3.75 17.6397 3.82902 17.7803 3.96967C17.921 4.11032 18 4.30109 18 4.5V21Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @empty
               
            @endforelse
          </div>
       </div>
    </div>
 </section>
 <div class="modal fade" id="cvModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header border-transparent">
             <h5 class="modal-title" id="cvModalLabel">Job: <span id="apply_job_title">Job
                Title</span>
             </h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="https://jobpilot.templatecookie.com/jobs/apply?mern-stack-developer_1687761601_6069549512" method="POST">
             <input type="hidden" name="_token" value="73C960WcaJ5w6HimPAiBaNnpCCQlf22m4e93izN8"> 
             <div class="modal-body mt-3">
                <input type="hidden" id="apply_job_id" name="id">
                <div class="from-group">
                   <div class="tw-flex tw-justify-between tw-items-center">
                      <label class="class" for="for">
                      Choose Resume
                      <span class="form-label-required text-danger">*</span>
                      </label>
                      <div class="tw-m-2">
                         <button onclick="resumeAddModal()" type="button" class=" tw-bg-white tw-tracking-wide tw-text-gray-800 tw-font-bold tw-rounded tw-border-b-2 tw-border-blue-500 hover:tw-border-blue-600 hover:tw-bg-blue-500 hover:tw-text-white tw-shadow-md tw-py-1.5 tw-px-6 tw-inline-flex tw-items-center">
                         <span class="tw-mx-auto">Add Resume</span>
                         </button>
                      </div>
                   </div>
                   <select id="resume_id" class="rt-selectactive form-control w-100-p" name="resume_id">
                      <option value>Select One</option>
                   </select>
                </div>
                <div class="form-group mt-3">
                   <label class="class" for="for">
                   Cover Letter
                   <span class="form-label-required text-danger">*</span>
                   </label>
                   <textarea id="default" class="form-control " name="cover_letter" rows="7"></textarea>
                </div>
             </div>
             <div class="modal-footer border-transparent">
                <button type="button" class="bg-priamry-50 btn btn-outline-primary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                <button type="submit" class="btn btn-primary btn-lg">
                <span class="button-content-wrapper ">
                <span class="button-icon align-icon-right"><i class="ph-arrow-right"></i></span>
                <span class="button-text">
                Apply Now
                </span>
                </span>
                </button>
             </div>
          </form>
       </div>
    </div>
    {{-- <div class="modal fade" id="resumeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog tw-max-w-[536px]">
          <div class="modal-content">
             <form action="#" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="73C960WcaJ5w6HimPAiBaNnpCCQlf22m4e93izN8"> 
                <div class="modal-body">
                   <h5 class="tw-text-lg tw-text-[#18191C] tw-font-semibold tw-mb-[18px]" id="cvModalLabel">
                      Add Cv/Resume
                   </h5>
                   <div class="from-group py-2">
                      <label class="tw-mb-2 tw-text-sm tw-text-[#18191C]" for="for">
                      Cv/Resume Name
                      <span class="form-label-required text-danger">*</span>
                      </label>
                      <input type="text" placeholder="Cv/Resume Name" name="resume_name" id>
                      <span id="resume_name" class="tw-text-sm tw-text-red-500"></span>
                   </div>
                   <div class="form-group tw-mb-6">
                      <label class="tw-mb-2 tw-text-sm tw-text-[#18191C]" for="for">
                      Upload Cv/Resume
                      <span class="form-label-required text-danger">*</span>
                      </label>
                      <div class="cv-image-upload-wrap">
                         <input name="resume_file" onchange="resumeManageReadURL(this, 'add');" id="resume_add_input" class="resume-file-upload-input" type="file" accept="application/pdf" id="resume_add_input" />
                         <div class="drag-text">
                            <svg width="48" height="49" viewbox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M32 32.5L24 24.5L16 32.5" stroke="#ADB2BA" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                               <path d="M24 24.5V42.5" stroke="#ADB2BA" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                               <path d="M40.7809 37.2809C42.7316 36.2175 44.2726 34.5347 45.1606 32.4982C46.0487 30.4617 46.2333 28.1874 45.6853 26.0343C45.1373 23.8812 43.8879 21.972 42.1342 20.6078C40.3806 19.2437 38.2226 18.5024 36.0009 18.5009H33.4809C32.8755 16.1594 31.7472 13.9856 30.1808 12.1429C28.6144 10.3002 26.6506 8.83664 24.4371 7.86216C22.2236 6.88767 19.818 6.42766 17.4011 6.51671C14.9843 6.60576 12.619 7.24154 10.4833 8.37628C8.34747 9.51101 6.49672 11.1152 5.07014 13.0681C3.64356 15.0211 2.67828 17.272 2.24686 19.6517C1.81544 22.0314 1.92911 24.478 2.57932 26.8075C3.22954 29.1369 4.39938 31.2887 6.0009 33.1009" stroke="#ADB2BA" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                               <path d="M32 32.5L24 24.5L16 32.5" stroke="#ADB2BA" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <h3>Browse file</h3>
                            <p>Available format - PDF<br>
                               Maximum file size - 5 MB
                            </p>
                         </div>
                      </div>
                      <div class="resume-file-upload-content none">
                         <div class="wrap">
                            <svg width="32" height="32" viewbox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M24.999 28H6.99805C6.73283 28 6.47848 27.8946 6.29094 27.7071C6.1034 27.5196 5.99805 27.2652 5.99805 27V5C5.99805 4.73478 6.1034 4.48043 6.29094 4.29289C6.47848 4.10536 6.73283 4 6.99805 4H18.999L25.999 11V27C25.999 27.1313 25.9732 27.2614 25.9229 27.3827C25.8727 27.504 25.799 27.6143 25.7061 27.7071C25.6133 27.8 25.503 27.8736 25.3817 27.9239C25.2604 27.9741 25.1303 28 24.999 28Z" stroke="#0A65CC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                               <path d="M19 4V11H26.001" stroke="#0A65CC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                               <path d="M12 17H20" stroke="#0A65CC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                               <path d="M12 21H20" stroke="#0A65CC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <h3 class="resume_selected_file_name">file</h3>
                            <p>
                               <span><span class="resume_selected_file_size">2.3</span> MB</span> <br>
                               <span class="resume_selected_file_type">.pdf</span>
                            </p>
                            <div class="image-title-wrap">
                               <button type="button" class="cv-remove-image">
                                  <svg width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M3 6H5H21" stroke="#FF4F4F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                     <path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#FF4F4F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                     <path d="M14 11V17" stroke="#FF4F4F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                     <path d="M10 11V17" stroke="#FF4F4F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                  </svg>
                               </button>
                            </div>
                         </div>
                      </div>
                      <span id="resume_file" class="tw-text-sm tw-text-red-500"></span>
                   </div>
                   <div class="tw-flex tw-justify-between">
                      <button onclick="resumeModalClose()" type="button" class="bg-priamry-50 btn btn-primary-50">Cancel</button>
                      <button type="submit" class="btn btn-primary btn-lg">
                      <span class="button-content-wrapper ">
                      <span class="button-icon align-icon-right"><i class="ph-arrow-right"></i></span>
                      <span class="button-text">
                      Add Cv/Resume
                      </span>
                      </span>
                      </button>
                   </div>
                   <button type="button" onclick="resumeModalClose()" class="tw-rounded-full tw-flex tw-items-center tw-justify-center tw-p-3 tw-absolute -tw-top-[25px] -tw-right-[25px] tw-bg-white tw-border-2 tw-border-[#E7F0FA]">
                      <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M18.75 5.25L5.25 18.75" stroke="#0A65CC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                         <path d="M18.75 18.75L5.25 5.25" stroke="#0A65CC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                   </button>
                </div>
             </form>
          </div>
       </div>
    </div> --}}
 </div>
@endsection