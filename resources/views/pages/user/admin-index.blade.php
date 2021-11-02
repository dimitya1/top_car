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
                    @if (session('successful_authorisation_delete'))
                        <x-alert type="success" :message="session('successful_authorisation_delete')"/>
                    @endif
                    @if (session('successful_destroy'))
                        <x-alert type="success" :message="session('successful_destroy')"/>
                    @endif
                </div>
            </div>

            <div class="mt-5 mb-5 overflow-hidden rounded-lg shadow-lg">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Ім'я</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Показувати email</th>
                                <th class="px-4 py-3">Телефонний номер</th>
                                <th class="px-4 py-3">Показувати телефонний номер</th>
                                <th class="px-4 py-3">Створений</th>
                                <th class="px-4 py-3">Оновлений</th>
                                <th class="px-4 py-3">Очистити дані авторизації</th>
                                <th class="px-4 py-3">Видалити користувача</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($users as $user)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-black">{{ $user->name }}</p>
                                                <p class="text-xs text-gray-600">Користувач</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-ms italic border">
                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                    </td>
                                    <td class="px-4 py-3 text-ms border">
                                        @lang("app.yes_no.$user->show_email")
                                    </td>
                                    <td class="px-4 py-3 text-ms italic border">
                                        <a href="tel:{{ $user->phone_number }}">{{ $user->phone_number }}</a>
                                    </td>
                                    <td class="px-4 py-3 text-ms border">
                                        @lang("app.yes_no.$user->show_phone_number")
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        {!! $user->created_at->toDateTimeString().'<br>'.$user->created_at->diffForHumans() !!}
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        @if($user->created_at !== $user->updated_at)
                                            {!! $user->updated_at->toDateTimeString().'<br>'.$user->updated_at->diffForHumans() !!}
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        <form method="POST" action="{{ route('admin.users.clear-authorisation', ['user' => $user]) }}">
                                            @csrf
                                            <button class="flex items-center px-2 py-2 font-medium tracking-wide
                                                text-black transition-colors duration-200 transform bg-blue-200 rounded-md hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-100 focus:ring-opacity-80">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                </svg>
                                                <span class="mx-1">Очистити</span>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        <form method="POST" action="{{ route('admin.users.destroy', ['user' => $user]) }}">
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
            <div class="mb-6">
                {{ $users->links() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush