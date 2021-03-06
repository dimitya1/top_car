<header class="header">
    <div class="logo">
        <a href="{{ route('home') }}" class="logo-topcar">
            <img src="{{ asset('images/logo.svg') }}" width="258px" height="91px" class="logo-img">
        </a>
    </div>
    <div class="header-content">
        <div class="inform">
            <div class="lang-container">
                <a href="{{ route('language.switch', config('topcar.locale_uk', 'uk')) }}" class="lang @if(app()->getLocale() === config('topcar.locale_uk', 'uk')) lang-active @endif">@lang('app.layout.header.languages_list.uk')</a>
                <a href="{{ route('language.switch', config('topcar.locale_ru', 'ru')) }}" class="lang @if(app()->getLocale() === config('topcar.locale_ru', 'ru')) lang-active @endif">@lang('app.layout.header.languages_list.ru')</a>
                <a href="{{ route('language.switch', config('topcar.locale_en', 'en')) }}" class="lang @if(app()->getLocale() === config('topcar.locale_en', 'en')) lang-active @endif">@lang('app.layout.header.languages_list.en')</a>
            </div>
            <address class="address">@lang('app.contacts.city')@lang('app.contacts.street')</address>
            <a href="tel:@lang('app.contacts.tel')" class="tel">@lang('app.contacts.tel')</a>
            <a href="https://facebook.com" target="_blank" class="facebook img-fb fb"></a>
            <button @guest class="user-menu" @else class="link" @endguest id="menu-open">
                @auth
                    {{ auth()->user()->name }}
                @else
                    <img src="{{ asset('images/user-btn.png') }}" width="29px" height="29px" class="menu-img">
                @endauth
            </button>
        </div>
        <div class="user-menu-content" id="user-menu">
            @guest
                <div class="heding-menu">
                    <img src="{{ asset('images/user-mini.png') }}" width="75px" height="75px" alt="logo-topcar" class="logi-mini-img">
                    <button class="close" id="menu-close"></button>
                </div>
                <div class="enter">
                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf
                        <h2 class="title-user">@lang('app.authorization.login')</h2>
                        <label>
                            <input type="text" class="input" name="email" placeholder="@lang('app.authorization.fields.email')">
                        </label>
                        <input type="password" class="input" name="password" placeholder="@lang('app.authorization.fields.password')">
                        <div class="chb-container">
                            <input type="checkbox" class="checkbox chb-img" name="remember_me" id="remember-enter">
                            <label class="label-chb" for="remember-enter">@lang('app.authorization.fields.remember_in_system')</label>
                        </div>
                        <div class="btn-center">
                            <button type="submit" class="btn-standart">@lang('app.authorization.log_in')</button>
                        </div>
                    </form>
                </div>
                <div class="registration">
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf
                        <h2 class="title-user">@lang('app.authorization.registration')</h2>
                        <input type="text" class="input" name="name" placeholder="@lang('app.authorization.fields.name')">
                        <input type="text" class="input" name="email" placeholder="@lang('app.authorization.fields.email')">
                        <div class="chb-container">
                            <input type="checkbox" class="checkbox chb-img" name="show_email" id="show-email">
                            <label class="label-chb" for="show-email">@lang('app.authorization.fields.show_email')</label>
                        </div>
                        <input type="password" class="input" name="password" placeholder="@lang('app.authorization.fields.password')">
                        <input type="text" class="input" name="phone_number" placeholder="@lang('app.authorization.fields.phone_number')">
                        <div class="chb-container">
                            <input type="checkbox" class="checkbox chb-img" name="show_phone_number" id="show-tel">
                            <label class="label-chb" for="show-tel">@lang('app.authorization.fields.show_phone_number')</label>
                        </div>
                        <div class="chb-container">
                            <input type="checkbox" class="checkbox chb-img" name="remember_me" id="remember-registration">
                            <label class="label-chb" for="remember-registration">@lang('app.authorization.fields.remember_in_system')</label>
                        </div>
                        <div class="btn-center">
                            <button type="submit" class="btn-standart">@lang('app.authorization.register')</button>
                        </div>
                    </form>
                </div>
            @else
                <div class="heding-menu">
                    <img src="{{ asset('images/user-mini.png') }}" width="75px" height="75px" alt="logo-topcar" class="logi-mini-img">
                    <button class="close" id="menu-close"></button>
                </div>
                <div class="enter">
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit" class="btn-standart">@lang('app.authorization.logout')</button>
                    </form>
                </div>
            @endguest
        </div>
        <div class="menu">
            <a href="{{ route('about') }}" class="link">@lang('app.layout.header.menu_list.about_us')</a>
            <a href="{{ route('reviews.index') }}" class="link">@lang('app.layout.header.menu_list.reviews')</a>
            <a href="{{ route('contact_us.index') }}" class="link">@lang('app.layout.header.menu_list.contacts')</a>
            @can(\App\Models\Permission::PERMISSION_ACCESS_FOR_DEVELOPERS)
                <a href="{{ config('app.url').'/api/v1/documentation' }}" target="_blank" class="link">@lang('app.layout.header.menu_list.for_developers')</a>
            @endcan
            @auth
                <a href="{{ route('profile') }}" class="link">@lang('app.layout.header.menu_list.profile')</a>
            @endauth
        </div>
        @if(auth()->user() && auth()->user()->hasRole(\App\Models\Role::ROLE_ADMIN))
            <div class="menu">
                <a href="{{ route('admin.users.index') }}" class="link">@lang('app.layout.header.menu_list.admin.users')</a>
                <a href="{{ route('admin.reviews.index') }}" class="link">@lang('app.layout.header.menu_list.admin.reviews')</a>
                {{--                <a href="#" class="link">@lang('app.admin.car_model.index')</a>--}}
                <a href="{{ route('admin.administrators.index') }}" class="link">@lang('app.layout.header.menu_list.admin.admins')</a>
                <a href="{{ route('admin.feedback.index') }}" class="link">@lang('app.layout.header.menu_list.admin.feedback')</a>
                <a href="{{ route('admin.activity_log.index') }}" class="link">@lang('app.layout.header.menu_list.admin.activity_logs')</a>
            </div>
        @endif
    </div>
</header>
