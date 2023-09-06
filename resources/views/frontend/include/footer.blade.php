  <footer class="footer border-top">
      <div class="footermenu-cont pt-5">
          <div class="container">
              <div class="row">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                      <div class="footer-box"> <img src="{{ asset('frontend/assets/img/dr-hwc-logo-black.svg')}}"style="width:100%;height:100%;scale:.7" class="img-fluid w-50" alt="logo">
                          <p class="mb-5 soldier-font2  w-50">@lang('footer-content')</p>
                          <ul class="nav justify-content-center fsocial-list">
                          </ul>
                      </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                      @if(count($footerMenus)>0)
                      <div class="footer-box pt-4">
                          <a class="soldier-font2 ">@lang('corporate')</a>
                          <ul class="nav flex-column" style="margin-left: -15px;">
                              @foreach($footerMenus as $f)
                              @if(count($f->getMenu)>0)
                              @foreach($f->getMenu as $fd)
                              <li><a class="nav-link  soldier-font2" href="/{{app()->getLocale()}}/{{$fd->slug}}">{{@ucwords(Str::lower($fd->title))}}</a></li>
                              @endforeach
                              @else
                              <li><a class="nav-link  soldier-font2" href="/{{app()->getLocale()}}/{{$f->slug}}">{{@ucwords(Str::lower($f->title))}}</a></li>
                              @endif
                              @endforeach
                          </ul>
                      </div>
                      @endif
                  </div>
                  <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                      <div class="footer-box pt-4">
                          @if(count($productCategories)>0)
                          <a class="soldier-font2 ">@lang('products-title')</a>
                          <ul class="nav flex-column" style="margin-left: -15px;">
                              @foreach($productCategories as $p)
                              <li><a class="nav-link  soldier-font2" href="/{{app()->getLocale()}}/{{trans('categories-link')}}/{{$p->slug}}">{{@ucwords($p->title)}}</a></li>
                              @endforeach
                          </ul>
                      </div>
                      @endif
                  </div>

                  <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                      <div class="footer-box pt-4 pb-4">
                          <a class="soldier-font2 ">@lang('contact')</a>
                          <ul class="navbar-nav ms-auto">
                              <li class="nav-item  mb-1 mt-2"><strong class="d-block"><i class="fa-regular fa fa-map me-2"></i> @lang('address')</strong><span class="mt-2">@lang('address-text')</span>
                              </li>
                              <li class="nav-item  mb-1 mt-2"><strong class="d-block"><i class="fa-regular fa fa-phone me-2"></i> @lang('telephone')</strong><span class="mt-2">@lang('telephone-number')</span>
                              </li>
                              <li class="nav-item  mb-1 mt-2"><strong class="d-block"><i class="fa-regular fa fa-envelope me-2"></i> @lang('e-mail')</strong><a href="mailto:@lang('e-mail-address')"><span class="mt-2">@lang('e-mail-address')</span></a>
                              </li>
                          </ul>
                      </div>
                  </div>

              </div>
          </div>
          <div class="footercopy-cont">
              <div class="footercopy-inner">
                  <div class="container">
                      <div class="row gx-3 gy-3 align-items-center">
                          <div class="col-12 soldier-font2 text-center ">Copyright 2023 ©</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>