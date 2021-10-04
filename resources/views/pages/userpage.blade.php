@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/userpage/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/userpage/styles/normalize.css') }}">
@endsection

@section('content')
    <section class="about">
        <div class="wrapper">
            @include('layouts.header')
            <div class="userpage-content">
                <span class="user-img user"></span>
                <h2 class="content-title">Вітаємо у Вашій персональній сторінці!</h2>
                <div class="ul">
                    <p class="text">Тут Ви можете:</p>
                    <ul>
                        <li>
                            <a href="" class="list" id="reviews">переглянути власні відгуки;</a>
                        </li>
                        <li>
                            <a href="" class="list" id="new-review">написати новий відгук; </a>
                        </li>
                        <li>
                            <button class="list" id="show-replies">подивитися відповіді на ваші відгуки та кометарі;
                            </button>
                        </li>
                        <li>
                            <button class="list" id="update">редагувати власні дані;</button>
                        </li>
                        <li>
                            <a href="../contacts/index.html" class="list" id="reclam">запропонувати розробникам
                                співпрацю.</a>
                        </li>
                    </ul>
                    <!-- user update -->
                    <div class="user-update" id="user-update">
                        <div class="heding-menu">
                            <a href="#" class="logo-mini">
                                <img src="{{ asset('css/userpage/images/user-mini.png') }}" width="75px" height="75px" alt="logo-topcar"
                                     class="logi-mini-img">
                            </a>
                            <button class="close" id="update-close"></button>
                        </div>
                        <p class="photo-text">Змінити фото </p>
                        <form enctype="multipart/form-data" method="post" class="input-photo">
                            <p class="photo">
                                <input type="file" name="photo" multiple accept="image/*, image/png">
                                <input type="submit" class="btn-standart-mini" value="Надіслати">
                            </p>
                        </form>
                        <div class="update-content">
                            <input required type="text" class="input" placeholder="Змінити email">
                            <div class="chb-container">
                                <input type="checkbox" class="checkbox chb-img" id="show-email">
                                <label class="label-chb" for="show-email">показувати email</label>
                            </div>
                            <input required type="text" class="input" placeholder="Змінити телефон">
                            <div class="chb-container">
                                <input type="checkbox" class="checkbox chb-img" id="show-tel">
                                <label class="label-chb" for="show-tel">показувати телефон</label>
                            </div>
                            <div class="btn-center">
                                <button class="btn-standart">Зберегти зміни</button>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                </div>
                <span class="auto-img auto"></span>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        const openBtn = document.querySelector('#update');
        const closeBtn = document.querySelector('#update-close');

        const update = document.querySelector('#user-update');

        openBtn.addEventListener('click', () => {
            update.classList.add('show-update');
        })
        closeBtn.addEventListener('click', () => {
            update.classList.remove('show-update');
        })
    </script>
@endpush
