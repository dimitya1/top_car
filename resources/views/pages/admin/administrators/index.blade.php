@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/styles/normalize.css') }}">
@endsection

@section('content')
    <section class="text-white body-font overflow-hidden bg-gradient-to-r from-green-600 via-blue-500 to-indigo-700">
        @include('layouts.header')
        <div class="px-10">
            <div class="mb-10 overflow-hidden rounded-lg shadow-lg">
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
                                <th class="px-4 py-3">Редагувати адміна</th>
                                <th class="px-4 py-3">Видалити адміна</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($administrators as $admin)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-black">Sufyan</p>
                                                <p class="text-xs text-gray-600">Developer</p>
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
