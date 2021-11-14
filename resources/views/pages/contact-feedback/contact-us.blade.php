@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/contacts/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contacts/styles/normalize.css') }}">
@endsection

@section('content')
    <section class="contacts">
        <div class="wrapper">
            @include('layouts.header')
            <div class="contacts-content">
                <div class="contacts-information">
                    <address class="address-contacts">@lang('app.contacts.city')<br>@lang('app.contacts.street')</address>
                    <div class="main-contacts">
                        <a href="tel:@lang('app.contacts.tel')" class="tel-contacts">@lang('app.contacts.tel')</a>
                        <a href="mailto:@lang('app.contacts.email')" class="mail-contacts">@lang('app.contacts.email')</a>
                        <a href="https://facebook.com" target="_blank" class="link-facebook fb-img">@lang('app.contacts.facebook_text')</a>
                    </div>
                </div>
                <form class="contact-form" method="POST" action="{{ route('contact_us.store') }}">
                    @csrf
                    <h2 class="form-title">@lang('app.contacts.wanna_help')</h2>
                    <input type="text" name="creator_name" class="name" placeholder="@lang('app.contacts.contact_form.name')" @auth value="{{ auth()->user()->name }}" @endauth>
                    <textarea type="text" name="message" class="message" placeholder="@lang('app.contacts.contact_form.message')"></textarea>
                    <p class="form-text">@lang('app.contacts.contact_form.help')</p>
                    <input type="tel" name="creator_phone_number" class="form-phone" placeholder="@lang('app.contacts.contact_form.phone_number')">
                    <input type="email" name="creator_email" class="form-email" placeholder="@lang('app.contacts.contact_form.email')">
                    <div class="btn-center">
                        <input type="submit" value="@lang('app.contacts.contact_form.send_request')" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
