@if(count($products)>0)
<div class="container parallax g-5 mb-5 mt-5" id="@lang('products-link')">
  <div class="container justify-content-center align-content-center">
    <div class="w-100 soldier-font soldier-font-size text-center">@lang('products')</div>
    <div class="row">
    <div class="card-deck pt-4 pb-4">
        <div class="owl-carousel owl-theme">
          @foreach($products as $product)
          <div class="card w-100">
            <img class="card-img-top" src="{{asset('img/products')}}/{{$product->image1!=null ? $product->image1:'no-img.jpg'}}" alt="Card image cap">
            <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text"></p>
                </div>
            <div class="card-footer">
              <a href="/{{app()->getLocale()}}/{{trans('products-link')}}/{{$product->slug}}" type="button" class="btn btn-primary float-end">@lang('product-detail')</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endif