@extends('front.layouts.master')

@section('main_content')

<div class="breadcumb-wrapper breadcumb-wrapper-user" data-bg-src="{{ asset('dist/front/img/bg/breadcumb-bg1-8.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Update Profile</h1>
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
                    <h4>Update Your Information</h4>
                    <form action="{{ route('user.profile.update') }}" class="cwa_dashboard_profile_edit_info" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 mb-4">
                                <label>Change Photo</label>
                                <input type="file" name="avatar">
                            </div>
                            <div class="col-xl-6 ">
                                <label>Name *</label>
                                <input type="text" value="{{ Auth::guard('web')->user()->name }}" name="name">
                            </div>
                            <div class="col-xl-6 ">
                                <label>Email Address *</label>
                                <input type="email" value="{{ Auth::guard('web')->user()->email }}" name="email">
                            </div>
                            <div class="col-xl-6 ">
                                <label>Phone *</label>
                                <input type="text" value="{{ Auth::guard('web')->user()->phone }}" name="phone">
                            </div>
                            <div class="col-xl-6 ">
                                <label>Address *</label>
                                <input type="text" value="{{ Auth::guard('web')->user()->address }}" name="address">
                            </div>
                            <div class="col-xl-6 ">
                                <label>Country *</label>
                                <input type="text" value="{{ Auth::guard('web')->user()->country }}" name="country">
                            </div>
                            <div class="col-xl-6 ">
                                <label>State *</label>
                                <input type="text" value="{{ Auth::guard('web')->user()->state }}" name="state">
                            </div>
                            <div class="col-xl-6 ">
                                <label>City *</label>
                                <input type="text" value="{{ Auth::guard('web')->user()->city }}" name="city">
                            </div>
                            <div class="col-xl-6 ">
                                <label>Zip code *</label>
                                <input type="text" value="{{ Auth::guard('web')->user()->zip_code }}" name="zip_code">
                            </div>
                            <div class="col-xl-6 ">
                                <label>Password</label>
                                <input type="password" name="password">
                            </div>
                            <div class="col-xl-6 ">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password">
                            </div>
                            <div class="col-xl-12">
                                <ul class="d-flex flex-wrap">
                                    <li>
                                        <button class="btn style2" type="submit">
                                            <span class="link-effect">
                                                <span class="effect-1">Update info</span>
                                                <span class="effect-1">Update info</span>
                                            </span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid p-0 overflow-hidden">
    <div class="slider__marquee clearfix marquee-wrap">
        <div class="marquee_mode marquee__group">
            <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> We Give Unparalleled Flexibility</a></h6>
            <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> We Give Unparalleled Flexibility</a></h6>
            <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> We Give Unparalleled Flexibility</a></h6>
            <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> We Give Unparalleled Flexibility</a></h6>
        </div>
    </div>
</div>

@include('front.layouts.footer_1')
@endsection