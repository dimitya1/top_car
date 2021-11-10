@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/styles/normalize.css') }}">
@endsection

@section('content')
    <section class="text-white body-font overflow-hidden bg-gradient-to-r from-green-600 via-blue-500 to-indigo-700">
        @include('layouts.header')
        <div class="container px-5 py-10 mx-auto">
            <form method="POST" action="{{ route('admin.administrators.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-white">Ім'я</label>
                    <input name="name" required class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="text">

                    <label class="block mb-2 text-sm font-medium text-white">Email</label>
                    <input name="email" required class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="email">

                    <label class="block mb-2 text-sm font-medium text-white">Номер телефону</label>
                    <input name="phone_number" required class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="tel">

                    <label class="block mb-2 text-sm font-medium text-white">Пароль</label>
                    <input name="password" required class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="password">

                    <label class="block mb-2 text-sm font-medium text-white">Аватар</label>
                    <div class="border-dotted h-28 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                        <div class="absolute">
                            <div class="flex flex-col items-center">
                                <i class="fa fa-folder-open fa-4x text-blue-700"></i>
                                <span class="block text-gray-400 font-normal" id="avatar_text">Натисніть, щоб обрати файл</span>
                            </div>
                        </div>
                        <input type="file" class="h-full w-full opacity-0" id="avatar" name="avatar" accept=".png, .jpg, .jpeg, .webp, .wbmp, .gif">
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
        $(document).on('change','#avatar' , function() {
            let value = $(this).val();
            if(value) {
                $('#avatar_text').html(value.split('\\').pop());
            } else {
                $('#avatar_text').html('Натисніть, щоб обрати файл');
            }
        })
    </script>
@endpush
