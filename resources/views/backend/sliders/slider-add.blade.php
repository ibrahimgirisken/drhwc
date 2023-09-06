@extends('backend.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Slider Ekle</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form action method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Slider</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <center><img id="coverImageShow" width="70%" height="350px"></center>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Desktop</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input id="coverImage" type="file" name="desktop" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Tablet</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="tablet" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Tablet Resim Ekle</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Yükle</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Mobile</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="mobile" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Mobile Resim Ekle</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Yükle</span>
                                                </div>
                                            </div>
                                        </div>
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
                                                    <label for="exampleInputPassword1">Başlık</label>
                                                    <input type="text" name="trTitle" class="form-control" id="exampleInputPassword1" placeholder="Başlık">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Açıklama</label>
                                                    <input type="text" name="trContent" class="form-control" id="exampleInputPassword1" placeholder="Açıklama">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Url Adresi</label>
                                                    <input type="text" name="trUrl" class="form-control" id="exampleInputPassword1" placeholder="Url Adresi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Başlık</label>
                                                    <input type="text" name="enTitle" class="form-control" id="exampleInputPassword1" placeholder="Başlık">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Açıklama</label>
                                                    <input type="text" name="enContent" class="form-control" id="exampleInputPassword1" placeholder="Açıklama">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Url Adresi</label>
                                                    <input type="text" name="enUrl" class="form-control" id="exampleInputPassword1" placeholder="Url Adresi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Başlık</label>
                                                    <input type="text" name="deTitle" class="form-control" id="exampleInputPassword1" placeholder="Başlık">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Açıklama</label>
                                                    <input type="text" name="deContent" class="form-control" id="exampleInputPassword1" placeholder="Açıklama">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Url Adresi</label>
                                                    <input type="text" name="deUrl" class="form-control" id="exampleInputPassword1" placeholder="Url Adresi">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">                                   
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Sıra No</label>
                                            <input type="number" name="order" class="form-control" id="exampleInputPassword1" value="1" placeholder="Sıra No">
                                        </div>
                                        <div class="form-group">
                                            <label>Durum</label><br>
                                            <input type="checkbox" name="status" checked data-bootstrap-switch>
                                        </div>
                                        <div class="form-group">
                                            <button id="slButton" type="button" class="btn btn-primary align-content-end">Yayınla</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
    $("#coverImage").change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#coverImageShow').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
</script>

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
    $("#slButton").click(function() {
        var url = "{{route('slider-add')}}";
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
                    top.location.href = "{{route('sliders')}}";
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

@endsection