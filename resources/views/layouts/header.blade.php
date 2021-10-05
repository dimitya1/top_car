<header class="header">
    <div class="logo">
        <a href="{{ route('home') }}" class="logo-topcar">
            <img src="{{ asset('images/logo.svg') }}" width="258px" height="91px" class="logo-img">
        </a>
    </div>
    <div class="header-content">
        <div class="inform">
            <div class="lang-container">
                <a href="./" class="lang @if(app()->getLocale() === 'uk') lang-active @endif">@lang('app.layout.header.languages_list.uk')</a>
                <a href="./" class="lang @if(app()->getLocale() === 'ru') lang-active @endif">@lang('app.layout.header.languages_list.ru')</a>
                <a href="./" class="lang @if(app()->getLocale() === 'en') lang-active @endif">@lang('app.layout.header.languages_list.en')</a>
            </div>
            <address class="address">@lang('app.contacts.city')@lang('app.contacts.street')</address>
            <a href="tel:@lang('app.contacts.tel')" class="tel">@lang('app.contacts.tel')</a>
            <a href="./" class="facebook img-fb fb"></a>
            <button class="user-menu" id="menu-open">
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
                    <a href="#" class="logo-mini">
                        <img src="{{ asset('images/user-mini.png') }}" width="75px" height="75px" alt="logo-topcar" class="logi-mini-img">
                    </a>
                    <button class="close" id="menu-close"></button>
                </div>
                <div class="enter">
                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf
                        <h2 class="title-user">Вхід</h2>
                        <label>
                            <input type="text" class="input" name="email" placeholder="email">
                        </label>
                        <input type="text" class="input" name="password" placeholder="пароль">
                        <div class="chb-container">
                            <input type="checkbox" class="checkbox chb-img" name="remember_me" id="remember-enter">
                            <label class="label-chb" for="remember-enter">запам’ятати в системі</label>
                        </div>
                        <div class="btn-center">
                            <button type="submit" class="btn-standart">Увійти</button>
                        </div>
                    </form>
                </div>
                <div class="registration">
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf
                        <h2 class="title-user">Реєстрація</h2>
                        <input type="text" class="input" name="name" placeholder="ім’я">
                        <input type="text" class="input" name="email" placeholder="email">
                        <div class="chb-container">
                            <input type="checkbox" class="checkbox chb-img" name="show_email" id="show-email">
                            <label class="label-chb" for="show-email">показувати e-mail</label>
                        </div>
                        <input type="text" class="input" name="password" placeholder="пароль">
                        <input type="text" class="input" name="phone_number" placeholder="номер телефону">
                        <div class="chb-container">
                            <input type="checkbox" class="checkbox chb-img" name="show_phone_number" id="show-tel">
                            <label class="label-chb" for="show-tel">показувати телефон</label>
                        </div>
                        <div class="chb-container">
                            <input type="checkbox" class="checkbox chb-img" name="remember_me" id="remember-registration">
                            <label class="label-chb" for="remember-registration">@lang('app.authorization.remember_in_system')</label>
                        </div>
                        <div class="btn-center">
                            <button type="submit" class="btn-standart">@lang('app.authorization.registration')</button>
                        </div>
                    </form>
                </div>
            @else
                <div class="heding-menu">
                    <a href="#" class="logo-mini">
                        <img src="{{ asset('images/user-mini.png') }}" width="75px" height="75px" alt="logo-topcar" class="logi-mini-img">
                    </a>
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
            <a href="#about-us" class="link">@lang('app.layout.header.menu_list.about_us')</a>
            <a href="./" class="link">@lang('app.layout.header.menu_list.reviews')</a>
            <a href="./" class="link">@lang('app.layout.header.menu_list.contacts')</a>
            <a href="./" class="link">@lang('app.layout.header.menu_list.for_developers')</a>
        </div>
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"/>
        @endforeach
        @if (session('successful_login'))
            <x-alert type="success" :message="session('successful_login')"/>
        @endif
        @if (session('successful_registration'))
            <x-alert type="success" :message="session('successful_registration')"/>
        @endif
        @if (session('successful_logout'))
            <x-alert type="success" :message="session('successful_logout')"/>
        @endif
    </div>
</header>
