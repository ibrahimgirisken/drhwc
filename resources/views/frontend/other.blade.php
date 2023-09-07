@extends("frontend.app")
@section("title","$pageData->title")
@section("description",$pageData->description)
@section("keywords", $pageData->keywords)
@section("content")
<main id="main" class="w-100">
  <div class="pagetitle-cont pageheader-light">
    <div class="pagetitle-inner">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1>{{$pageData->title}}</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('getSite')}}">@lang('getSite')</a> | <a href="{{route('{{$pageData->slug}}')}}">{{$pageData->title}}</a></li>
              </ol>
            </nav>
            <i></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  @isset($template)
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12 col-xl-12 col-sm-12 pt-4 pb-4">
        @include('frontend.pages.forms.'.$template->title)
      </div>
    </div>
  </div>
  @endisset
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12 col-xl-12 col-sm-12 pt-4 pb-4">
        {!!$pageData->content!!}
      </div>
    </div>
  </div>
</main>
@include('frontend.include.footer')
@endsection
@section('js')
@endsection
@section('css')
@endsection