<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="loading dark-layout" data-layout="dark-layout" data-textdirection="ltr">
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
        
        {{--
        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
        --}}
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/charts/apexcharts.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/extensions/toastr.min.css') }}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/components.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/themes/dark-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/themes/bordered-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/themes/semi-dark-layout.css') }}">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/pages/app-chat.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/pages/app-chat-list.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/pages/dashboard-ecommerce.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/plugins/charts/chart-apex.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/style.css') }}">
        <!-- END: Custom CSS-->

        <!-- Template Main CSS File -->
        <!-- <link href="{{ asset('assets/css/back/style.css') }}" rel="stylesheet"> -->
        @stack('css')
    </head>
    <body  class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div id="container-toasts" class="toast-container position-fixed top-0 end-0 p-3 mt-2" style="z-index: 40000">
              
            </div>
        </div>
        
        {{--
        @livewire('App\Http\Livewire\Navegacion\NavigationMenu')
        @livewire('App\Http\Livewire\Navegacion\SidebarMenu')
        --}}
        <livewire:navegacion.sidebar-menu>
        <livewire:navegacion.navigation-menu>
        
        
        <!-- Page Content -->
        {{-- @yield('content') --}}
        <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
        
        @include('livewire.footer-dash')

        <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
        <!-- END: Footer-->

        @stack('modals')

        @livewireScripts

        @stack('scripts')


        <!-- Vendor JS Files -->
        
{{--
    
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>    
        <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
--}}
        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
        <!-- Template Main JS File -->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- <script src="{{ asset('assets/app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script> -->
    <!-- END: Page JS-->
    
        <script src="{{ asset('assets/js/back/main.js') }}"></script>
        @stack('js')
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
  
    </body>
</html>
