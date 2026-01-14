@extends('front.layouts.master')

@section('main_content')

<div class="breadcumb-wrapper breadcumb-wrapper-user" data-bg-src="{{ asset('dist/front/img/bg/breadcumb-bg1-8.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Dashboard</h1>
        </div>
    </div>
</div>

<section class="cwa_dashboard_profile cwa_dashboard">
    <div class="container">
        <div class="row">
            <!--  Sidebar Area -->
            @include('front.user.sidebar')
            
            <!--  Main Content Area -->
            <div class="col-lg-8 col-xl-9">
                <div class="cwa_dashboard_main_contant">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 mb_25">
                            <div class="cwa_profile_overview">
                                <p><i class="fas fa-file-invoice-dollar"></i></p>
                                <h4>8</h4>
                                <p class="name">Total Purchase Item</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 mb_25">
                            <div class="cwa_profile_overview green">
                                <p><i class="fas fa-file-invoice-dollar"></i></p>
                                <h4>$1,280.08</h4>
                                <p class="name">Total Payment</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 mb_25">
                            <div class="cwa_profile_overview orange">
                                <p><i class="fas fa-bahai"></i></p>
                                <h4>125</h4>
                                <p class="name">Total Review</p>
                            </div>
                        </div>
                    </div>
                    <div class="cwa_profile_info">
                        <div class="cwa_profile_info_top">
                            <h4>Personal Information</h4>
                            <a href="{{ route('user.profile') }}" class="btn">
                                <span class="link-effect">
                                    <span class="effect-1">Edit Info</span>
                                    <span class="effect-1">Edit Info</span>
                                </span>
                            </a>
                        </div>

                        <ul class="">
                            <li><span>Name:</span>{{ Auth::guard('web')->user()->name }}</li>
                            <li><span>Email:</span>{{ Auth::guard('web')->user()->email }}</li>
                            <li><span>Phone:</span>{{ Auth::guard('web')->user()->phone ?? '---' }}</li>
                            <li><span>Address:</span>{{ Auth::guard('web')->user()->address ?? '---' }}</li>
                            <li><span>Country:</span>{{ Auth::guard('web')->user()->country ?? '---' }}</li>
                            <li><span>State:</span>{{ Auth::guard('web')->user()->state ?? '---' }}</li>
                            <li><span>City:</span>{{ Auth::guard('web')->user()->city ?? '---' }}</li>
                            <li><span>Zip code:</span>{{ Auth::guard('web')->user()->zip_code ?? '---' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('front.layouts.marquee')

@include('front.layouts.footer_1')
@endsection