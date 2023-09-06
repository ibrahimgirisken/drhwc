<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    @foreach($sliders as $key=>$slider)
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}" class="active" aria-current="true" aria-label="Slide 1"></button>
    @endforeach
  </div>
  <div class="carousel-inner">
    @foreach($sliders as $slider)
    <div class="carousel-item">
      @if($device->isMobile())
      <img src="{{asset('img/sliders/' . $slider->mobile)}}" class="d-block w-100" alt="...">
      @elseif($device->isTablete())
      <img src="{{asset('img/sliders/' . $slider->tablete)}}" class="d-block w-100" alt="...">
      @else
      <img src="{{asset('img/sliders/' . $slider->desktop)}}" class="d-block w-100" alt="...">
      @endif
      <div class="carousel-caption d-md-block d-sm-block d-lg-block justify content-center align-middle bottom-50 w-50">
        <h1 class="soldier-font2">{{$slider->title}}</h1>
        <P class="soldier-font2">{{$slider->content}}</P>
      </div>
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<style>
  .carousel-item {
    background-size: cover;
    background-repeat: no-repeat;
    background-position-x: center;
    background-position-y: top;
  }
</style>