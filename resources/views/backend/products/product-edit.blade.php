@extends('backend.app')

@section('content')
<div class="content-wrapper">

    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Ürün Düzenle</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>

                        <li class="breadcrumb-item active">Ürünler</li>

                    </ol>

                </div>

            </div>

        </div>

    </div>



    <section class="content">

        <div class="card card-primary card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-edit"></i>

                    Ürün Düzenleme

                </h3>

            </div>
            <div class="card-body">
                <form method="put" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kategori</label>
                        <select name="category_id" class="form-control custom-select" style="width: 100%;">
                            <option {{$product->category_id=='0' ? 'selected' : ' '}} value="0">Seçiniz</option>
                            @foreach ($categories as $c )
                            <option value="{{$c->id}}" {{$c->id==$product->category_id ? 'selected' : ' '}}>{{$c->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ürün Kodu</label>
                        <input type="text" name="productCode" class="form-control" id="exampleInputEmail1" placeholder="Ürün Kodu" value="{{$product->code}}">
                    </div>
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Türkçe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">İngilizce</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Almanca</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade active show" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ürün Adı</label>
                                    <input type="text" name="trName" class="form-control" id="exampleInputPassword1" value="{{$productTr->name}}" placeholder="Ürün Adı">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">SEO Sayfa Url</label>
                                    <input type="text" name="trUrl" class="form-control" id="exampleInputPassword1" value="{{$productTr->slug}}" placeholder="SEO Sayfa Url">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sayfa İçi Başlık</label>
                                    <input type="text" name="trTitle" class="form-control" id="exampleInputPassword1" value="{{$productTr->title}}" placeholder="Sayfa İçi Başlık">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kısa Açıklama</label>
                                    <input type="text" name="trBrief" class="form-control" id="exampleInputPassword1" value="{{$productTr->brief}}" placeholder="Kısa Açıklama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Keywords</label>
                                    <input type="text" name="trKeywords" class="form-control" id="exampleInputPassword1" value="{{$productTr->keywords}}" placeholder="Keywords">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <input type="text" name="trDescription" class="form-control" id="exampleInputPassword1" value="{{$productTr->description}}" placeholder="Description">
                                </div>
                                <div class="form-group">
                                <label>İçerik</label>
                                    <textarea name="trContent" id="editorTr">{!!$productTr->content!!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ürün Adı</label>
                                    <input type="text" name="enName" class="form-control" id="exampleInputPassword1" value="{{$productEn->name}}" placeholder="Ürün Adı">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">SEO Sayfa Url</label>
                                    <input type="text" name="enUrl" class="form-control" id="exampleInputPassword1" value="{{$productEn->slug}}" placeholder="SEO Sayfa Url">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sayfa İçi Başlık</label>
                                    <input type="text" name="enTitle" class="form-control" id="exampleInputPassword1" value="{{$productEn->title}}" placeholder="Sayfa İçi Başlık">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kısa Açıklama</label>
                                    <input type="text" name="enBrief" class="form-control" id="exampleInputPassword1" value="{{$productEn->brief}}" placeholder="Kısa Açıklama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Keywords</label>
                                    <input type="text" name="enKeywords" class="form-control" id="exampleInputPassword1" value="{{$productEn->keywords}}" placeholder="Keywords">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <input type="text" name="enDescription" class="form-control" id="exampleInputPassword1" value="{{$productEn->description}}" placeholder="Description">
                                </div>
                                <div class="form-group">
                                <label>İçerik</label>
                                    <textarea name="enContent" id="editorEn">{!!$productEn->content!!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ürün Adı</label>
                                    <input type="text" name="deName" class="form-control" id="exampleInputPassword1" value="{{$productDe->name}}" placeholder="Ürün Adı">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">SEO Sayfa Url</label>
                                    <input type="text" name="deUrl" class="form-control" id="exampleInputPassword1" value="{{$productDe->slug}}" placeholder="SEO Sayfa Url">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sayfa İçi Başlık</label>
                                    <input type="text" name="deTitle" class="form-control" id="exampleInputPassword1" value="{{$productDe->title}}" placeholder="Sayfa İçi Başlık">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kısa Açıklama</label>
                                    <input type="text" name="deBrief" class="form-control" id="exampleInputPassword1" value="{{$productDe->brief}}" placeholder="Kısa Açıklama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Keywords</label>
                                    <input type="text" name="deKeywords" class="form-control" id="exampleInputPassword1" value="{{$productDe->keywords}}" placeholder="Keywords">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <input type="text" name="deDescription" class="form-control" id="exampleInputPassword1" value="{{$productDe->description}}" placeholder="Description">
                                </div>
                                <div class="form-group">
                                <label>İçerik</label>
                                    <textarea name="deContent" id="editorDe">{!!$productDe->content!!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Resim1</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image1" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Resim Ekle</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Yükle</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Resim2</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image2" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Resim Ekle</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Yükle</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Resim3</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image3" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Resim Ekle</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Yükle</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Sıra No</label>
                                <input type="number" name="order" class="form-control" id="exampleInputPassword1" value="{{$product->order}}" placeholder="Sıra No">
                            </div>
                            <div class="form-group">
                                <label>Durum</label><br>
                                <input type="checkbox" name="status" data-bootstrap-switch {{$product->status=='on' ? 'checked':""}}>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">

                <button id="pButton" class="btn btn-primary">Kaydet</button>

            </div>

        </div>
    </section>
</div>
@endsection
@section('js')

<script src="/backend/plugins/select2/js/select2.full.min.js"></script>

<script src="/backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script src="/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        bsCustomFileInput.init();

    });
</script>

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('editorTr',options);
    CKEDITOR.replace('editorEn',options);
    CKEDITOR.replace('editorDe',options);
</script>

<script>
    $("#pButton").click(function() {
        CKEDITOR.instances['editorTr'].updateElement();
        CKEDITOR.instances['editorEn'].updateElement();
        CKEDITOR.instances['editorDe'].updateElement();
        var url = "{{route('product-edit',$product->id)}}";
        var form = new FormData($("form")[0]);
        $.ajax({
            type: "POST",
            url: url,
            data: form,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == "success") {
                    toastr.success(response.content, response.title);
                    top.location.href = "{{route('products')}}";
                } else {
                    toastr.error(response.content, response.title);
                }
            },
            error: function(request, status, error) {
                console.log(request.responseText);
            }
        });
    });
</script>

@endsection

@section('css')
<link rel="stylesheet" href="/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection