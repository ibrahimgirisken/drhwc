<div class="container border">
    <h1>Datasheetler</h1>
    @foreach($datasheets as $datasheet)
    @if($datasheet->path)
    <div class="row">
        @if($datasheet->locale===app()->getLocale())
        <div class="col-6 card-body d-xl-flex d-lg-flex d-md-flex d-sm-flex justify-content-between align-items-center">
            <h6>{{$datasheet->productName}}</h6>
        </div>
        @endif
        <div class="col-6 pdfbtns">
            <div class="m-1">
                <img style="width:1.5rem;height:auto" src="{{ asset('frontend/assets/img/' . $datasheet->locale . '.svg') }}" alt="{{ $datasheet->lang }}">
                <a href="{{ asset('datasheets/' . $datasheet->path) }}" class="btn btn-outline-secondary btn-sm" type="button">@lang('view')</a>
                <a href="{{ asset('datasheets/' . $datasheet->path) }}" class="btn btn-outline-success btn-sm" type="button">@lang('download')</a>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
<style>
    .card.downloadcard {
        border-color: #f3f3f3;
        box-shadow: 3px 4px 7px #0000001c;
    }

    .pdfbtns {
        position: left !Important;
        display: inline-block;
        justify-content: center;
        align-items: center;
        border: 0px solid #ddd;
        margin-bottom: 5px;
        padding: 3px 8px;
        border-radius: 5px;
    }
</style>