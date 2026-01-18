@extends('front.layouts.master')

@section('main_content')

<div class="breadcumb-wrapper style2 bg-smoke">
    <div class="container-fluid">
        <div class="breadcumb-content">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('portfolios') }}">Portfolios</a></li>
                <li>{{ $portfolio->title }}</li>
            </ul>
        </div>
    </div>
</div>

<div class="project-details-page-area space">
    <div class="container">
        <div class="row global-carousel default" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true" data-lg-arrows="true" data-md-arrows="true">
            <div class="col-xl-12">
                <div class="project-inner-thumb mb-80 wow img-custom-anim-top">
                    <img class="w-100" src="{{ asset('uploads/'.$portfolio->photo) }}" alt="img">
                </div>
            </div>
            @foreach($portfolio->photos as $photo)
            <div class="col-xl-12">
                <div class="project-inner-thumb mb-80 wow img-custom-anim-top">
                    <img class="w-100" src="{{ asset('uploads/'.$photo->photo) }}" alt="img">
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-between flex-row-reverse">
            <div class="col-xl-3 col-lg-4">
                <div class="project-details-info mb-lg-0 mb-40">
                    <ul class="list-wrap">
                        <li><span>Category:</span>{{ $portfolio->category }}</li>

                        @if($portfolio->software != '')
                        <li><span>Software:</span>{{ $portfolio->software }}</li>
                        @endif

                        @if($portfolio->project_start_date != '')
                        <li><span>Project Start Date:</span>{{ $portfolio->project_start_date }}</li>
                        @endif

                        @if($portfolio->project_end_date != '')
                        <li><span>Project End Date:</span>{{ $portfolio->project_end_date }}</li>
                        @endif

                        @if($portfolio->client != '')
                        <li><span>Client:</span>{{ $portfolio->client }}</li>
                        @endif

                        @if($portfolio->website != '')
                        <li><span>Website:</span>{{ $portfolio->website }}</li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="title-area mb-35">
                    <h2 class="sec-title">{{ $portfolio->title }}</h2>
                    <div class="sec-text mt-30">
                        {!! $portfolio->description !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="inner__page-nav space-top mt-n1 mb-n1">
                    <a href="{{ $previous_portfolio ? route('portfolio', $previous_portfolio->slug) : 'javascript:void(0)'}}" class="nav-btn">
                        <i class="fa fa-arrow-left"></i> <span><span class="link-effect">
                            <span class="effect-1">Previous Project</span>
                            <span class="effect-1">Previous Project</span>
                        </span></span>
                    </a>
                    <a href="{{ $next_portfolio ? route('portfolio', $next_portfolio->slug) : 'javascript:void(0)'}}" class="nav-btn"><span><span class="link-effect">
                        <span class="effect-1">Next Project</span>
                        <span class="effect-1">Next Project</span>
                    </span></span>
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('front.layouts.marquee')

@include('front.layouts.footer_1')
@endsection