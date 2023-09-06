@extends('frontend.app')
@section("title","$product->title")
@section("description","$product->description")
@section("keywords", "$product->keywords")
@section('content')
<main id="main" class="w-100">
    <div class="pagetitle-cont pageheader-light">
        <div class="pagetitle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>{{$product->title}}{{$product->product->image3D}}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('getSite')}}">@lang('getSite')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                            </ol>
                        </nav>
                        <i></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<main id="main">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 col-sm-12 float-left ">
                <a data-fancybox="images-preview" data-thumbs='{"autoStart":true}' href="{{asset('img/products')}}/{{$product->product->image1!=null ? $product->product->image1:'no-img.jpg'}}">
                    <img src="{{asset('img/products')}}/{{$product->product->image1!=null ? $product->product->image1:'no-img.jpg'}}" class="card-img-top" alt="Card image cap"></a>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-xs-12 col-sm-12 float-left float-left mt-5">
                <h5 class="title"><b>@lang('product-code'):</b>{{$product->product->code}}</h5>
                <p class="card-text"><b>@lang('product-name'):</b>{{$product->name}}</p>
                @isset($product->product->image3D)
                <model-viewer alt="Neil Armstrong's Spacesuit from the Smithsonian Digitization Programs Office and National Air and Space Museum" src="{{asset('frontend/assets/3d')}}/{{$product->product->image3D}}" shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                @endisset
            </div>
        </div>
        <div class="card-body mb-5">
            <h3><b>@lang('product-explanation'):</b></h3>
            <p class="card-text">{!!$product->content!!}</p>
        </div>
    </div>
</main>
@include('frontend.include.footer')
@endsection
@section('js')
@endsection
@section('css')
@endsection