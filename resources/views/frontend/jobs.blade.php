@extends('frontend.layouts.guest_mster')
@section('title','Jobs')
@section('main_content')

<form action="https://jobpilot.templatecookie.com/jobs" method="GET" id="job_search_form">
    <div class="breadcrumbs style-two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 position-relative">
                    <div class="breadcrumb-menu">
                        <h6 class="f-size-18 m-0">Find Job</h6>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>/</li>
                            <li>Find Job</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row tw-filter-box tw-my-6 tw-mx-1.5 sm:tw-mx-0">
                <div class="col-lg-5 tw-p-3 search-col">
                    <div class="search-col-4 fromGroup position-relative">
                        <input id="search_jobs" name="keyword" type="text" placeholder="Job Title, Keyword" value autocomplete="off" class="tw-border-0 tw-pl-12" />
                        <div class="tw-absolute tw-top-1/2 -tw-translate-y-1/2 tw-left-3">
                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                    stroke="var(--primary-500)"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path d="M20.9999 21L16.6499 16.65" stroke="var(--primary-500)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span id="autocomplete_job_results_job_page"></span>
                    </div>
                </div>
                <input type="hidden" name="lat" id="lat" class="leaf_lat" value />
                <input type="hidden" name="long" id="long" class="leaf_lon" value />
                <div class="col-lg-7 tw-p-3">
                    <div class="tw-flex tw-flex-wrap md:tw-flex-nowrap tw-gap-3">
                        <div class="tw-w-full tw-relative fromGroup">
                            <input name="long" class="leaf_lon" type="hidden" value />
                            <input name="lat" class="leaf_lat" type="hidden" value />
                            <input type="text" id="leaflet_search" placeholder="Enter Location" name="location" value class="tw-border-0 tw-pl-12" autocomplete="off" />
                            <div class="tw-absolute tw-top-1/2 -tw-translate-y-1/2 tw-left-3">
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z"
                                        stroke="#0A65CC"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                        stroke="#0A65CC"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <button
                                type="button"
                                class="btn tw-inline-flex gap-3 tw-items-center hover:tw-bg-[#F1F2F4] tw-bg-[#F1F2F4] hover:tw-text-[#18191C] tw-text-[#18191C] tw-border-0"
                                data-bs-toggle="modal"
                                data-bs-target="#filtersModal"
                            >
                                <span class>
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.0001 10.125L12.0001 20.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12.0001 3.75L12.0001 6.375" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M12.0001 10.125C13.0357 10.125 13.8751 9.28553 13.8751 8.25C13.8751 7.21447 13.0357 6.375 12.0001 6.375C10.9646 6.375 10.1251 7.21447 10.1251 8.25C10.1251 9.28553 10.9646 10.125 12.0001 10.125Z"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path d="M18.7501 17.625L18.7502 20.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M18.7502 3.75L18.7501 13.875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M18.7501 17.625C19.7857 17.625 20.6251 16.7855 20.6251 15.75C20.6251 14.7145 19.7857 13.875 18.7501 13.875C17.7146 13.875 16.8751 14.7145 16.8751 15.75C16.8751 16.7855 17.7146 17.625 18.7501 17.625Z"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path d="M5.25007 14.625L5.25 20.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.25 3.75L5.25007 10.875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M5.25012 14.625C6.28566 14.625 7.12512 13.7855 7.12512 12.75C7.12512 11.7145 6.28566 10.875 5.25012 10.875C4.21459 10.875 3.37512 11.7145 3.37512 12.75C3.37512 13.7855 4.21459 14.625 5.25012 14.625Z"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </span>
                                <span>Filter</span>
                            </button>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary tw-inline-block">
                                Find Job
                            </button>
                        </div>
                    </div>
                    <span id="autocomplete_job_results"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="filtersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-wrapper md:tw-max-w-[352px] tw-w-[80%] tw-my-0 tw-absolute tw-top-0 tw-bootom-0 tw-left-0">
            <div class="modal-content tw-rounded-none">
                <div class="tw-px-5 tw-pt-5">
                    <h2 class="tw-text-sm tw-text-[#0A65CC] tw-mb-2 tw-font-medium">Category</h2>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input checked type="radio" id="allcategory" class="tw-scale-125" name="category" value />
                        <label for="allcategory" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">All Category</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="Engineer/Architects_1" class="tw-scale-125" name="category" value="1" />
                        <label for="Engineer/Architects_1" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">Engineer/Architects</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="Garments/Textile_2" class="tw-scale-125" name="category" value="2" />
                        <label for="Garments/Textile_2" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">Garments/Textile</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="Design/Creative_3" class="tw-scale-125" name="category" value="3" />
                        <label for="Design/Creative_3" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">Design/Creative</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="Hospitality/ Travel/ Tourism_4" class="tw-scale-125" name="category" value="4" />
                        <label for="Hospitality/ Travel/ Tourism_4" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">Hospitality/ Travel/ Tourism</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="IT &amp; Telecommunication_5" class="tw-scale-125" name="category" value="5" />
                        <label for="IT &amp; Telecommunication_5" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">IT &amp; Telecommunication</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="Medical/Pharma_6" class="tw-scale-125" name="category" value="6" />
                        <label for="Medical/Pharma_6" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">Medical/Pharma</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="Driving/Motor Technician_7" class="tw-scale-125" name="category" value="7" />
                        <label for="Driving/Motor Technician_7" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">Driving/Motor Technician</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="Law/Legal_8" class="tw-scale-125" name="category" value="8" />
                        <label for="Law/Legal_8" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">Law/Legal</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="Others_9" class="tw-scale-125" name="category" value="9" />
                        <label for="Others_9" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">Others</label>
                    </div>
                </div>
                <hr class="tw-bg-[#E4E5E8] tw-m-0" />
                <div class="tw-p-5">
                    <h2 class="tw-text-sm tw-text-[#0A65CC] tw-mb-2 tw-font-medium">Job Type</h2>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="Full Time_1" class="tw-scale-125" name="job_type" value="Full Time" />
                        <label for="Full Time_1" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">Full Time</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="Part Time_2" class="tw-scale-125" name="job_type" value="Part Time" />
                        <label for="Part Time_2" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">Part Time</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="Contractual_3" class="tw-scale-125" name="job_type" value="Contractual" />
                        <label for="Contractual_3" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">Contractual</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="Intern_4" class="tw-scale-125" name="job_type" value="Intern" />
                        <label for="Intern_4" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">Intern</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input type="radio" id="Freelance_5" class="tw-scale-125" name="job_type" value="Freelance" />
                        <label for="Freelance_5" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">Freelance</label>
                    </div>
                </div>
                <hr class="tw-bg-[#E4E5E8] tw-m-0" />
                <div class="tw-p-5">
                    <h2 class="tw-text-sm tw-text-[#0A65CC] tw-mb-8 tw-font-medium">Salary</h2>
                    <div>
                        <input type="hidden" name="price_min" id="price_min" value />
                        <input type="hidden" name="price_max" id="price_max" value />
                        <div id="priceCollapse" class="accordion-collapse collapse show mt-2" aria-labelledby="priceTag" data-bs-parent="#accordionGroup">
                            <div class="accordion-body list-sidebar__accordion-body">
                                <div class="price-range-slider">
                                    <div id="priceRangeSlider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tw-flex tw-justify-between tw-items-center tw-mb-4">
                        <p class="tw-text-sm tw-text-[#767F8C] tw-mb-0">Min: $<span>0</span></p>
                        <p class="tw-text-sm tw-text-[#767F8C] tw-mb-0">Max: $<span>1700</span></p>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input onclick="changeSalary(10, 100)" type="radio" id="10" class="tw-scale-125" name="salleryRange" />
                        <label for="10" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">$10 - $100</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input onclick="changeSalary(100, 1000)" type="radio" id="100" class="tw-scale-125" name="salleryRange" />
                        <label for="100" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">$100 - $1,000</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input onclick="changeSalary(1000, 10000)" type="radio" id="1000" class="tw-scale-125" name="salleryRange" />
                        <label for="1000" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">$1,000 - $10,000</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input onclick="changeSalary(10000, 100000)" type="radio" id="10000" class="tw-scale-125" name="salleryRange" />
                        <label for="10000" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">$10,000 - $100,000</label>
                    </div>
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input onclick="changeSalary(1000000)" type="radio" id="100000Up" class="tw-scale-125" name="salleryRange" />
                        <label for="100000Up" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">$100,000 Up</label>
                    </div>
                    <div class="tw-flex tw-justify-between tw-items-center tw-mt-3">
                        <div class="tw-flex tw-items-center tw-w-full">
                            <label for="remote" class="tw-flex tw-items-center tw-cursor-pointer">
                                <div class="tw-relative remote-toggle">
                                    <input type="checkbox" id="remote" class="tw-sr-only" value="1" name="is_remote" />

                                    <div class="tw-block tw-bg-[#E4E5E8] tw-w-10 tw-h-[22px] tw-rounded-full"></div>

                                    <div class="dot tw-absolute tw-left-1 tw-top-1 tw-bg-white tw-w-3.5 tw-h-3.5 tw-rounded-full tw-transition"></div>
                                </div>

                                <div class="tw-ml-3 tw-text-gray-700 tw-font-medium">
                                    Remote Job
                                </div>
                            </label>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary tw-inline-block">Apply Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="job-filter-overlay"></div>
    <div class="joblist-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tw-flex tw-flex-wrap tw-items-center tw-gap-2 tw-mb-6 tw-mx-1.5 sm:tw-mx-0">
                        <p class="tw-text-[#767F8C] tw-text-sm tw-mb-0">Popular Tag:</p>
                        <ul class="tw-popular-search tw-flex-wrap"></ul>
                    </div>
                </div>
            </div>
            <div>
                <h5>Featured Jobs</h5>
                <div class="testimonail_active feature-job !-tw-mx-3 slick-bullet deafult_style_dot">
                    @forelse ($featured_highlighted_jobs as $featured_highlighted_job)
                    <div @class(['card tw-card jobcardStyle1','gradient-bg'=>($featured_highlighted_job->job_feature == 'highlight') ? true : false])>
                        <div class="tw-p-6">
                            <div class="tw-mb-5">
                                <div class="tw-mb-1.5">
                                    <a href="{{ url('job-details/'.$featured_highlighted_job->slug) }}" class="tw-text-[#18191C] tw-text-lg tw-font-medium">
                                        {{ Str::limit(ucwords($featured_highlighted_job->title), 30, '...') ?? '' }}
                                    </a>
                                </div>
                                <div class="tw-flex tw-gap-2 tw-items-center">
                                    <span class="tw-text-[#0BA02C] tw-text-[12px] tw-leading-[12px] tw-font-semibold tw-bg-[#E7F6EA] tw-px-2 tw-py-1 tw-rounded-[3px]">{{ ucfirst($featured_highlighted_job->job_type) ?? '' }}</span>
                                    <span class="tw-text-sm tw-text-[#767F8C]">
                                        Salary:
                                        @php
                                        $selected_features = json_decode($featured_highlighted_job->salary_details,true);
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
                                <a href="{{ url('job-details/'.$featured_highlighted_job->slug) }}">
                                    <div class="tw-w-[56px] tw-h-[56px]">
                                        @php
                                        $image=$featured_highlighted_job->company->getMedia('company_logo')->first();
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
                                        <a href="{{ url('job-details/'.$featured_highlighted_job->slug) }}" class="tw-text-base tw-font-medium tw-text-[#18191C] tw-card-title">{{ $featured_highlighted_job->company->company_name ?? '' }}</a>
                                    </div>
                                    <span class="tw-flex tw-items-center tw-gap-1">
                                        <i class="ph-map-pin"></i>
                                        <span class="tw-location">{{ ucfirst($featured_highlighted_job->country) ?? '' }}</span>
                                    </span>
                                </div>
                                <div class>
                                    <div class="text-primary-500 hoverbg-primary-50 plain-button icon-button">
                                        <button type="button" class="tw-text-[#C8CCD1] hover:tw-text-[#0A65CC] hoverbg-primary-50 plain-button icon-button login_required">
                                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 21L11.9993 17.25L6 21V4.5C6 4.30109 6.07902 4.11032 6.21967 3.96967C6.36032 3.82902 6.55109 3.75 6.75 3.75H17.25C17.4489 3.75 17.6397 3.82902 17.7803 3.96967C17.921 4.11032 18 4.30109 18 4.5V21Z"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse
                </div>
            </div>
            <div class="row mt-5">
                <h5>Latest Jobs</h5>
                <div class="col-xl-4 col-md-6 fade-in-bottom rt-mb-24 cat-1 cat-3">
                    @forelse ($jobs as $job)
                    <div class="card tw-card jobcardStyle1">
                        <div class="tw-p-6">
                            <div class="tw-mb-5">
                                <div class="tw-mb-1.5">
                                    <a href="job/uiux-designer_1687761598_1854714541.html" class="tw-text-[#18191C] tw-text-lg tw-font-medium">
                                        {{ Str::limit(ucwords($job->title), 30, '...') ?? '' }}
                                    </a>
                                </div>
                                <div class="tw-flex tw-gap-2 tw-items-center">
                                    <span class="tw-text-[#0BA02C] tw-text-[12px] tw-leading-[12px] tw-font-semibold tw-bg-[#E7F6EA] tw-px-2 tw-py-1 tw-rounded-[3px]">Freelance</span>
                                    <span class="tw-text-sm tw-text-[#767F8C]">
                                        Salary:
                                        @php
                                        $selected_features = json_decode($job->salary_details,true);
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
                                <a href="job/uiux-designer_1687761598_1854714541.html">
                                    <div class="tw-w-[56px] tw-h-[56px]">
                                        @php
                                        $image=$job->company->getMedia('company_logo')->first();
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
                                        <a href="job/uiux-designer_1687761598_1854714541.html" class="tw-text-base tw-font-medium tw-text-[#18191C] tw-card-title">Templatecookie</a>
                                    </div>
                                    <span class="tw-flex tw-items-center tw-gap-1">
                                        <i class="ph-map-pin"></i>
                                        <span class="tw-location">{{ ucfirst($job->country) ?? '' }}</span>
                                    </span>
                                </div>
                                <div class>
                                    <div class="text-primary-500 hoverbg-primary-50 plain-button icon-button">
                                        <button type="button" class="tw-text-[#C8CCD1] hover:tw-text-[#0A65CC] hoverbg-primary-50 plain-button icon-button login_required">
                                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 21L11.9993 17.25L6 21V4.5C6 4.30109 6.07902 4.11032 6.21967 3.96967C6.36032 3.82902 6.55109 3.75 6.75 3.75H17.25C17.4489 3.75 17.6397 3.82902 17.7803 3.96967C17.921 4.11032 18 4.30109 18 4.5V21Z"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </svg>
                                        </button>
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
    </div>
