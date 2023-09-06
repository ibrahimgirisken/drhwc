@include('frontend.include.head')
@include('frontend.include.header')
@yield('content')
<script src="/backend/plugins/jquery/jquery.min.js"></script>
<script src="/frontend/assets/js/jquery.fancybox.min.js"></script>
<script src="/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/frontend/assets/js/owl.carousel.js"></script>
<!-- Template Main JS File -->
<script src="/frontend/assets/js/main.js"></script>
<script src="/frontend/assets/js/toastr.min.js"></script>
<script>
  $.ajaxSetup({

    headers: {

      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

  });
</script>
<script>
  $('[data-fancybox]').fancybox({
    protect: true
  });
</script>
@yield('js')
</body>

</html>