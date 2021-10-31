@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/styles/normalize.css') }}">
@endsection

@section('content')
    <section class="text-gray-200 body-font overflow-hidden bg-gradient-to-tr from-gray-800 via-gray-700 to-red-900">
        @include('layouts.header')
        <div class="container px-5 py-10 mx-auto">
            <form method="POST" action="{{ route('reviews.store') }}">
                @csrf
                <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-white">Заголовок</label>

                    <input name="title" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="text">
                </div>

                @livewire('car-brands-models-select-create')

                <div class="items-center -mx-2 md:flex">
                    <div class="w-full mx-2">
                        <label class="block mb-2 text-sm font-medium text-white">@lang('app.review.fuel_type')</label>

                        <input name="fuel_type" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="text">
                    </div>

                    <div class="w-full mx-2 mt-4 md:mt-0">
                        <label class="block mb-2 text-sm font-medium text-white">@lang('app.review.engine')</label>

                        <input name="engine" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="text">
                    </div>

                    <div class="w-full mx-2 mt-4 md:mt-0">
                        <label class="block mb-2 text-sm font-medium text-white">@lang('app.review.power')</label>

                        <input name="power" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="number" min="0" step="1">
                    </div>
                </div>
                <div class="items-center -mx-2 md:flex">
                    <div class="w-full mx-2">
                        <label class="block mb-2 text-sm font-medium text-white">@lang('app.review.consumption_city')</label>

                        <input name="consumption_city" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="number" min="0" step="0.1">
                    </div>

                    <div class="w-full mx-2 mt-4 md:mt-0">
                        <label class="block mb-2 text-sm font-medium text-white">@lang('app.review.consumption_highway')</label>

                        <input name="consumption_highway" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="number" min="0" step="0.1">
                    </div>
                </div>

                <div class="w-full mt-4">
                    <label class="block mb-2 text-sm font-medium text-white">Доповніть свої враження тут</label>

                    <textarea name="content" class="block w-full h-40 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
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
