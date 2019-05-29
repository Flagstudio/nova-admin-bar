<link rel="stylesheet" href="{{ asset('vendor/nova-admin-bar/css/main.css') }}">
<div id="admin-bar">
    <ul class="admin-bar">
        <li class="admin-bar__icons-flag">
            <a target="_blank" href="{{ config('nova.path') ?: 'nova' }}">
                <img class="admin-bar__icons-first" src="{{ asset('images/flag_logo-1.svg')  }}" alt="flagstudio.ru">
            </a>

            <ul class="admin-bar__submenu">
                <li><a target="_blank" href="https://laravel.com/docs/master/eloquent-collections">Laravel Docs</a></li>
                <li><a target="_blank" href="https://nova.laravel.com/docs/1.0/resources/fields.html">Nova Docs</a></li>
                <li><a target="_blank" href="https://flagstudio.ru">Flag Studio</a></li>
            </ul>
        </li>
        <li>
            <a href="">Edit main page for guests
                {{--<svg class="admin-bar__icon">--}}
                {{--<use xlink:href="#icon-pencil"/>--}}
                {{--</svg>--}}
            </a>
        </li>
    </ul>
</div>