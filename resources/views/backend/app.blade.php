<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <link rel="stylesheet" href="/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

    <link rel="stylesheet" href="/backend/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="/backend/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="/backend/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="/backend/plugins/toastr/toastr.min.css">





    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield('css')

</head>



<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">

                <li class="nav-item">

                    <a class="nav-link" data-widget="pushmenu" href="{{ route('index') }}"><i class="fas fa-bars"></i></a>

                </li>

                <li class="nav-item">

                    <a class="nav-link float-end" type="button" target="blank" href="{{ route('getSite') }}">Web Site</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link float-end" type="button" href="{{ route('logout') }}">Çıkış Yap</a>

                </li>

            </ul>

        </nav>



        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="{{ route('index') }}" class="brand-link">

                <img src="/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

                <span class="brand-text font-weight-light">Admin</span>

            </a>



            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="image">

                        <img src="{{ asset('frontend/assets/img/dr-hwc-logo-white.svg') }}" width="100%" height="100%" style="scale:2;" alt="User Image">

                    </div>

                    <div class="info">

                        <a href="/admin">Dr-Hwc</a>

                    </div>

                </div>



                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">

                            <a href="{{ route('index') }}" class="nav-link {{ request()->is('admin/home') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-tachometer-alt"></i>

                                <p>

                                    Anasayfa

                                </p>

                            </a>

                        </li>



                        <li class="nav-item has-treeview {{ request()->is('admin/main-pages', 'admin/main-page-add') ? 'menu-open' : '' }}">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fab fa-blogger-b"></i>

                                <p>

                                    Anasayfa İçerikleri

                                    <i class="fas fa-angle-left right"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('main-pages') }}" class="nav-link {{ request()->is('admin/main-pages') ? 'active' : '' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Sayfa İçerikleri</p>

                                    </a>

                                </li>

                            </ul>

                        </li>





                        <li class="nav-item has-treeview {{ request()->is('admin/datasheets', 'admin/datasheet-add','admin/datasheet-edit') ? 'menu-open' : '' }}">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fab fa-blogger-b"></i>

                                <p>

                                    İndirme Merkezi

                                    <i class="fas fa-angle-left right"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('datasheets') }}" class="nav-link {{ request()->is('admin/datasheets') ? 'active' : '' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Dökümanlar</p>

                                    </a>

                                </li>

                            </ul>

                        </li>





                        <li class="nav-item has-treeview {{ request()->is('admin/blogs', 'admin/blog-add', 'admin/blog-edit', 'admin/blog-category', 'admin/blog-category-add', 'admin/blog-category-edit') ? 'menu-open' : '' }}">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fab fa-blogger-b"></i>

                                <p>

                                    Bloglar

                                    <i class="fas fa-angle-left right"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('blogs') }}" class="nav-link {{ request()->is('admin/blogs') ? 'active' : '' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Blog Liste</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="{{ route('blog-category') }}" class="nav-link {{ request()->is('admin/blog-category') ? 'active' : '' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Blog Kategori</p>

                                    </a>

                                </li>

                            </ul>

                        </li>
                        <li class="nav-item has-treeview {{ request()->is('admin/menu-add', 'admin/menus') ? 'menu-open' : '' }}">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fas fa-compass"></i>

                                <p>

                                    Menüler

                                    <i class="fas fa-angle-left right"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('menus') }}" class="nav-link {{ request()->is('admin/menus') ? 'active' : '' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Menü Listesi</p>

                                    </a>

                                </li>

                            </ul>

                        </li>


                        <li class="nav-item has-treeview {{ request()->is('admin/page-add', 'admin/pages') ? 'menu-open' : '' }}">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fas fa-pager"></i>

                                <p>

                                    Sayfalar

                                    <i class="fas fa-angle-left right"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('pages') }}" class="nav-link {{ request()->is('admin/pages') ? 'active' : '' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Sayfa Listesi</p>

                                    </a>

                                </li>

                            </ul>

                        </li>

                        <li class="nav-item has-treeview {{ request()->is('admin/module-add','admin/module-edit','admin/modules','admin/templates','admin/template-add','admin/template-edit') ? 'menu-open' : '' }}">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fas fa-pager"></i>

                                <p>

                                    Moduller

                                    <i class="fas fa-angle-left right"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('modules') }}" class="nav-link {{ request()->is('admin/modules','admin/module-edit','admin/module-add') ? 'active' : '' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Module Listesi</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="{{ route('templates') }}" class="nav-link {{ request()->is('admin/templates','admin/template-edit','admin/template-add') ? 'active' : '' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Şablon Listesi</p>

                                    </a>

                                </li>

                            </ul>

                        </li>

                        <li class="nav-item has-treeview {{ request()->is('admin/product-add', 'admin/products','admin/product-edit') ? 'menu-open' : '' }}">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fas fa-pager"></i>

                                <p>

                                    Ürün Yönetimi

                                    <i class="fas fa-angle-left right"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('products') }}" class="nav-link {{ request()->is('admin/products') ? 'active' : '' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Ürün Listesi</p>

                                    </a>

                                </li>
                                <li class="nav-item">

                                    <a href="{{ route('categories') }}" class="nav-link {{ request()->is('admin/categories') ? 'active' : '' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Kategori Listesi</p>

                                    </a>

                                </li>

                            </ul>

                        </li>



                        <li class="nav-item has-treeview {{ request()->is('admin/slider-add', 'admin/sliders') ? 'menu-open' : '' }}">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fas fa-images"></i>

                                <p>

                                    Slider

                                    <i class="fas fa-angle-left right"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('sliders') }}" class="nav-link  {{ request()->is('admin/sliders') ? 'active' : '' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Slider Listesi</p>

                                    </a>

                                </li>

                            </ul>

                        </li>


                        <li class="nav-item has-treeview {{ request()->is('admin/user-add', 'admin/users') ? 'menu-open' : '' }}">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fas fa-users"></i>

                                <p>

                                    Kullanıcılar

                                    <i class="fas fa-angle-left right"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('users') }}" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Kullanıcı Listesi</p>

                                    </a>

                                </li>

                            </ul>

                        </li>

                        <li class="nav-item">

                            <a href="{{ route('setting-edit',['id'=>'1']) }}" class="nav-link {{ request()->is('admin/setting-edit') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-cogs"></i>

                                <p>

                                    Site Ayarları

                                </p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="{{ route('mail-setting-edit',['id'=>'1']) }}" class="nav-link {{ request()->is('admin/mail-setting-edit') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-cogs"></i>

                                <p>

                                    Mail Ayarları

                                </p>

                            </a>

                        </li>

                    </ul>

                </nav>

            </div>

        </aside>

        @yield('content')

        <aside class="control-sidebar control-sidebar-dark">

        </aside>



        <footer class="main-footer">

            <strong>Copyright &copy; 2023</strong>

            All rights reserved.

        </footer>

    </div>

    <script src="/backend/plugins/jquery/jquery.min.js"></script>

    <script src="/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

    <script src="/backend/dist/js/adminlte.js"></script>

    <script src="/backend/dist/js/demo.js"></script>

    <script src="/backend/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>


    <script src="/backend/plugins/raphael/raphael.min.js"></script>

    <script src="/backend/plugins/jquery-mapael/jquery.mapael.min.js"></script>

    <script src="/backend/plugins/jquery-mapael/maps/usa_states.min.js"></script>

    <script src="/backend/plugins/chart.js/Chart.min.js"></script>

    <script src="/backend/dist/js/pages/dashboard2.js"></script>

    <script src="/backend/plugins/toastr/toastr.min.js"></script>

    <script src="/backend/plugins/datatables/jquery.dataTables.js"></script>

    <script src="/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <script src="/backend/dist/js/pages/dashboard2.js"></script>

    <script src="/backend/dist/js/main.js"></script>
    <script>
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    @yield('js')
</body>



</html>