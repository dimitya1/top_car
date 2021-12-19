@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/styles/normalize.css') }}">
@endsection

@section('content')
    <section class="text-white body-font overflow-hidden bg-gradient-to-r from-green-600 via-blue-500 to-indigo-700">
        @include('layouts.header')
        <div class="px-10">

            <div class="flex justify-between">
                <div>
                    @if (session('successful_destroy'))
                        <x-alert type="success" :message="session('successful_destroy')"/>
                    @endif
                    @if (session('successful_update'))
                        <x-alert type="success" :message="session('successful_update')"/>
                    @endif
                    @if (session('successful_store'))
                        <x-alert type="success" :message="session('successful_store')"/>
                    @endif
                </div>
                <a href="{{ route('admin.administrators.create') }}" class="py-2 px-4 flex justify-center items-center  bg-green-500 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                    @lang('app.actions.create')
                </a>
            </div>

            <div class="mt-5 mb-10 overflow-hidden rounded-lg shadow-lg">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">@lang('app.admin.administrator.name')</th>
                                <th class="px-4 py-3">@lang('app.admin.administrator.email')</th>
                                <th class="px-4 py-3">@lang('app.admin.administrator.phone_number')</th>
                                <th class="px-4 py-3">@lang('app.admin.administrator.show_email')</th>
                                <th class="px-4 py-3">@lang('app.admin.administrator.show_phone_number')</th>
                                <th class="px-4 py-3">@lang('app.admin.administrator.created')</th>
                                <th class="px-4 py-3">@lang('app.admin.administrator.updated')</th>
                                <th class="px-4 py-3">@lang('app.admin.administrator.edit')</th>
                                <th class="px-4 py-3">@lang('app.admin.administrator.delete')</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($administrators as $admin)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-12 h-12 mr-3 rounded-full md:block">
                                                @if($admin->avatar)
                                                    <img class="object-cover w-full h-full rounded-full"
                                                         src="{{ url("storage/$admin->avatar") }}" alt="{{ $admin->name }}" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                @endif
                                            </div>

                                            <div>
                                                <p class="font-semibold text-black">{{ $admin->name }}</p>
                                                <p class="text-xs text-gray-600">@lang('app.admin.administrator.title')</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-ms italic border">
                                        <a href="mailto:{{ $admin->email }}">{{ $admin->email }}</a>
                                    </td>
                                    <td class="px-4 py-3 text-ms border">
                                        @lang("app.yes_no.$admin->show_email")
                                    </td>
                                    <td class="px-4 py-3 text-ms italic border">
                                        <a href="tel:{{ $admin->phone_number }}">{{ $admin->phone_number }}</a>
                                    </td>
                                    <td class="px-4 py-3 text-ms border">
                                        @lang("app.yes_no.$admin->show_phone_number")
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        {!! $admin->created_at->toDateTimeString().'<br>'.$admin->created_at->diffForHumans() !!}
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        @if($admin->created_at !== $admin->updated_at)
                                            {!! $admin->updated_at->toDateTimeString().'<br>'.$admin->updated_at->diffForHumans() !!}
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        <a href="{{ route('admin.administrators.edit', ['administrator' => $admin]) }}" class="flex items-center px-2 py-2 font-medium tracking-wide
                                            text-black transition-colors duration-200 transform bg-yellow-400 rounded-md hover:bg-yellow-500 focus:outline-none focus:ring focus:ring-yellow-200 focus:ring-opacity-80">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <span class="mx-1">Редагувати</span>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        <form method="POST" action="{{ route('admin.administrators.destroy', ['administrator' => $admin]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="flex items-center px-2 py-2 font-medium tracking-wide
                                                text-black transition-colors duration-200 transform bg-red-400 rounded-md hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-80">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                <span class="mx-1">Видалити</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
