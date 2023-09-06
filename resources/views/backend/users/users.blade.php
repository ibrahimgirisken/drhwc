@extends('backend.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kullanıcılar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Kullanıcı</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kullanıcı Listesi</h3>
                    <div class="pull-right">
                    <a href="{{ route('user-add') }}"
                                        class="btn btn-primary nav-link {{ request()->is('admin/user-add') ? 'active' : '' }}"><i class="fas fa-plus"></i> Ekle</a>
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Kullanıcı Adı</th>
                            <th>Email</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        @if(count($users)>0)
                        <tbody>
                            @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{route('user-edit',$user->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp;Düzenle</a>
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
                    url: "/index.html",
                    success: function (msg) {
                        // console.log(msg);
                        if (msg) {
                            console.log("başarılı")
                        } else {
                            console.log("İşlem Başarısız");
                        }
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