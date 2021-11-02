@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/styles/normalize.css') }}">
@endsection

@section('content')
    <section class="text-gray-200 body-font overflow-hidden bg-gradient-to-tr from-gray-800 via-gray-700 to-red-900">
        @include('layouts.header')
        <div class="container px-5 py-10 mx-auto">

            @if(!request()->car_model_id && !request()->car_brand_id)
                @auth
                    <div class="mb-6">
                        @if(request()->own)
                            <a href="{{ route('reviews.index') }}" class="p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-lg rounded-lg
                            focus:border-4 border-blue-600">@lang('app.review.show_all')</a>
                        @else
                            <a href="{{ route('reviews.index', ['own' => true]) }}" class="p-2 pl-5 pr-5 bg-blue-500 border-2
                            border-blue-500 text-white-500 text-lg rounded-lg hover:bg-blue-600 hover:text-gray-100 focus:border-4 focus:border-blue-300">@lang('app.review.filter_own')</a>
                        @endif
                    </div>
                @endauth
            @endif

            <br>

            <a href="{{ route('reviews.create') }}" class="mr-auto mr-12 p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-lg rounded-lg
                   hover:bg-blue-600 hover:text-gray-100 focus:border-4 focus:border-blue-300">Написати власний відгук</a>

            @if(!request()->own)
                <div class="mt-10 mb-20">
                    <p class="mb-2">Або відфільтрувати відгуи за конкретним авто</p>
                    <form method="GET" action="{{ route('reviews.index') }}">
                        <div class="flex flex-wrap">
                            <div class="w-4/5">
                                @livewire('car-brands-models-select-filter')
                            </div>
                            <div class="sm:w-1/5 m:w-full w-full mt-7">
                                @if(request()->car_model_id || request()->car_brand_id)
                                    <div class="flex space-x-4 sm:ml-8">
                                        <div class="w-1/2">
                                            <div class="mt-2">
                                                <a href="{{ route('reviews.index') }}" class="text-white bg-gray-800 border-0 py-2 px-6
                                                    focus:outline-none hover:bg-gray-900 rounded">Очистити</a>
                                            </div>
                                        </div>
                                        <div class="w-1/2">
                                            <button class="text-white bg-indigo-500 border-0 py-2 px-6
                                                focus:outline-none hover:bg-indigo-600 rounded">Уперед</button>
                                        </div>
                                    </div>
                                @else
                                    <button class="text-white bg-indigo-500 border-0 py-2 px-6 ml-10
                                        focus:outline-none hover:bg-indigo-600 rounded">Уперед</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            @endif

            @if(request()->car_model_id)
                @include('pages.reviews.car_model')
            @endif

            @inject('ratingService', 'App\Services\RatingService')
            @forelse($reviews as $review)
                <div class="p-12 mb-8 mt-8 flex flex-col items-start border-2 border-white">
                    <div class="w-full flex justify-between">
                        <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-lg font-medium tracking-widest">{{ $review->carModel->carBrand->name.' '.$review->carModel->name }}</span>
                        @if(auth()->user() && auth()->user()->hasRole(\App\Models\Role::ROLE_ADMIN))
                                <form method="POST" action="{{ route('admin.reviews.destroy', ['review' => $review]) }}">
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
                        @endif
                    </div>
                    <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-300 mt-4 mb-4">
                        {{ $review->title }}
                    </h2>
                    <div class="flex flex-wrap lg:w-4/5 sm:mx-left sm:mb-2 -mx-2 text-green-900">
                        @if($review->fuel_type)
                            <div class="p-2 sm:w-1/2 w-full">
                                <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                    <span class="title-font font-medium">@lang('app.review.fuel_type')@lang("app.review.fuel_types_list.$review->fuel_type")</span>
                                </div>
                            </div>
                        @endif
                        @if($review->engine)
                            <div class="p-2 sm:w-1/2 w-full">
                                <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                    <span class="title-font font-medium">@lang('app.review.engine'){{ $review->engine }}</span>
                                </div>
                            </div>
                        @endif
                        @if($review->power)
                            <div class="p-2 sm:w-1/2 w-full">
                                <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                    <span class="title-font font-medium">@lang('app.review.power'){{ $review->power }}</span>
                                </div>
                            </div>
                        @endif
                        @if($review->consumption_city)
                            <div class="p-2 sm:w-1/2 w-full">
                                <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                    <span class="title-font font-medium">@lang('app.review.consumption_city'){{ $review->consumption_city }}</span>
                                </div>
                            </div>
                        @endif
                        @if($review->consumption_highway)
                            <div class="p-2 sm:w-1/2 w-full">
                                <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                    <span class="title-font font-medium">@lang('app.review.consumption_highway'){{ $review->consumption_highway }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($review->content)
                        <p class="leading-relaxed mb-8">
                            {{ $review->content }}
                        </p>
                    @endif
                    @if(count( []))
                        <div class="flex flex-wrap -m-4">
                            @foreach($review->gallery as $image)
                                <div class="xl:w-1/{{ count($review->gallery) }} p-4">
                                    <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{ $image }}" alt="content">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-red-500 mt-auto w-full" style="justify-content: space-between">
                        <span>
                            @lang('app.review.created') {{ $review->created_at->diffForHumans() }}
                        </span>
                        <div style="display:flex; justify-content: center; flex-direction: row" >
                            @guest
                                <span style="margin-right: 10px; margin-top: 4px">
                                    Увійдіть або зареєструйтеся, щоб оцінити відгук
                                </span>
                            @endguest

                            @livewire('review-likable', ['review' => $review])
                        </div>
                    </div>
                    <div class="flex items-center flex-wrap pb-4 mb-4 mt-auto w-full">
                        @if($review->user)
                            <span class="inline-flex items-center">
                                <img alt="blog" src="{{ asset('images/user-mini.png') }}"
                                     class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                                <span class="flex-grow flex flex-col pl-4">
                                    <span class="title-font font-medium text-gray-200">{{ $review->user->name }}</span>
                                    @if($review->user->show_email)
                                        <span class="text-gray-400 text-xs tracking-widest mt-0.5">
                                            <a href="mailto:{{ $review->user->email }}">{{ $review->user->email }}</a>
                                        </span>
                                    @endif
                                    @if($review->user->phone_number && $review->user->show_phone_number)
                                        <span class="text-gray-400 text-xs tracking-widest mt-0.5">
                                            <a href="tel:{{ $review->user->phone_number }}">{{ $review->user->phone_number }}</a>
                                        </span>
                                    @endif
                                </span>
                            </span>
                        @else
                            <span>@lang('app.review.anonymous_review')</span>
                        @endif
                        <span class="text-gray-400 mr-1 inline-flex items-center ml-auto leading-none text-sm pr-3 py-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>{{ $ratingService->getRating($review) }}
                        </span>
                    </div>
                </div>
            @empty
                <h1>Нажаль, не знайдено відгуків за вказаними критеріями</h1>
            @endforelse
            <div class="bg-gray-300 my-5">
                {{ $reviews->appends(request()->input())->links() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
