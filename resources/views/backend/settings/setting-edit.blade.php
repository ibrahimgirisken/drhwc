@extends('backend.app')

@section('content')

<div class="content-wrapper">

    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Ayar Düzenle</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>

                        <li class="breadcrumb-item active">Ayarlar</li>

                    </ol>

                </div>

            </div>

        </div>

    </div>



    <section class="content">

        <div class="container-fluid">


            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">


                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    @csrf
                                    <label for="exampleInputEmail1">Site Başlık</label>

                                    <input type="text" name="title" class="form-control" value="{{$settings->title}}" placeholder="Site Başlık Yazınız">

                                </div>


                                <div class="form-group">

                                    <label for="exampleInputEmail1">Meta Açıklama</label>

                                    <input type="text" name="description" class="form-control" value="{{$settings->description}}" placeholder="Meta Açıklama Yazınız">

                                </div>


                                <div class="form-group">

                                    <label for="exampleInputEmail1">Meta Keywords</label>

                                    <input type="text" name="keywords" class="form-control" value="{{$settings->keywords}}" placeholder="Meta Keyword Yazınız">

                                </div>

                                <div class="form-group">

                                    <div class="input-group">

                                        <div class="custom-file">

                                            <input type="file" class="custom-file-input" id="customFile">

                                            <label class="custom-file-label" for="customFile">Logo</label>

                                        </div>

                                    </div>

                                </div>


                                <div class="form-group">

                                    <label for="exampleInputEmail1">Telefon</label>

                                    <input type="text" name="telephone" class="form-control" value="{{$settings->telephone}}" placeholder="Telefon Yazınız">

                                </div>



                                <div class="form-group">

                                    <label for="exampleInputEmail1">E-mail</label>

                                    <input type="text" name="email" class="form-control" value="{{$settings->mail}}" placeholder="E-mail Yazınız">

                                </div>



                                <div class="form-group">

                                    <label for="exampleInputEmail1">Adres</label>

                                    <input type="text" name="address" class="form-control" value="{{$settings->address}}" placeholder="Adres Yazınız">

                                </div>



                                <div class="form-group">

                                    <label for="exampleInputEmail1">Facebook</label>

                                    <input type="text" name="facebook" class="form-control" value="{{$settings->facebook}}" placeholder="Facebook Yazınız">

                                </div>



                                <div class="form-group">

                                    <label for="exampleInputEmail1">Google Konum</label>

                                    <input type="text" name="maps" class="form-control" value="{{$settings->googleMaps}}" placeholder="Google Konum Yazınız">

                                </div>



                                <div class="form-group">

                                    <label for="exampleInputEmail1">Instagram</label>

                                    <input type="text" name="instagram" class="form-control" value="{{$settings->instagram}}" placeholder="Instagram Yazınız">

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputEmail1">Twitter</label>

                                    <input type="text" name="twitter" class="form-control" value="{{$settings->twitter}}" placeholder="Twitter Yazınız">

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputEmail1">Durum</label>

                                    <input type="checkbox" name="status" class="form-control" {{$settings->status == 'on' ? 'checked' : ' ' }}>

                                </div>


                                <div class="form-group">

                                    <label for="exampleInputEmail1">Güncellenme Tarihi</label>

                                    <input type="text" disabled name="status" class="form-control" value="{{$settings->updated_at}}">

                                </div>

                            </form>
                        </div>

                        <div class="card-footer">

                            <button id="dsButton" class="btn btn-primary">Kaydet</button>

                        </div>

                    </div>

                </div>

            </div>


        </div>

    </section>

</div>

@endsection



@section('js')
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

        var url = "{{route('setting-edit',$settings->id)}}";

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
                    top.location.href = "{{route('index')}}";
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