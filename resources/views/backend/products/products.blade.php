@extends('backend.app')

@section('content')

<div class="content-wrapper">

    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Ürünler</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>

                        <li class="breadcrumb-item active">Ürün</li>

                    </ol>

                </div>

            </div>

        </div>

    </div>



    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">Ürün Listesi</h3>

                    <div class="pull-right">

                        <a href="{{ route('product-add') }}" class="btn btn-primary nav-link {{ request()->is('admin/product-add') ? 'active' : '' }}"><i class="fas fa-plus"></i> Ekle</a>

                    </div>

                </div>

            </div>

            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped dataTable">

                    <thead>

                        <tr>

                            <th>Ürün Adı</th>

                            <th>Durum</th>

                            <th>İşlemler</th>

                        </tr>

                    </thead>

                    @if(count($products)>0)
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>

                            <td>
                            <td><input type="checkbox" name="status" name="menu_status" data-bootstrap-switch {{$product->status=='on' ? 'checked':""}}></td>
                            </td>

                            <td>

                                <a href="{{ route('product-edit',$product->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp;Düzenle</a>

                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Sil</button>

                                <button class="btn btn-success"><i class="fas fa-eye"></i>&nbsp;Aktif/Pasif</button>

                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                    @endif



                </table>

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
<script src="/backend/plugins/datatables/jquery.dataTables.js"></script>
<script src="/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
    $(function() {

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

@endsection



@section('css')



@endsection