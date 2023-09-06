@extends('backend.app')

@section('content')

<div class="content-wrapper">

    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Dökümanlar</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>

                        <li class="breadcrumb-item active">Dökümanlar</li>

                    </ol>

                </div>

            </div>

        </div>

    </div>



    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">Döküman Listesi</h3>

                    <div class="pull-right">

                    <a href="{{ route('datasheet-add')}}"

                                        class="btn btn-primary nav-link {{ request()->is('admin/datasheet-add') ? 'active' : '' }}"><i class="fas fa-plus"></i> Ekle</a>

                    </div>

                </div>

                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped dataTable">

                        <thead>

                        <tr>

                            <th>Id</th>

                            <th>Ürün Adı</th>

                            <th>Url</th>

                            <th>Oluşturulma Tarihi</th>

                            <th>İşlemler</th>

                        </tr>

                        </thead>

                     @if(count($datasheets)>0)

                        <tbody>

                        @foreach($datasheets as $datasheet)

                        <tr>

                            <td>{{$datasheet->uniqId}}</td>

                            <td>{{$datasheet->productName}}</td>

                            <td>{{$datasheet->url}}</td>

                            <td>{{$datasheet->created_at}}</td>

                            <td>

                            <a href="{{route('datasheet-edit',$datasheet->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp;Düzenle</a>

                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Sil</button>

                                <button class="btn btn-success"><i class="fas fa-eye"></i>&nbsp;Aktif/Pasif</button>

                            </td>

                        </tr>

                        @endforeach

                        </tbody>

                     @endif

                    </table>

                </div>

                <!-- /.card-body -->

            </div>

        </div>

    </section>

</div>

@endsection



@section('js')

<script>

    $(function () {

        $("#example1").DataTable();

        $('#example2').DataTable({

            "paging": true,

            "lengthChange": false,

            "searching": false,

            "ordering": true,

            "info": true,

            "autoWidth": false,

        });

    });

</script>

<script>

    $(function () {



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });



        $('#sortable').sortable({

            revert: true,

            handle: ".sortable",

            stop: function (event, ui) {

                var data = $(this).sortable('serialize');

                $.ajax({

                    type: "POST",

                    data: data,

                    url: "{{route('datasheets')}}",

                    success: function (response) {

                         if (response.status == "success") {

                            toastr.success(response.content, response.title);

                        } else {

                            toastr.error(response.content, response.title);

                        }

                    },

                     error: function(request, status, error) {

                        console.log(request.responseText);

                    }

                });



            }

        });

        $('#sortable').disableSelection();



    });

</script>

@endsection



@section('css')



@endsection