@php
$marquees = App\Models\Marquee::get();
@endphp
<div class="container-fluid p-0 overflow-hidden">
    <div class="slider__marquee clearfix marquee-wrap">
        <div class="marquee_mode marquee__group">
            @foreach($marquees as $marquee)
            <h6 class="item m-item">
                @if($marquee->url == null || $marquee->url == '')
                <a href="javascript:void(0);"><i class="fas fa-star-of-life"></i> {{ $marquee->text }}
                @else
                <a href="{{ $marquee->url }}" target="_blank"><i class="fas fa-star-of-life"></i> {{ $marquee->text }}</a>
                @endif
            </h6>
            @endforeach
        </div>
    </div>
</div>