@extends('frontend.app')
@section('content')
@include('frontend.include.slider')
<main id="main">
  @include('frontend.pages.home._home-main')
  @include('frontend.pages.home._home-products')
</main>
@include('frontend.include.footer')
@endsection
@section('js')
<script>
  $(document).ready(function() {
    // Ürün detaylarını modal içinde göstermek için event dinleyicisi
    $('.product-link').on('click', function(e) {
      e.preventDefault();
      var productId = $(this).data('product-id');
      $.ajax({
        url: '/product/' + productId,
        type: 'GET',
        success: function(response) {
          $('#productDetails').html(response);
          $('#productModal').modal('show');
        },
        error: function() {
          alert('Ürün detayları alınırken bir hata oluştu.');
        }
      });
    });
  });
</script>
@endsection
@section('css')
<link rel="stylesheet" href="/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection