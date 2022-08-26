
@extends('layouts.frontend.app')

@push('css')
  
    @livewireStyles
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/front/style.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

@endpush

@section('content')
    {{ $slot }}
@stop

@push('js')
  <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Template Main JS File -->
  
  @stack('modals')

  @livewireScripts

@endpush