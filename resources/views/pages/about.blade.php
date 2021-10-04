@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/about/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about/styles/normalize.css') }}">
@endsection

@section('content')
    <section class="about">
        <div class="wrapper">
            @include('layouts.header')
            <div class="about-content">
                <h2 class="about-title">
                    <bold>@lang('app.topcar')</bold>
                    @lang('app.about.cares_about_clients')
                </h2>
                <p class="text">
                    @lang('app.about.benefits')
                </p>
                <p class="text">
                    @lang('app.about.best_ratings')
                </p>
                <div class="ul-list">
                    <p class="text">
                        @lang('app.about.without_registration')
                    </p>
                    <ul class="ul">
                        <li class="text">
                            @lang('app.about.without_registration_list.view_reviews')
                        </li>
                        <li class="text">
                            @lang('app.about.without_registration_list.view_best_card')
                        </li>
                        <li class="text">
                            @lang('app.about.without_registration_list.creating_review')
                        </li>
                    </ul>
                </div>
                <p class="text">
                    @lang('app.about.advertisement')
                </p>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
