<script src="https://www.google.com/recaptcha/api.js?hl={{app()->getLocale()}}" async defer></script>
<div class="row">
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <form method="post" action="{{route('postMail')}}">
      @csrf
      <div class="form-floating mb-3">
        <input name="name" type="text" class="form-control" placeholder="@lang('fullname')">
        <label for="name">@lang('fullname')</label>
      </div>
      <div class="form-floating mb-3">
        <input name="mail" type="email" class="form-control" placeholder="@lang('e-mail')">
        <label for="mail">@lang('e-mail')</label>
      </div>
      <div class="form-floating mb-3">
        <input name="phone" type="tel" class="form-control" placeholder="@lang('phone')">
        <label for="phone">@lang('phone')</label>
      </div>
      <div class="form-floating mb-3">
        <input name="subject" type="text" class="form-control" placeholder="@lang('subject')">
        <label for="subject">@lang('subject')</label>
      </div>
      <div class="form-floating mb-3">
        <textarea name="contentData" class="form-control h-auto" rows="5" placeholder="@lang('message')"></textarea>
        <label for="content">@lang('message')</label>
      </div>
      <div class="form-floating mb-3">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="kvkkonay">
          <label class="form-check-label" for="kvkkonay">@lang('kvkk-confirm')</label>
        </div>
        <div class="kvkkiletbox"><a href="@lang('kvkk-link')" target="_blank">
            @lang('kvkk-info')</a> </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="veriislemeonay">
          <label class="form-check-label" for="veriislemeonay">
            @lang('confirm-info')</label>
        </div>
      </div>
      <div class="form-floating mb-3">
        <div class="g-recaptcha" name="recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" data-theme="white" data-size="normal" data-type="image"></div>
      </div>
      <div class="form-floating mb-3">
        <button id='mailButton' type="submit" class="btn btn-primary btn-rounded float-start">@lang('send-message')</button>
      </div>
    </form>
  </div>
  <div class="col-1"></div>
  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12735.055656657421!2d30.6276187!3d37.0631088!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14c475b3f30e84bf%3A0xbfd377647eac2b6!2sDr.%20Hans%20Werner%20Chemikalien!5e0!3m2!1str!2str!4v1690209276878!5m2!1str!2str" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
@section('js')
<script>
  $("#mailButton").click(function(event) {
    event.preventDefault();
    var recaptchaResponse = grecaptcha.getResponse();

    if (!recaptchaResponse) {
      toastr.options.positionClass = 'toast-bottom-center';
      toastr.error("@lang('recaptcha-error')", "@lang('error-title')");
      return; // ReCAPTCHA tamamlanmamışsa çık
    }

    var url = "{{route('postMail')}}";
    var form = new FormData($("form")[0]);
    form.append('recaptcha', recaptchaResponse);

    $.ajax({
      type: "POST",
      url: url,
      data: form,
      processData: false,
      contentType: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF belirteci
      },
      success: function(response) {
        if (response.status === "success") {
          toastr.options.positionClass = 'toast-top-center';
          toastr.success(response.content, response.title);
          setTimeout(function() {
            top.location.href = "{{route('postMail')}}";
          }, 1500);
        } else {
          toastr.error(response.content, response.title);
        }
      },
      error: function(request, status, error) {
        var response = JSON.parse(request.responseText);
        $.each(response.errors, function(index, item) {
          toastr.options.positionClass = 'toast-top-center';
          messageText = index + ": " + item[0];
          toastr.error(messageText, index);
        });
      }
    });
  });
</script>
@endsection