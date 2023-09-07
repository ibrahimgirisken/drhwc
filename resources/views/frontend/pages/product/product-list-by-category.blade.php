@extends("frontend.app")
@foreach($categories as $c)
@extends("frontend.include.head")
@section("title","$c->title")
@section("description","$c->description")
@section("keywords", "$c->keywords")
@section("content")
<main id="main" class="w-100">
    <div class="pagetitle-cont pageheader-light">
        <div class="pagetitle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>{{$c->title}}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('getSite')}}">@lang('getSite')</a> | <a href="{{$c->slug}}">{{$c->title}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$c->title}}</li>
                            </ol>
                        </nav>
                        <i></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<main>
    <div class="container">
        <div class="row mt-5 mb-5 product-grid">
            @foreach($products as $product)
            <div class="card col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12 product-item">
                <img class="card-img-top" src="{{ asset('img/products')}}/{{$product->image1!=null ? $product->image1:'no-img.jpg'}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text"></p>
                </div>
                <div class="card-footer">
                    <a type="button" href="/{{app()->getLocale()}}/{{trans('products-link')}}/{{$product->slug}}" class="btn btn-primary float-end">@lang('product-detail')</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@include('frontend.include.footer')
@endforeach
@endsection
@section('js')
@endsection
@section('css')

@endsection