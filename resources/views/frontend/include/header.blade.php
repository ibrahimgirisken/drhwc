@isset($menus)
<nav class="navbar navbar-expand-lg border-bottom" id="navbar">

    <div class="container">
        <a class="navbar-brand" href="/"><img class="d-block float-left" style="width:100%;height:100%;scale:.6" src="{{ asset('frontend/assets/img/dr-hwc-logo-black.svg') }}" class="img-fluid" alt="logo"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse mainnavbar navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ms-auto">
                @if(count($productCategories)>0)
                <li class="nav-item dropdown">
                    <a class="nav-link " role="button" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        @lang('products')</a>
                    <ul class="dropdown-menu langdrop-menu">
                        @foreach ($productCategories as $c)
                        <li>
                            <a href="/{{app()->getLocale()}}/{{trans('categories-link')}}/{{$c->slug}}" class="dropdown-item" rel="alternate"></i> {{$c->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @foreach($menus as $menu)
                <li class="nav-item dropdown">
                    <a class="nav-link " role="button" data-bs-toggle="{{count($menu->getMenu)>0 ? 'dropdown' :''}}" href="{{count($menu->getMenu)>0 ? '#' :'/' . app()->getLocale() . '/' . $menu->slug }}" aria-expanded="false">
                        {{$menu->title}}</a>
                    @isset($menu->getMenu)
                    <ul class="dropdown-menu langdrop-menu">

                        @foreach ($menu->getMenu as $m)
                        <li>

                            <a href="/{{app()->getLocale()}}/{{$m->slug}}" class="dropdown-item" rel="alternate"></i> {{$m->title}}</a>

                        </li>
                        @endforeach
                    </ul>
                    @endisset
                </li>
                @endforeach
                <li class="nav-item dropdown m-2">

                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                        <img style="width:1.5rem;height:auto" src="{{ asset('frontend/assets/img/'.app()->getLocale().'.svg') }}" width="100" height="100" aria-labelledby="Dil Seçimi" alt="Dil Seçimi">

                    </a>

                    <ul class="dropdown-menu langdrop-menu">

                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        <li>

                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, './', [], true) }}">

                                <img style="width:1.5rem;height:auto" src="{{ asset('frontend/assets/img/'.$localeCode.'.svg') }}" alt="{{ $localeCode }}"></a>

                        </li>

                        @endforeach

                    </ul>

                </li>

            </ul>
        </div>

    </div>

</nav>



<style>
    ul.dropdown-menu.langdrop-menu {

        min-width: fit-content !Important;

    }

    .navbar-nav .dropdown-menu {

        position: absolute;

    }
</style>
@endisset