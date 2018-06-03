@php
    $theme = isset($theme) ? $theme : 'minima';
    $layout = 'vendor/jssocials/dist/jssocials-theme-'. $theme .'.css';
@endphp
<div id="share" class="{{ $theme }}"></div>

@push('js-stack')
{!! Asset::add(Theme::url('vendor/jssocials/dist/jssocials.min.js')) !!}
{!! Asset::add(Theme::url('vendor/jssocials/dist/jssocials.css')) !!}
{!! Asset::add(Theme::url($layout)) !!}
@endpush

@push('js-inline')
<script>
    $(document).ready(function () {
        $("#share").jsSocials({
            shareIn: "popup",
            showLabel: false,
            showCount: "inside",
            shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
        });
    });
</script>
@endpush