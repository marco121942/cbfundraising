@push('css')

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/front/style.css') }}" rel="stylesheet">

@endpush

@section('title', 'Forgot your password?')

<x-guest-layout>

    <section class="section">
        @if (session()->has('message'))
            <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-5" role="alert" style="z-index: 2000">
              <strong>{{ session('message') }}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            {{ session()->forget('message') }}
        @endif

            <div class="mb-3 col-12 col-md-8 mx-md-auto text-center">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-3" />

            <form method="POST" action="/forgot-password">
                @csrf
                <div class="row">

                    <div class="mb-3 form-group col-12 col-md-6 mx-md-auto">
                        <x-jet-label value="Email" />
                        <x-jet-input type="email" name="email" :value="old('email')" required autofocus />
                        <x-jet-input-error for="email"></x-jet-input-error>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <x-jet-button class="boton">
                            {{ __('Email Password Reset Link') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
            
    </section>
</x-guest-layout>