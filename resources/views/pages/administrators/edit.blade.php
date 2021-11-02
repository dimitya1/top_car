@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/styles/normalize.css') }}">
@endsection

@section('content')
    <section class="text-white body-font overflow-hidden bg-gradient-to-r from-green-600 via-blue-500 to-indigo-700">
        @include('layouts.header')
        <div class="container px-5 py-10 mx-auto">
            <form method="POST" action="{{ route('admin.administrators.update', ['administrator' => $admin]) }}">
                @method('PUT')
                @csrf
                <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-white">Ім'я</label>
                    <input name="name" required value="{{ $admin->name }}" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="text">

                    <label class="block mb-2 text-sm font-medium text-white">Email</label>
                    <input name="email" required value="{{ $admin->email }}" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="email">

                    <label class="block mb-2 text-sm font-medium text-white">Номер телефону</label>
                    <input name="phone_number" required value="{{ $admin->phone_number }}" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="tel">

                    <label class="block mb-2 text-sm font-medium text-white">Встановіть новий пароль за потребою</label>
                    <input name="new_password" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="password">
                </div>

                <div class="flex justify-center mt-6">
                    <button type="submit" class="px-4 py-2 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Зберегти на сайті</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
