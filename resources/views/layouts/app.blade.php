<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- trix --}}
        <link rel="stylesheet" type="text/css" href="trix.css">
        <style>
            trix-toolbar [data-trix-button-group="file-tools"]{
                display: none;
            }
        </style>
       

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script type="text/javascript" src="trix.js"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <script>
            function previewImage(){
              const image = document.querySelector('#image');
              const imgPreview = document.querySelector('.img-preview');
          
              imgPreview.style.display = 'block';
          
              const oFReader = new FileReader();
              oFReader.readAsDataURL(image.files[0]);
          
              oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
              }
            }
          </script>
    </body>
</html>
