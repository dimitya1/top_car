<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<style>
    [x-cloak] { display: none; }
    .full_image {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>

@inject('carModelService', 'App\Services\CarModelService')
@php
    $carModel = $carModelService->findById(request()->car_model_id);
    $fullName = $carModel->carBrand->name.' '.$carModel->name;
@endphp

@if($reviews->currentPage() == 1)
    <p class="text-3xl">{{ $fullName }}</p>
    @if($carModel->produced_from && $carModel->produced_to)
        <p class="text-2xl">Автомобіль випускався від {{ $carModel->produced_from }} до {{ $carModel->produced_to }} року</p>
    @elseif($carModel->produced_from)
        <p class="text-2xl">Автомобіль випускається від {{ $carModel->produced_from }} року</p>
    @elseif($carModel->produced_to)
        <p class="text-2xl">Автомобіль випускався до {{ $carModel->produced_to }} року</p>
    @endif

    @if(is_array($carModel->gallery) && count($carModel->gallery))
        @switch(count($carModel->gallery))
            @case(1)
                <div class="w-full rounded hover:shadow-2xl space-y-2">
                    <img src="{{ $carModel->gallery[0] }}" class="full_image" alt="{{ $fullName }}">
                </div>
                @break
            @case(2)
                <div class="container mx-auto space-y-2 lg:space-y-0 lg:gap-8 lg:grid lg:grid-cols-2">
                    <div class="w-full rounded hover:shadow-2xl">
                        <img src="{{ $carModel->gallery[0] }}" class="full_image" alt="{{ $fullName }}">
                    </div>
                    <div class="w-full rounded hover:shadow-2xl">
                        <img src="{{ $carModel->gallery[1] }}"  class="full_image" alt="{{ $fullName }}">
                    </div>
                </div>
                @break
            @case(3)
                <div class="container mx-auto space-y-2 lg:space-y-0 lg:gap-8 lg:grid lg:grid-cols-3">
                    <div class="w-full rounded hover:shadow-2xl">
                        <img src="{{ $carModel->gallery[0] }}" class="full_image" alt="{{ $fullName }}">
                    </div>
                    <div class="w-full rounded hover:shadow-2xl">
                        <img src="{{ $carModel->gallery[1] }}"  class="full_image" alt="{{ $fullName }}">
                    </div>
                    <div class="w-full rounded hover:shadow-2xl">
                        <img src="{{ $carModel->gallery[2] }}"  class="full_image" alt="{{ $fullName }}">
                    </div>
                </div>
                @break
            @case(4)
                <div class="container mx-auto space-y-2 lg:space-y-0 lg:gap-8 lg:grid lg:grid-cols-2">
                    <div class="w-full rounded hover:shadow-2xl">
                        <img src="{{ $carModel->gallery[0] }}" class="full_image" alt="{{ $fullName }}">
                    </div>
                    <div class="w-full rounded hover:shadow-2xl">
                        <img src="{{ $carModel->gallery[1] }}"  class="full_image" alt="{{ $fullName }}">
                    </div>
                </div>
                <div class="container mt-8 mx-auto space-y-2 lg:space-y-0 lg:gap-8 lg:grid lg:grid-cols-2">
                    <div class="w-full rounded hover:shadow-2xl">
                        <img src="{{ $carModel->gallery[2] }}" class="full_image" alt="{{ $fullName }}">
                    </div>
                    <div class="w-full rounded hover:shadow-2xl">
                        <img src="{{ $carModel->gallery[3] }}"  class="full_image" alt="{{ $fullName }}">
                    </div>
                </div>
                @break
            @case(5)
                <div class="container mx-auto">
                    <div class="grid-cols-3 p-10 space-y-2 lg:space-y-0 lg:grid lg:gap-3 lg:grid-rows-2">
                        <div class="w-full rounded">
                            <img src="{{ $carModel->gallery[1] }}"  class="full_image" alt="{{ $fullName }}">
                        </div>
                        <div class="w-full col-span-2 row-span-2 rounded">
                            <img src="{{ $carModel->gallery[0] }}"  class="full_image" alt="{{ $fullName }}">
                        </div>
                        <div class="w-full rounded">
                            <img src="{{ $carModel->gallery[2] }}"  class="full_image" alt="{{ $fullName }}">
                        </div>
                    </div>
                </div>
                <div class="container px-10 mx-auto space-y-2 lg:space-y-0 lg:gap-8 lg:grid lg:grid-cols-2">
                    <div class="w-full rounded hover:shadow-2xl">
                        <img src="{{ $carModel->gallery[3] }}" class="full_image" alt="{{ $fullName }}">
                    </div>
                    <div class="w-full rounded hover:shadow-2xl">
                        <img src="{{ $carModel->gallery[4] }}"  class="full_image" alt="{{ $fullName }}">
                    </div>
                </div>
                @break
            @case(6)
                <div class="container mx-auto">
                    <div class="grid-cols-3 p-10 space-y-2 lg:space-y-0 lg:grid lg:gap-3 lg:grid-rows-3">
                        <div class="w-full rounded">
                            <img src="{{ $carModel->gallery[1] }}"  class="full_image" alt="{{ $fullName }}">
                        </div>
                        <div class="w-full col-span-2 row-span-2 rounded">
                            <img src="{{ $carModel->gallery[0] }}"  class="full_image" alt="{{ $fullName }}">
                        </div>
                        <div class="w-full rounded">
                            <img src="{{ $carModel->gallery[2] }}"  class="full_image" alt="{{ $fullName }}">
                        </div>
                        <div class="w-full rounded">
                            <img src="{{ $carModel->gallery[3] }}"  class="full_image" alt="{{ $fullName }}">
                        </div>
                        <div class="w-full rounded">
                            <img src="{{ $carModel->gallery[4] }}"  class="full_image" alt="{{ $fullName }}">
                        </div>
                        <div class="w-full rounded">
                            <img src="{{ $carModel->gallery[5] }}"  class="full_image" alt="{{ $fullName }}">
                        </div>
                    </div>
                </div>
                @break
        @endswitch
    @endif
@else
    <div x-data={show:false}>
        <button @click="show=!show" class="px-4 py-3 bg-blue-600 rounded-md text-white outline-none focus:ring-4 shadow-lg
            transform active:scale-x-75 transition-transform mx-5 flex" type="button">
            <span class="mr-2">Показати/приховати галерею</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </button>

        <div class="mt-2" x-show="show" x-cloak>
            @if($carModel->produced_from && $carModel->produced_to)
                <p class="text-2xl">Автомобіль випускався від {{ $carModel->produced_from }} до {{ $carModel->produced_to }} року</p>
            @elseif($carModel->produced_from)
                <p class="text-2xl">Автомобіль випускається від {{ $carModel->produced_from }} року</p>
            @elseif($carModel->produced_to)
                <p class="text-2xl">Автомобіль випускався до {{ $carModel->produced_to }} року</p>
            @endif

            @if(is_array($carModel->gallery) && count($carModel->gallery))
                @switch(count($carModel->gallery))
                    @case(1)
                        <div class="w-full rounded hover:shadow-2xl space-y-2">
                            <img src="{{ $carModel->gallery[0] }}" class="full_image" alt="{{ $fullName }}">
                        </div>
                        @break
                    @case(2)
                        <div class="container mx-auto space-y-2 lg:space-y-0 lg:gap-8 lg:grid lg:grid-cols-2">
                            <div class="w-full rounded hover:shadow-2xl">
                                <img src="{{ $carModel->gallery[0] }}" class="full_image" alt="{{ $fullName }}">
                            </div>
                            <div class="w-full rounded hover:shadow-2xl">
                                <img src="{{ $carModel->gallery[1] }}"  class="full_image" alt="{{ $fullName }}">
                            </div>
                        </div>
                        @break
                    @case(3)
                        <div class="container mx-auto space-y-2 lg:space-y-0 lg:gap-8 lg:grid lg:grid-cols-3">
                            <div class="w-full rounded hover:shadow-2xl">
                                <img src="{{ $carModel->gallery[0] }}" class="full_image" alt="{{ $fullName }}">
                            </div>
                            <div class="w-full rounded hover:shadow-2xl">
                                <img src="{{ $carModel->gallery[1] }}"  class="full_image" alt="{{ $fullName }}">
                            </div>
                            <div class="w-full rounded hover:shadow-2xl">
                                <img src="{{ $carModel->gallery[2] }}"  class="full_image" alt="{{ $fullName }}">
                            </div>
                        </div>
                        @break
                    @case(4)
                        <div class="container mx-auto space-y-2 lg:space-y-0 lg:gap-8 lg:grid lg:grid-cols-2">
                            <div class="w-full rounded hover:shadow-2xl">
                                <img src="{{ $carModel->gallery[0] }}" class="full_image" alt="{{ $fullName }}">
                            </div>
                            <div class="w-full rounded hover:shadow-2xl">
                                <img src="{{ $carModel->gallery[1] }}"  class="full_image" alt="{{ $fullName }}">
                            </div>
                        </div>
                        <div class="container mt-8 mx-auto space-y-2 lg:space-y-0 lg:gap-8 lg:grid lg:grid-cols-2">
                            <div class="w-full rounded hover:shadow-2xl">
                                <img src="{{ $carModel->gallery[2] }}" class="full_image" alt="{{ $fullName }}">
                            </div>
                            <div class="w-full rounded hover:shadow-2xl">
                                <img src="{{ $carModel->gallery[3] }}"  class="full_image" alt="{{ $fullName }}">
                            </div>
                        </div>
                        @break
                    @case(5)
                        <div class="container mx-auto">
                            <div class="grid-cols-3 p-10 space-y-2 lg:space-y-0 lg:grid lg:gap-3 lg:grid-rows-2">
                                <div class="w-full rounded">
                                    <img src="{{ $carModel->gallery[1] }}"  class="full_image" alt="{{ $fullName }}">
                                </div>
                                <div class="w-full col-span-2 row-span-2 rounded">
                                    <img src="{{ $carModel->gallery[0] }}"  class="full_image" alt="{{ $fullName }}">
                                </div>
                                <div class="w-full rounded">
                                    <img src="{{ $carModel->gallery[2] }}"  class="full_image" alt="{{ $fullName }}">
                                </div>
                            </div>
                        </div>
                        <div class="container px-10 mx-auto space-y-2 lg:space-y-0 lg:gap-8 lg:grid lg:grid-cols-2">
                            <div class="w-full rounded hover:shadow-2xl">
                                <img src="{{ $carModel->gallery[3] }}" class="full_image" alt="{{ $fullName }}">
                            </div>
                            <div class="w-full rounded hover:shadow-2xl">
                                <img src="{{ $carModel->gallery[4] }}"  class="full_image" alt="{{ $fullName }}">
                            </div>
                        </div>
                        @break
                    @case(6)
                        <div class="container mx-auto">
                            <div class="grid-cols-3 p-10 space-y-2 lg:space-y-0 lg:grid lg:gap-3 lg:grid-rows-3">
                                <div class="w-full rounded">
                                    <img src="{{ $carModel->gallery[1] }}"  class="full_image" alt="{{ $fullName }}">
                                </div>
                                <div class="w-full col-span-2 row-span-2 rounded">
                                    <img src="{{ $carModel->gallery[0] }}"  class="full_image" alt="{{ $fullName }}">
                                </div>
                                <div class="w-full rounded">
                                    <img src="{{ $carModel->gallery[2] }}"  class="full_image" alt="{{ $fullName }}">
                                </div>
                                <div class="w-full rounded">
                                    <img src="{{ $carModel->gallery[3] }}"  class="full_image" alt="{{ $fullName }}">
                                </div>
                                <div class="w-full rounded">
                                    <img src="{{ $carModel->gallery[4] }}"  class="full_image" alt="{{ $fullName }}">
                                </div>
                                <div class="w-full rounded">
                                    <img src="{{ $carModel->gallery[5] }}"  class="full_image" alt="{{ $fullName }}">
                                </div>
                            </div>
                        </div>
                        @break
                @endswitch
            @endif
        </div>
    </div>
@endif
