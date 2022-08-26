@push('css')

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/front/style.css') }}" rel="stylesheet">

@endpush

@section('title', 'Reset password')
<x-guest-layout>
        @if (session()->has('message'))
            <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-5" role="alert" style="z-index: 2000">
              <strong>{{ session('message') }}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            {{ session()->forget('message') }}
        @endif
        
        <section class="section">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-3" />

            <form method="POST" action="/reset-password">
                @csrf
                <div class="container">
                    <div class="row">
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="mb-3 form-group col-12 col-md-4 mx-md-auto">
                            <x-jet-label value="{{ __('Email') }}" />

                            <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }} form-control-plaintext text-center" type="text" name="email" :value="old('email', $request->email)" readonly />
                            <x-jet-input-error for="email"></x-jet-input-error>
                        </div>

                        <div class="mb-3 form-group col-12 col-md-4 mx-md-auto">
                            <x-jet-label value="{{ __('Password') }}" />

                            <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                         name="password" required autocomplete="new-password" />
                            <x-jet-input-error for="password"></x-jet-input-error>
                        </div>

                        <div class="mb-3 form-group col-12 col-md-4 mx-md-auto">
                            <x-jet-label value="{{ __('Confirm Password') }}" />

                            <x-jet-input class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password"
                                         name="password_confirmation" required autocomplete="new-password" />
                            <x-jet-input-error for="password_confirmation"></x-jet-input-error>
                        </div>

                        <div class="mb-0">
                            <div class="d-flex justify-content-center">
                                <x-jet-button class="boton">
                                    {{ __('Reset Password') }}
                                </x-jet-button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </section>

</x-guest-layout>