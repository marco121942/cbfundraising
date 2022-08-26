@push('css')

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/front/style.css') }}" rel="stylesheet">
  
@endpush

@section('title', 'Register')

<x-guest-layout>
    <x-jet-authentication-card>
        <section class="section">
            <div class="container me-md-auto text-center">
                @if (session()->has('message'))
                    <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-5" role="alert" style="z-index: 2000">
                      <strong>{{ session('message') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    {{ session()->forget('message') }}
                @endif

                <div class="me-md-auto text-center" >
                    <h1 class="titulo text-secondary" >Sign up free</h1>
                </div>
                  
                <div class="me-md-auto text-center">
                    <h6 class="info text-secondary">Enter your details and start fundraising in minutes</h6>
                    <p class="info text-secondary">Data with an asterisk (*) are required </p>
                </div>

              
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @if (session()->has('redirect_to'))
                            <input id="redirect_to" name="redirect_to" type="hidden" value="{{ session('redirect_to') }}">
                            {{-- session()->forget('redirect_to') --}}
                            {{-- session(['redirect_to' => URL::previous()]) --}}
                        @else
                            {{-- session(['redirect_to' => URL::previous()]) --}}
                            <input id="redirect_to" name="redirect_to" type="hidden" value="{{ URL::previous() }}">
                        @endif
                        <x-jet-validation-errors class="mb-3 rounded-0" />

                        @if (session()->has('status'))
                            <div class="alert alert-success mb-3 rounded-0" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                      <div class="row">
                          <div class="form-group col-md-3">
                                <x-jet-label class="titulo text-secondary" value="{{ __('*Name') }}" />

                                <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }} form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-jet-input-error for="name"></x-jet-input-error>
                              
                          </div>
                          

                          <div class="form-group col-md-3">
                                <x-jet-label class="titulo text-secondary" value="{{ __('*e-mail') }}" />

                                <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }} form-control" type="email" name="email" :value="old('email')" required />
                                
                                <x-jet-input-error for="email"></x-jet-input-error>
                              
                          </div>
                          
                        <div class="form-group col-md-3">
                            <x-jet-label class="titulo text-secondary" value="{{ __('*Password') }}" />

                            <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }} form-control" type="password" name="password" required autocomplete="new-password" />
                            <x-jet-input-error for="password"></x-jet-input-error>

                        </div>

                            <div class="form-group col-md-3 text-center">
                                <x-jet-label class="titulo text-secondary" for="rol" value="{{ __('*User') }}" />
                                <br>
                                <select class="{{ $errors->has('rol') ? 'is-invalid' : '' }} select form-control" name="rol" id="rol" required>
                                    <option value="org" selected>organizer</option>
                                    <option value="donate">User</option>
                                </select> 
                                <x-jet-input-error for="rol"></x-jet-input-error>
                            </div>

                       </div>

                       @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="my-3">
                                <div class="">
                                    <x-jet-checkbox id="terms" name="terms" />
                                    <label class="{{ $errors->has('terms') ? 'is-invalid' : '' }} titulo text-secondary" for="terms">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms').'">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('terms').'">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </label>
                                    <x-jet-input-error for="terms"></x-jet-input-error>
                                </div>
                            </div>
                        @endif


                      <div class="form-group col-md-11 my-md-1 text-center align-items-center" >
                          
                          <a class="text-muted me-3 text-decoration-none" href="{{ route('login') }}">{{ __('Already registered?') }}</a>

                          <input class="boton" type="submit" name="submit" value="Signup">

                      </div>

                    </form>
                  
                </div>
            
            </section>

 
        
    </x-jet-authentication-card>
</x-guest-layout>