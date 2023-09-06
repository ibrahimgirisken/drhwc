@extends('backend.app')

@section('content')
<div class="content-wrapper">

    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Datasheet Düzenle</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>

                        <li class="breadcrumb-item active">Datasheet</li>

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

                    Döküman Ayarları

                </h3>

            </div>

            <div class="card-body">

                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <label for="exampleInputEmail1">Ürün Kodu</label>

                        <input type="text" name="productCode" value="{{$datasheet->productCode}}" class="form-control" id="exampleInputEmail1" placeholder="Ürün Kodu">

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

                                    <input type="text" name="trProductName" value="{{$datasheetTr->productName}}" class="form-control" id="exampleInputPassword1" placeholder="Ürün Adı">

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Açıklama</label>

                                    <input type="text" name="trContent" value="{{$datasheetTr->content}}" class="form-control" id="exampleInputPassword1" placeholder="Açıklama">

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Url Adresi</label>

                                    <input type="text" name="trUrl" value="{{$datasheetTr->slug}}" class="form-control" id="exampleInputPassword1" placeholder="Url Adresi">

                                </div>

                                <div class="form-group">


                                    <label for="exampleInputFile">Döküman</label>

                                    <div class="input-group">

                                        <div class="custom-file">

                                            <input type="file" name="trPath" class="custom-file-input" id="exampleInputFile">

                                            <label class="custom-file-label" for="exampleInputFile">Döküman Ekle</label>

                                        </div>

                                        <div class="input-group-append">

                                            <span class="input-group-text">Yükle</span>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="m-2">
                                            <a href="/backend/dist/datasheets/{{$datasheetTr->path}}"><i class="fas fa-file-pdf fa-5x"></i></a>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Image Name</label>
                                    <input type="text" name="trImageName" value="{{$datasheetTr->path}}" class="form-control" id="exampleInputPassword1" placeholder="Url Adresi">

                                </div>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">

                            <div class="card-body">

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Ürün Adı</label>

                                    <input type="text" name="enProductName" value="{{$datasheetEn->productName}}" class="form-control" id="exampleInputPassword1" placeholder="Ürün Adı">

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Açıklama</label>

                                    <input type="text" name="enContent" value="{{$datasheetEn->content}}" class="form-control" id="exampleInputPassword1" placeholder="Açıklama">

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Url Adresi</label>

                                    <input type="text" name="enUrl" value="{{$datasheetEn->slug}}" class="form-control" id="exampleInputPassword1" placeholder="Url Adresi">

                                </div>

                                <div class="form-group">


                                    <label for="exampleInputFile">Döküman</label>

                                    <div class="input-group">

                                        <div class="custom-file">

                                            <input type="file" name="enPath" class="custom-file-input" id="exampleInputFile">

                                            <label class="custom-file-label" for="exampleInputFile">Döküman Ekle</label>

                                        </div>

                                        <div class="input-group-append">

                                            <span class="input-group-text">Yükle</span>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="m-2">
                                            <a href="/backend/dist/datasheets/{{$datasheetEn->path}}"><i class="fas fa-file-pdf fa-5x"></i></a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Image Name</label>
                                        <input type="text" name="enImageName" value="{{$datasheetEn->path}}" class="form-control" id="exampleInputPassword1" placeholder="Url Adresi">

                                    </div>



                                </div>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">

                            <div class="card-body">

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Ürün Adı</label>

                                    <input type="text" name="deProductName" value="{{$datasheetDe->productName}}" class="form-control" id="exampleInputPassword1" placeholder="Ürün Adı">

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Açıklama</label>

                                    <input type="text" name="deContent" value="{{$datasheetDe->content}}" class="form-control" id="exampleInputPassword1" placeholder="Açıklama">

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Url Adresi</label>

                                    <input type="text" name="deUrl" value="{{$datasheetDe->slug}}" class="form-control" id="exampleInputPassword1" placeholder="Url Adresi">

                                </div>

                                <div class="form-group">


                                    <label for="exampleInputFile">Döküman</label>

                                    <div class="input-group">

                                        <div class="custom-file">

                                            <input type="file" name="dePath" class="custom-file-input" id="exampleInputFile">

                                            <label class="custom-file-label" for="exampleInputFile">Döküman Ekle</label>

                                        </div>

                                        <div class="input-group-append">

                                            <span class="input-group-text">Yükle</span>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="m-2">
                                            <a href="/backend/dist/datasheets/{{$datasheetDe->path}}"><i class="fas fa-file-pdf fa-5x"></i></a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Image Name</label>
                                        <input type="text" name="deImageName" value="{{$datasheetDe->path}}" class="form-control" id="exampleInputPassword1" placeholder="Url Adresi">

                                    </div>


                                </div>

                            </div>

                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Resim</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Resim Ekle</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Yükle</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">

                                <label for="exampleInputPassword1">Sıra No</label>

                                <input type="number" name="order" value="{{$datasheet->order}}" class="form-control" id="exampleInputPassword1" placeholder="Sıra No">

                            </div>

                            <div class="form-group">

                                <label>Durum</label><br>

                                <input type="checkbox" name="status" value="{{$datasheet->status}}" checked data-bootstrap-switch>

                            </div>


                        </div>
                    </div>
                </form>

            </div>
            <div class="card-footer">

                <button id="dsButton" class="btn btn-primary">Kaydet</button>

            </div>

        </div>

    </section>

</div>

@endsection



@section("js")

<script src="/backend/plugins/select2/js/select2.full.min.js"></script>

<script src="/backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

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
<script>
    $("#dsButton").click(function() {

        var url = "{{route('datasheet-edit',$datasheet->id)}}";

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
                    top.location.href = "{{route('datasheets')}}";
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



@section("css")

<link rel="stylesheet" href="/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<link rel="stylesheet" href="/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<link rel="stylesheet" href="/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

@endsection