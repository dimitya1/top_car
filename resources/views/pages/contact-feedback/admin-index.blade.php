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

                </div>
            </div>

            <div class="mt-5 mb-5 overflow-hidden rounded-lg shadow-lg">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">@lang('app.admin.feedback.created_by')</th>
                                <th class="px-4 py-3">@lang('app.admin.feedback.message')</th>
                                <th class="px-4 py-3">@lang('app.admin.feedback.creator_name')</th>
                                <th class="px-4 py-3">@lang('app.admin.feedback.creator_email')</th>
                                <th class="px-4 py-3">@lang('app.admin.feedback.creator_phone_number')</th>
                                <th class="px-4 py-3">@lang('app.admin.feedback.is_handled')</th>
                                <th class="px-4 py-3">@lang('app.created_at')</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($feedback as $item)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        @if($item->created_by)
                                            <div class="flex items-center text-sm">
                                                <div class="relative w-12 h-12 mr-3 rounded-full md:block">
                                                    @if($item->user->avatar)
                                                        <img class="object-cover w-full h-full rounded-full"
                                                             src="{{ url("storage/$item->user->avatar") }}" alt="{{ $item->user->name }}" loading="lazy" />
                                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-black">{{ $item->user->name }}</p>
                                                    <p class="text-xs text-gray-600">Користувач</p>
                                                </div>
                                            </div>
                                        @else
                                            @lang('app.admin.feedback.created_without_authorisation')
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-ms italic border">
                                        <p title="{{ $item->message }}">{{ \Illuminate\Support\Str::limit($item->message, 80) }}</p>
                                    </td>
                                    <td class="px-4 py-3 text-ms border">
                                        {{ $item->creator_name }}
                                    </td>
                                    <td class="px-4 py-3 text-ms italic border">
                                        @if($item->creator_email)
                                            <a href="mailto:{{ $item->creator_email }}">{{ $item->creator_email }}</a>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-ms italic border">
                                        @if($item->creator_phone_number)
                                            <a href="tel:{{ $item->creator_phone_number }}">{{ $item->creator_phone_number }}</a>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-ms border">
                                        @livewire('feedback-status-toggle', ['feedback' => $item])
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        {!! $item->created_at->toDateTimeString().'<br>'.$item->created_at->diffForHumans() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-6">
                {{ $feedback->links() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
