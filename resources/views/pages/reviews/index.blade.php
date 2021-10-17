@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/styles/normalize.css') }}">
@endsection

@section('content')
    <section class="text-gray-200 body-font overflow-hidden bg-gradient-to-tr from-gray-800 via-gray-700 to-red-900">
        @include('layouts.header')
        <div class="container px-5 py-10 mx-auto">
            @auth
                @if(request()->own)
                    <a href="{{ route('reviews.index') }}" class="ml-12 p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-lg rounded-lg
                    focus:border-4 border-blue-300">@lang('app.review.show_all')</a>
                @else
                    <a href="{{ route('reviews.index', ['own' => true]) }}" class="ml-12 p-2 pl-5 pr-5 bg-transparent border-2
                    border-blue-500 text-blue-500 text-lg rounded-lg hover:bg-blue-500 hover:text-gray-100 focus:border-4 focus:border-blue-300">@lang('app.review.filter_own')</a>
                @endif
            @endauth
                <a href="{{ route('reviews.create') }}" class="mr-auto mr-12 p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-lg rounded-lg
                    focus:border-4 border-blue-300">Написати власний відгук</a>
            @inject('ratingService', 'App\Services\RatingService')
            @foreach($reviews as $review)
                <div class="p-12 mb-8 mt-8 flex flex-col items-start border-2 border-white">
                    <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-lg font-medium tracking-widest">{{ $review->carModel->carBrand->name.' '.$review->carModel->name }}</span>
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
                    @if(count($review->gallery ?? []))
                        <div class="flex flex-wrap -m-4">
                            @foreach($review->gallery as $image)
                                <div class="xl:w-1/{{ count($review->gallery) }} p-4">
                                    <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{ $image }}" alt="content">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-red-500 mt-auto w-full">
                        <span>
                            @lang('app.review.created') {{ $review->created_at->diffForHumans() }}
                        </span>
                        @guest
                            <span class="ml-24">
                                Увійдіть або зареєструйтеся, щоб оцінити відгук
                            </span>
                        @endguest

                        @livewire('review-likable', ['review' => $review])

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
            @endforeach
            <div class="bg-gray-300 my-5">
                {{ $reviews->appends(request()->input())->links() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