</form>
{{-- <div class="rt-spacer-100 rt-spacer-md-50"></div>
<div class="rt-site-footer bg-gray-900 dark-footer">
    <div class="footer-cta">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <form action="https://jobpilot.templatecookie.com/subscribe" class="rt-from" method="POST">
                        <input type="hidden" name="_token" value="73C960WcaJ5w6HimPAiBaNnpCCQlf22m4e93izN8" />
                        <div class="subscribe-inputbox-1 row smallgap">
                            <div class="col-md-8">
                                <div class="fromGroup has-icon2">
                                    <input type="text" name="email" placeholder="Email Address" class="text-white form-control" />
                                    <span class="icon-badge-2">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M22 6L12 13L2 6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="newsButton btn btn-primary col-lg-4 p-0">
                                    <span class="p-4">Subscribe</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-7 rt-pt-md-30">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 text-center rt-mb-20">
                            <div class="f-size-24 ft-wt-5 text-gray-10"><span class="counter">0</span></div>
                            <span class="text-gray-500 f-size-16">Live Job</span>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center rt-mb-20">
                            <div class="f-size-24 ft-wt-5 text-gray-10"><span class="counter">19</span></div>
                            <span class="text-gray-500 f-size-16">Companies</span>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center rt-mb-20">
                            <div class="f-size-24 ft-wt-5 text-gray-10"><span class="counter">37</span></div>
                            <span class="text-gray-500 f-size-16">Candidates</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cvModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-transparent">
                <h5 class="modal-title" id="cvModalLabel">Apply Job: <span id="apply_job_title">Job Title</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="https://jobpilot.templatecookie.com/jobs/apply">
                <input type="hidden" name="_token" value="73C960WcaJ5w6HimPAiBaNnpCCQlf22m4e93izN8" />
                <div class="modal-body mt-3">
                    <input type="hidden" id="apply_job_id" name="id" />
                    <div class="from-group">
                        <label class="class" for="for">
                            Choose Resume
                            <span class="form-label-required text-danger">*</span>
                        </label>
                        <select class="rt-selectactive form-control w-100-p" name="resume_id" required>
                            <option value>Select One</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label class="class" for="for">
                            Cover Letter
                            <span class="form-label-required text-danger">*</span>
                        </label>
                        <textarea id="default" class="form-control" name="cover_letter" rows="7" required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-transparent">
                    <button type="button" class="bg-priamry-50 btn btn-outline-primary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <span class="button-content-wrapper">
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
</div> --}}
@endsection