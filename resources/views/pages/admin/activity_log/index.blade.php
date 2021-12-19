@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/styles/normalize.css') }}">
@endsection

@section('content')
    <section class="text-gray-900 body-font overflow-hidden bg-gradient-to-r from-green-600 via-blue-500 to-indigo-700">
        @include('layouts.header')
        <div class="px-10">
            <div class="mt-5 mb-10 overflow-hidden rounded-lg shadow-lg">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">@lang('app.admin.activity_log.section')</th>
                            <th class="px-4 py-3">@lang('app.admin.activity_log.action')</th>
                            <th class="px-4 py-3">@lang('app.admin.activity_log.causer')</th>
                            <th class="px-4 py-3">@lang('app.admin.activity_log.properties')</th>
                            <th class="px-4 py-3">@lang('app.admin.activity_log.subject')</th>
                            <th class="px-4 py-3">@lang('app.admin.activity_log.date')</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($table as $row)
                                <tr class="bg-{{ $row['backgroundColor'] }}-200">
                                    <td class="px-4 py-3 text-ms border">
                                        <span class="inline-flex items-center justify-center px-2 py-2 text-sm font-bold
                                            leading-none text-white bg-{{ $row['badgeColor'] }}-800 rounded">{{ $row['type'] }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-ms border">
                                        {{ $row['action'] }}
                                    </td>
                                    <td class="px-4 py-3 text-ms border">
                                        @if($row['causer'])
                                            @php
                                                $causer = $row['causer']
                                            @endphp
                                            <div class="flex items-center text-sm">
                                                <div class="relative w-12 h-12 mr-3 rounded-full md:block">
                                                    @if($causer->avatar)
                                                        <img class="object-cover w-full h-full rounded-full"
                                                             src="{{ url("storage/$causer->avatar") }}" alt="{{ $causer->name }}" loading="lazy" />
                                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    @endif
                                                </div>

                                                <div>
                                                    <p class="font-semibold text-black">{{ $causer->name }}</p>
                                                    <p class="text-xs text-gray-600">
                                                        @if($row['causer_type'] === \App\Services\ActivityLogService::CAUSER_ADMIN)
                                                            @lang('app.admin.administrator.title')
                                                        @elseif($row['causer_type'] === \App\Services\ActivityLogService::CAUSER_USER)
                                                            @lang('app.admin.user.title')
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        @else
                                            @lang('app.admin.activity_log.created_non_auth')
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-ms border">
                                        @include('pages.admin.activity_log.changes_popover')
                                    </td>
                                    <td class="px-4 py-3 text-ms border">
                                        {{ $row['subject'] }}
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        {!! $row['date']->toDateTimeString().'<br>'.$row['date']->diffForHumans() !!}
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
    <!-- Required popper.js -->
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
    <script>
        function openPopover(event, popoverID) {
            let allPopovers = document.getElementsByClassName('popover');
            for (let popover of allPopovers) {
                if (!popover.classList.contains('hidden') && popover !== document.getElementById(popoverID)) {
                    popover.classList.toggle('hidden');
                }
            }
            let element = event.target;
            while (element.nodeName !== "BUTTON") {
                element = element.parentNode;
            }
            Popper.createPopper(
                element,
                document.getElementById(popoverID),
                {
                    placement: "right",
                }
            );
            document.getElementById(popoverID).classList.toggle("hidden");
        }
    </script>
@endpush
