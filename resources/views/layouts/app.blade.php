<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - CB Fundraising</title> {{-- {{ config('app.name', 'CB Fundraising') }} --}}

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script defer src="{{ asset('js/alphine.min.js') }}"></script>

        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/back/style.css') }}" rel="stylesheet">
        @stack('css')
    </head>
    <body class="font-sans antialiased bg-light">
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div id="container-toasts" class="toast-container position-absolute top-0 end-0 p-3" style="z-index: 40000">
              
            </div>
        </div>
        
        {{--
        @livewire('App\Http\Livewire\Navegacion\NavigationMenu')
        @livewire('App\Http\Livewire\Navegacion\SidebarMenu')
         --}}
        <livewire:navegacion.navigation-menu>
        
        
        <livewire:navegacion.sidebar-menu>
        
        
        
        <!-- Page Content -->
        {{-- @yield('content') --}}
        {{ $slot }}

        @include('livewire.footer-dash')

        @stack('modals')

        @livewireScripts

        @stack('scripts')

        <!-- Vendor JS Files -->

        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>

        <!-- Template Main JS File -->
        
        <script src="{{ asset('assets/js/back/main.js') }}"></script>
        @stack('js')
  
    </body>
</html>
