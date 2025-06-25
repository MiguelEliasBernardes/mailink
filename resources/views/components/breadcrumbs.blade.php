<div class="breadcrumbs text-sm">
    <ul>
        @foreach ($links as $index => $link )

            <li>
                @if (isset($link['url']) && $index !== count($links) - 1)
                    <a href="{{ $link['url'] }}">{{ $link['name']  }}</a>
                @else
                    <span>{{ $link['name'] }}</span>
                @endif
            </li>

        @endforeach
    </ul>
</div>
