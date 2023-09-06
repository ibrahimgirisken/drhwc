
<div class="container parallax" id="@lang('about-link')">
    <div class="row mt-5 mb-5 ">
        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 col-sm-12 col-12 big-title">
            <div class="align-middle justify-middle">
                <h1 class="soldier-font soldier-font-size w-75"><b>@lang('about-title')</b></h1>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 col-sm-12 col-12">
            <p style="font-size:1.5rem" class="soldier-font2">
                @lang('about-content')
            </p>
            <a href="#" class="fill ghost secondary float-end border-2" data-bs-toggle="modal"
                data-bs-target="#exampleModal" data-bs-whatever="@mdo">@lang('about-button')</a>
        </div>
    </div>
</div>

<!-- Scrollable modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-dark fs-2" id="exampleModalLabel"><b>@lang('about-title')</b> </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-2 my-2">
                <p style="font-size:1.5rem" class="soldier-font2">
                @lang('about-content-full')
                </p>
            </div>
        </div>
    </div>
</div>
