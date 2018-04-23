<div class="mailchimp">
    <h4>{!! trans('themes::theme.footer.event newsletter') !!}</h4>
    <div class="mailchimp-form">
        <form action="http://emarketing.qbicom.com.tr/lists/5adba70837f56/embedded-form-subscribe-captcha" method="POST" class="form-validate-jqueryz">
            <input id="ADINIZ" placeholder="{{ trans('themes::theme.newsletter.name') }}" value="" type="text" name="ADINIZ" class="input-text required">
            <input id="EMAIL" placeholder="{{ trans('themes::theme.newsletter.email') }}" value="" type="text" name="EMAIL" class="input-text required email">
            <button class="awe-btn">{{ trans('themes::theme.newsletter.button') }}</button>
        </form>
        @push('js-inline')
            <script type="text/javascript" src="http://emarketing.qbicom.com.tr/assets/js/core/libraries/jquery.min.js">
            </script>
            <script type="text/javascript" src="http://emarketing.qbicom.com.tr/assets/js/plugins/forms/validation/validate.min.js">
            </script>
            <script>$.noConflict();jQuery( document ).ready(function( $ ) {$(".subscribe-embedded-form form").validate({rules:{EMAIL: {required: true,email: true,remote: "http://emarketing.qbicom.com.tr/lists/5adba70837f56/check-email" }}});});</script>
        @endpush
    </div>
</div>