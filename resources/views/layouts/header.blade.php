<header class="header">
    <div class="logo">
        <a href="#" class="logo-topcar">
            <img src="{{ asset('images/logo.svg') }}" width="258px" height="91px" class="logo-img">
        </a>
    </div>
    <div class="header-content">
        <div class="inform">
            <div class="lang-container">
                <a href="./" class="lang lang-active">ук</a>
                <a href="./" class="lang">ру</a>
                <a href="./" class="lang">en</a>
            </div>
            <address class="address">Одеса, вул. Садова 8</address>
            <a href="tel:+38(040) 256 558 12" class="tel">+38(040) 256 558 12</a>
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
                            <label class="label-chb" for="remember-registration">запам’ятати в системі</label>
                        </div>
                        <div class="btn-center">
                            <button type="submit" class="btn-standart">Реєстрація</button>
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
                        <button type="submit" class="btn-standart">Вийти</button>
                    </form>
                </div>
            @endguest
        </div>
        <div class="menu">
            <a href="#about-us" class="link">про нас</a>
            <a href="./" class="link">відгуки</a>
            <a href="./" class="link">контакти</a>
            <a href="./" class="link">для розробників</a>
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
