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
                            <th class="px-4 py-3">type</th>
                            <th class="px-4 py-3">action</th>
                            <th class="px-4 py-3">causer</th>
                            <th class="px-4 py-3">properties</th>
                            <th class="px-4 py-3">subject</th>
                            <th class="px-4 py-3">date</th>
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
                                        {{ $row['causer'] }}
                                    </td>
                                    <td class="px-4 py-3 text-ms border">
                                        @include('pages.activity_log.changes_popover')
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
            let popper = Popper.createPopper(
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
