@if(isset($list))
<ul class="socials">
@endif
    @foreach(['facebook', 'twitter', 'instagram', 'google', 'linkedin', 'youtube', 'vimeo'] as $social)
        @if(setting('theme::'.$social))
            @if(isset($list))
            <li>
            @endif
                <a target="_blank" href="{{ setting('theme::'.$social) }}"><i class="fa fa-{{ $social }}"></i></a>
            @if(isset($list))
            </li>
            @endif
        @endif
    @endforeach
@if(isset($list))
</ul>
@endif