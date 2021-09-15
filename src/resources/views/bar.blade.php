<link rel="stylesheet" href="{{ asset('vendor/nova-admin-bar/css/main.css') }}">
<input id="nova-admin-bar-switcher" type="checkbox">
<script>
    var input = document.querySelector('#nova-admin-bar-switcher');
    var defaultState = localStorage.getItem('nova-admin-bar-opened');

    if (input) {
        if (defaultState === 'false') {
            input.removeAttribute('checked');
        } else {
            input.setAttribute('checked', 'checked');
        }

        input.addEventListener('change', function (event) {
            localStorage.setItem('nova-admin-bar-opened', event.target.checked);
        });
    }
</script>
<div class="admin-bar {{ $debugBarEnabled ? 'admin-bar--shift' : '' }} {{ $position === 'bottom' ? 'admin-bar--bottom' : '' }}">
    <div class="admin-bar__icon-flag">
        <label for="nova-admin-bar-switcher" class="admin-bar__flag-label">
            <img class="admin-bar__icons-first" src="{{ config('adminbar.icon') }}" alt="flagstudio.ru">
        </label>

        @if ($dropDownLinks = config('adminbar.dropdown_links'))
            <ul class="admin-bar__submenu">
                @foreach ($dropDownLinks as $key => $link)
                    <li>
                        <a target="_blank" href="{{ $link }}">{{ $key }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="admin-bar__wrapper">
        <ul class="admin-bar__general">
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
            </ul>
            <ul class="admin-bar__dev-info">
                @if ($env)
                    <li>
                        <div class="admin-bar__env admin-bar__env--{{ $env }}">env: {{ $env }}</div>
                    </li>
                @endif
                @if ($branch)
                    <li>
                        <div class="admin-bar__branch">branch: {{ $branch }}</div>
                    </li>
                @endif
                @if ($commit)
                    <li>
                        <div class="admin-bar__branch admin-bar__branch--gray">{{ $commit }}</div>
                    </li>
                @endif
                @if ($date)
                    <li>
                        <div class="admin-bar__branch admin-bar__branch--gray">{{ $date }}</div>
                    </li>
                @endif
            </ul>
    </div>
</div>
