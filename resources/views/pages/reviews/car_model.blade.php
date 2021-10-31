@inject('carModelService', 'App\Services\CarModelService')
@php
    $carModel = $carModelService->findById(request()->car_model_id)
@endphp
<h1>{{ $carModel->carBrand->name.' '.$carModel->name }}</h1>
@if(is_array($carModel->gallery) && count($carModel->gallery))
@switch(count($carModel->gallery))
    @case(1)
    1
    @break
    @case(2)
    <div class="container mx-auto space-y-2 lg:space-y-0 lg:gap-8 lg:grid lg:grid-cols-2">
        <div class="w-full rounded hover:shadow-2xl">
            <img src="{{ $carModel->gallery[0] }}"
                 alt="image" style="object-fit: cover; width: 100%; height: 100%">
        </div>
        <div class="w-full rounded hover:opacity-95">
            <img src="{{ $carModel->gallery[3] }}"
                 alt="image">
        </div>
    </div>
    @break
    @case(3)
    3
    @break
    @case(4)
    4
    @break
    @case(5)
    5
    @break
    @case(6)
    6
    @break
@endswitch
@endif