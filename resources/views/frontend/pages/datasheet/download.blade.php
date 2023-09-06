<div class="container">
    <div class="row">
        <div class="span4"></div>
        <div class="span4"><img class="center-block" src="{{ asset('frontend/assets/img/dr-hwc-logo-black.svg') }}" style="width:300px" alt="logo"></div>
        <div class="span4"></div>
    </div>
</div>
<div class="container">
    <h1 class="card-title display-3 text-center text-success">Datasheets</h1>

    <div class="card kutu w-100">

        <div class="card-body">

            <div class="col-12">

                <div class="d-grid gap-3">

                    @foreach ($datasheets as $datasheet)
                    @if ($datasheet->path)
                    <a href="{{ asset('datasheets/' . $datasheet->path) }}" class="btn btn-outline-success" type="button"><img style="width:1.5rem;height:auto" src="{{ asset('frontend/assets/img/' . $datasheet->lang . '.svg') }}" alt="{{ $datasheet->lang }}"> {{ $datasheet->productName }}</a>
                    @endif
                    @endforeach

                </div>

            </div>

        </div>

    </div>



    <style>
        body {

            display: flex;

            justify-content: center;

            align-items: center;

            height: 100vh;

            width: 100%;

        }

        .center-block {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .kutu {

            width: 100%;

            height: auto;

            font-size: 50px;

            text-align: center;

            color: #fff;

        }
    </style>