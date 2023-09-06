@extends('backend.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ürün Kategori Düzenle</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
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
                    Kategori Ekleme
                </h3>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kategori</label>
                        <select name="category_id" class="form-control custom-select" style="width: 100%;">
                            <option {{$category->category_id=='0' ? 'selected' : ' '}} value="0">Seçiniz</option>
                            @foreach ($categories as $c )
                            <option value="{{$c->id}}" {{$c->id==$category->parent_id ? 'selected' : ' '}}>{{$c->title}}</option>
                            @endforeach
                        </select>
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
                                    <label for="exampleInputPassword1">Adı (Başlık)</label>
                                    <input type="text" name="trTitle" class="form-control" id="exampleInputPassword1" value="{{$categoryTr->title}}" placeholder="Ürün Adı">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Seo Url</label>
                                    <input type="text" name="trSlug" class="form-control" id="exampleInputPassword1" value="{{$categoryTr->slug}}" placeholder="Açıklama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sayfa İçi Başlık</label>
                                    <input type="text" name="trPageTitle" class="form-control" id="exampleInputPassword1" value="{{$categoryTr->page_title}}" placeholder="Url Adresi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Keywords</label>
                                    <input type="text" name="trKeywords" class="form-control" id="exampleInputPassword1" value="{{$categoryTr->keywords}}" placeholder="Keywords">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <input type="text" name="trDescription" class="form-control" id="exampleInputPassword1" value="{{$categoryTr->description}}" placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <label>İçerik</label>
                                    <textarea name="trContent" id="editorTr">{!!$categoryTr->content!!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Adı (Başlık)</label>
                                    <input type="text" name="enTitle" class="form-control" id="exampleInputPassword1" value="{{$categoryEn->title}}" placeholder="Ürün Adı">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Seo Url</label>
                                    <input type="text" name="enSlug" class="form-control" id="exampleInputPassword1" value="{{$categoryEn->slug}}" placeholder="Açıklama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sayfa İçi Başlık</label>
                                    <input type="text" name="enPageTitle" class="form-control" id="exampleInputPassword1" value="{{$categoryEn->page_title}}" placeholder="Url Adresi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Keywords</label>
                                    <input type="text" name="enKeywords" class="form-control" id="exampleInputPassword1" value="{{$categoryEn->keywords}}" placeholder="Keywords">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <input type="text" name="enDescription" class="form-control" id="exampleInputPassword1" value="{{$categoryEn->description}}" placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <label>İçerik</label>
                                    <textarea name="enContent" id="editorEn">{!!$categoryEn->content!!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Adı (Başlık)</label>
                                    <input type="text" name="deTitle" class="form-control" id="exampleInputPassword1" value="{{$categoryDe->title}}" placeholder="Ürün Adı">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Seo Url</label>
                                    <input type="text" name="deSlug" class="form-control" id="exampleInputPassword1" value="{{$categoryDe->slug}}" placeholder="Açıklama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sayfa İçi Başlık</label>
                                    <input type="text" name="dePageTitle" class="form-control" id="exampleInputPassword1" value="{{$categoryDe->page_title}}" placeholder="Url Adresi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Keywords</label>
                                    <input type="text" name="deKeywords" class="form-control" id="exampleInputPassword1" value="{{$categoryDe->keywords}}" placeholder="Keywords">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <input type="text" name="deDescription" class="form-control" id="exampleInputPassword1" value="{{$categoryDe->description}}" placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <label>İçerik</label>
                                    <textarea name="deContent" id="editorDe">{!!$categoryDe->content!!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sıra No</label>
                            <input type="number" name="order" class="form-control" id="exampleInputPassword1" value="{{$category->order}}" placeholder="Sıra No">
                        </div>
                        <div class="form-group">
                            <label>Durum</label><br>
                            <input type="checkbox" name="status" data-bootstrap-switch {{$category->status=='on' ? 'checked' : ' '}}>
                        </div>
                        <div class="form-group">
                            <button id="mButton" type="button" class="btn btn-primary align-content-end">Kaydet</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>
@endsection

@section("js")
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
   var editor1= CKEDITOR.replace('editorTr',options);
   var editor2= CKEDITOR.replace('editorEn',options);
   var editor3= CKEDITOR.replace('editorDe',options);
    editor1.config.extraAllowedContent = 'div(*)';
    editor2.config.extraAllowedContent = 'div(*)';
    editor3.config.extraAllowedContent = 'div(*)'; 
  
</script>
<script>
    $("#mButton").click(function() {
        CKEDITOR.instances['editorTr'].updateElement();
        CKEDITOR.instances['editorEn'].updateElement();
        CKEDITOR.instances['editorDe'].updateElement();
        var url = "{{route('category-edit',$category->id)}}";
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
                    top.location.href = "{{route('categories')}}";
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