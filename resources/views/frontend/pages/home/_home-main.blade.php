@foreach($mains as $main)
<div class="container parallax" id="solutions">
    <div class="row mt-5 mb-5">
        @if($device->isMobile())
        <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 col-sm-12 col-12 text-center align-self-center">
            <div style="font-size: 2rem!Important" class="w-100 soldier-font fw-bold; text-center">{{$main->title}}</div>
            <p style="font-size:1.5rem!Important" class="soldier-font2">
                {!!$main->content!!}
            </p>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 col-sm-12 col-12 big-title">
            <div class="align-middle justify-middle">
                <img src="{{ asset('img/page/'.$main->image) }}" width="100px" class="w-100">
            </div>
        </div>
        @else
        @if($main->order==100)
        <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 col-sm-12 col-12 text-center align-self-center">
            <div style="font-size: 2rem!Important" class="w-100 soldier-font fw-bold; text-center">{{$main->title}}</div>
            <p style="font-size:1.5rem!Important" class="soldier-font2">
                {!!$main->content!!}
            </p>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 col-sm-12 col-12 big-title">
            <div class="align-middle justify-middle">
                <img src="{{ asset('img/page/'.$main->image) }}" width="100px" class="w-100">
            </div>
        </div>
        @else
        @if($main->order % 2 === 1)
        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 col-sm-12 col-12 big-title">
            <div class="align-middle justify-middle">
                <img src="{{ asset('img/page/'.$main->image) }}" width="100px" class="w-100">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 col-sm-12 col-12 align-self-center">
            <div style="font-size: 2rem!Important" class="w-100 soldier-font fw-bold; text-center">{{$main->title}}</div>
            <p style="font-size:1.5rem!Important" class="soldier-font2">
                {!!$main->content!!}
            </p>
        </div>
        @else
        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 col-sm-12 col-12 align-self-center">
            <div style="font-size: 2rem!Important" class="w-100 soldier-font fw-bold; text-center">{{$main->title}}</div>
            <p style="font-size:1.5rem!Important" class="soldier-font2">
                {!!$main->content!!}
            </p>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 col-sm-12 col-12 big-title">
            <div class="align-middle justify-middle">
                <img src="{{ asset('img/page/'.$main->image) }}" width="100px" class="w-100">
            </div>
        </div>
        @endif
        @endif
        @endif
    </div>
</div>
@endforeach