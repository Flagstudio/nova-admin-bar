<link rel="stylesheet" href="{{ asset('vendor/nova-admin-bar/css/main.css') }}">
<div id="admin-bar">
    <ul class="admin-bar">
        <li class="admin-bar__icons-flag">
            <a target="_blank" href="{{ config('nova.path') ?: 'nova' }}">
                <img class="admin-bar__icons-first" src="{{ config('adminbar.icon') }}" alt="flagstudio.ru">
            </a>

            @if ($dropDownLinks = config('adminbar.dropdown_links'))
                <ul class="admin-bar__submenu">
                    @foreach ($dropDownLinks as $key => $link)
                        <li>
                            <a target="_blank" href="{{ $link }}">{{ $key }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
        @if ($links = config('adminbar.links'))
            @foreach ($links as $key => $link)
                <li>
                    <a href="{{ $link }}">{{ $key }}</a>
                </li>
            @endforeach
        @endif
        @if ($indexLink)
            <li>
                <a href="{{ $indexLink }}">List</a>
            </li>
        @endif
        @if ($showLink)
            <li>
                <a href="{{ $showLink }}">Show</a>
            </li>
        @endif
        @if ($editLink)
            <li>
                <a href="{{ $editLink }}">Edit</a>
            </li>
        @endif
        @if ($branch)
            <li style="margin-left: auto; margin-right: 100px;">
                <a>Branch: {{ $branch }}</a>
            </li>
        @endif
    </ul>
</div>