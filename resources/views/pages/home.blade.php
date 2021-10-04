@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/styles/normalize.css') }}">
@endsection

@section('content')
    <section class="landing">
        <div class="wrapper">
            @include('layouts.header')
            <div class="landing-content" id="content">
                <h1 class="title"><bold>TopCar</bold> - найкращий сервіс відгуків про автомобілі</h1>
            </div>
        </div>
    </section>
    <section class="about" id="about-us">
        <div class="about-wrapper">
            <div class="heading-about">
                <a href="./" class="about-link">про нас</a>
                <h2 class="about-title">TopCar - сервіс відгуків про автомобілі</h2>
            </div>
            <div class="about-content">
                <h3 class="about-content-title">Ми пропонуємо нашим  користувачам:</h3>
                <ul class="about-text">
                    <li class="text point">портфоліо різноманих автомобілів</li>
                    <li class="text point">сотні відгуків про різні моделі</li>
                    <li class="text point">можливість відфільтрувати пошук певного автомобіля</li>
                    <li class="text point">переглянути рекомендовані марки та моделі</li>
                    <li class="text point">створити  власний обліковий запис</li>
                </ul>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
