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
                <h2 class="content-title">@lang('app.userpage.congrats_personal_page')</h2>
                <div class="ul">
                    <p class="text">@lang('app.userpage.here_you_can')</p>
                    <ul>
                        <li>
                            <a href="{{ route('reviews.index', ['own' => true]) }}" class="list" id="reviews">@lang('app.userpage.u_can_list.see_own_reviews')</a>
                        </li>
                        <li>
                            <a href="{{ route('reviews.create') }}" class="list" id="new-review">@lang('app.userpage.u_can_list.create_own_review')</a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="" class="list" id="update">@lang('app.userpage.u_can_list.edit_personal_data')</a>--}}
{{--                        </li>--}}
                        <li>
                            <a href="{{ route('contact_us.index') }}" class="list" id="reclam">@lang('app.userpage.u_can_list.offer_coop')</a>
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
                        <p class="photo-text">@lang('app.userpage.change_photo')</p>
                        <form enctype="multipart/form-data" method="post" class="input-photo">
                            <p class="photo">
                                <input type="file" name="photo" multiple accept="image/*, image/png">
                                <input type="submit" class="btn-standart-mini" value="@lang('app.userpage.send')">
                            </p>
                        </form>
                        <div class="update-content">
                            <input required type="text" class="input" placeholder="@lang('app.userpage.change_email')">
                            <div class="chb-container">
                                <input type="checkbox" class="checkbox chb-img" id="show-email">
                                <label class="label-chb" for="show-email">@lang('app.userpage.show_email')</label>
                            </div>
                            <input required type="text" class="input" placeholder="@lang('app.userpage.change_phone')">
                            <div class="chb-container">
                                <input type="checkbox" class="checkbox chb-img" id="show-tel">
                                <label class="label-chb" for="show-tel">@lang('app.userpage.show_phone')</label>
                            </div>
                            <div class="btn-center">
                                <button class="btn-standart">@lang('app.userpage.save_changes')</button>
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
