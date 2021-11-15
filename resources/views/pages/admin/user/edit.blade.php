@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/styles/normalize.css') }}">
@endsection

@section('content')
    <section class="text-white body-font overflow-hidden bg-gradient-to-r from-green-600 via-blue-500 to-indigo-700">
        @include('layouts.header')
        <div class="container px-5 py-10 mx-auto">
            <form method="POST" action="{{ route('admin.users.update', ['user' => $user]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-white">Ім'я</label>
                    <input name="name" required value="{{ $user->name }}" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="text">

                    <label class="block mb-2 text-sm font-medium text-white">Email</label>
                    <input name="email" required value="{{ $user->email }}" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="email">

                    <label class="block mb-2 text-sm font-medium text-white">Номер телефону</label>
                    <input name="phone_number" required value="{{ $user->phone_number }}" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="tel">

                    <label class="block mb-2 text-sm font-medium text-white">Встановіть новий пароль за потребою</label>
                    <input name="new_password" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="password">

                    @php
                        $hasAccessToAPI = $user->can(\App\Models\Permission::PERMISSION_ACCESS_FOR_DEVELOPERS);
                    @endphp
                    <label class="inline-flex items-center font-medium mt-2 mb-2">
                        <input type="checkbox" class="form-checkbox" name="permission_access_api" @if($hasAccessToAPI) checked @endif/>
                        <span class="ml-2">Має доступ до API</span>
                    </label>

                    <label class="block mb-2 text-sm font-medium text-white">Аватар</label>
                    <div class="grid grid-cols-3">
                        @if($user->avatar)
                            <div class="col-span-1 relative w-28 h-28 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full"
                                     src="{{ url("storage/$user->avatar") }}" alt="{{ $user->name }}" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                        @endif
                        <div class="@if($user->avatar) col-span-2 sm:col-span-1 @else col-span-3 @endif border-dotted h-28 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                            <div class="absolute">
                                <div class="flex flex-col items-center">
                                    <i class="fa fa-folder-open fa-4x text-blue-700"></i>
                                    <span class="block text-gray-400 font-normal" id="new_avatar_text">@if($user->avatar) Завантажте новий аватар, якщо необхідно @else Натисніть, щоб обрати файл @endif</span>
                                </div>
                            </div>
                            <input type="file" class="h-full w-full opacity-0" id="new_avatar" name="new_avatar" accept=".png, .jpg, .jpeg, .webp, .wbmp, .gif">
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-6">
                    <button type="submit" class="px-4 py-2 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Зберегти на сайті</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).on('change','#new_avatar' , function() {
            let value = $(this).val();
            if(value) {
                $('#new_avatar_text').html(value.split('\\').pop());
            } else {
                $('#new_avatar_text').html(@if($user->avatar) "Завантажте новий аватар, якщо необхідно" @else "Натисніть, щоб обрати файл" @endif);
            }
        })
    </script>
@endpush
