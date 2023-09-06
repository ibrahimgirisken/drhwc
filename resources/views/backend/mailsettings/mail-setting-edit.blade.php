@extends('backend.app')

@section('content')

<div class="content-wrapper">

    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Mail Ayar Düzenle</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>

                        <li class="breadcrumb-item active">Mail Ayarlar</li>

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
                                    <label for="exampleInputEmail1">SMTP Mail Host</label>

                                    <input type="text" name="host" class="form-control" value="{{$mailsettings->smtp_mail_host}}" placeholder="SMTP Mail Host">

                                </div>


                                <div class="form-group">

                                    <label for="exampleInputEmail1">SMTP Mail Port</label>

                                    <input type="text" name="port" class="form-control" value="{{$mailsettings->smtp_mail_port}}" placeholder="SMTP Mail Port">

                                </div>


                                <div class="form-group">

                                    <label for="exampleInputEmail1">SMTP Secure</label>

                                    <input type="text" name="secure" class="form-control" value="{{$mailsettings->smtp_encryption}}" placeholder="SMTP Secure">

                                </div>


                                <div class="form-group">

                                    <label for="exampleInputEmail1">Gönderici Mail Adresi</label>

                                    <input type="text" name="address" class="form-control" value="{{$mailsettings->mail_address}}" placeholder="Gönderici Mail Adresi">

                                </div>



                                <div class="form-group">

                                    <label for="exampleInputEmail1">Mail Adresi Şifresi</label>

                                    <input type="text" name="password" class="form-control" value="{{$mailsettings->mail_password}}" placeholder="Mail Adresi Şifresi">

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputEmail1">{{$mailsettings->updated_at}}</label>


                                </div>

                            </form>
                        </div>

                        <div class="card-footer">

                            <button id="mButton" class="btn btn-primary">Kaydet</button>

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
    $("#mButton").click(function() {

        var url = "{{route('mail-setting-edit',$mailsettings->id)}}";

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