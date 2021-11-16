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
                <h1 class="title"><bold>@lang('app.topcar')</bold>@lang('app.home.best_reviews_service')</h1>
            </div>
        </div>
    </section>
    <section class="about" id="about-us">
        <div class="about-wrapper">
            <div class="heading-about">
                <a href="{{ route('about') }}" class="about-link">@lang('app.layout.header.menu_list.about_us')</a>
                <h2 class="about-title">@lang('app.home.reviews_service')</h2>
            </div>
            <div class="about-content">
                <h3 class="about-content-title">@lang('app.home.we_offer')</h3>
                <ul class="about-text">
                    <li class="text point">@lang('app.home.portfolio')</li>
                    <li class="text point">@lang('app.home.hundreds_of_reviews')</li>
                    <li class="text point">@lang('app.home.ability_to_filter')</li>
                    <li class="text point">@lang('app.home.view_recommended')</li>
                    <li class="text point">@lang('app.home.create_account')</li>
                    <li class="text point">@lang('app.home.integrate_api')</li>
                </ul>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
