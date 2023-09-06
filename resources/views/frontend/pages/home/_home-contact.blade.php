<div class="parallax" id="@lang('products-link')">
  <div class="w3-content container w3-padding-64" id="contact">

    <h3 class="w3-center soldier-font fw-bold; text-center w-100">@lang('contact-form')</h3>

    <!-- <p class="w3-center"><em>I'd love your feedback!</em></p> -->



    <div class="row w3-padding-32 w3-section">

      <div class="w3-col m12 w3-panel">

        <form action="{{route('postMail')}}" target="_blank">

          <div class="w3-row-padding" style="margin:0 -16px 0px -16px">

            <div class="w3-half  mt-2">

              <input class="w3-input w3-border soldier-font2 soldier-color" type="text" placeholder="@lang('name')" required="" name="Name" required>

            </div>

            <div class="w3-half  mt-2">

              <input class="w3-input w3-border  soldier-font2 soldier-color" type="text" placeholder="@lang('e-mail')" required="" name="Email" required>

            </div>

          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
          <div class="w3-col mt-2">

            <input class="w3-input w3-border soldier-font2 soldier-color" type="text" placeholder="@lang('subject')" required="" name="Name" required>

          </div>
          <div class="w3-col mt-2">
            <textarea type="text" class="w3-input w3-border  soldier-font2 soldier-color" rows="3" placeholder="@lang('message')" name="Message" required></textarea>
          </div>
          </div>
          <input type="submit" class="btn btn-success fill ghost success float-end border-2">
        
        </form>
      </div>

    </div>

  </div>
</div>