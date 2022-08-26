<x-jet-form-section submit="updateProfileInformation">
    
    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data class="row mb-3">
              <x-jet-label for="photo" class="col-md-4 col-lg-3 col-form-label" value="{{ __('Profile Image') }}" />
              <div class="col-md-8 col-lg-9">
                <div class="mt-2">
                    <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
                </div>
                
                <div class="pt-2">
                    <button class="btn btn-primary btn-sm" title="Upload new profile image" type="button" x-on:click.prevent="$refs.photo.click()">
                        <i class="bi bi-upload" x-on:click.prevent="$refs.photo.click()"></i>
                    </button>
                  <input type="file" hidden
                       wire:model="photo"
                       x-ref="photo"
                  />
                    @if ($this->user->profile_photo_path)
                        <a type="button" class="btn btn-danger btn-sm" wire:click="deleteProfilePhoto" title="Remove my profile image">
                            <i class="bi bi-trash"></i>
                        </a>
                    @endif
                </div>
              </div>
            </div>
        @endif

        <!-- Name -->
        <div class="row mb-3">
            <x-jet-label for="name" value="{{ __('Full Name*') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" />
            </div>
        </div>


        <!-- Email -->
        <div class="row mb-3">
            <x-jet-label for="email" value="{{ __('Email*') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.email" />
                <x-jet-input-error for="email" />
            </div>    
        </div>

        <!-- About -->
        <div class="row mb-3">
            <x-jet-label for="about" value="{{ __('About') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="about" type="text" class="{{ $errors->has('about') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.about" autocomplete="about" />
                <x-jet-input-error for="about" />
            </div>
        </div>
        
        <!-- company -->
        <div class="row mb-3">
            <x-jet-label for="company" value="{{ __('Company') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="company" type="text" class="{{ $errors->has('company') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.company" autocomplete="company" />
                <x-jet-input-error for="company" />
            </div>
        </div>

        <!-- job -->
        <div class="row mb-3">
            <x-jet-label for="job" value="{{ __('job') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="job" type="text" class="{{ $errors->has('job') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.job" autocomplete="job" />
                <x-jet-input-error for="job" />
            </div>
        </div>

        <!-- country -->
        <div class="row mb-3">
            <x-jet-label for="country" value="{{ __('Country') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="country" type="text" class="{{ $errors->has('country') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.country" autocomplete="country" />
                <x-jet-input-error for="country" />
            </div>
        </div>

        <!-- address -->
        <div class="row mb-3">
            <x-jet-label for="address" value="{{ __('Address') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="address" type="text" class="{{ $errors->has('address') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.address" autocomplete="address" />
                <x-jet-input-error for="address" />
            </div>
        </div>

        <!-- phone -->
        <div class="row mb-3">
            <x-jet-label for="phone" value="{{ __('Phone') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="phone" type="text" class="{{ $errors->has('phone') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.phone" autocomplete="phone" />
                <x-jet-input-error for="phone" />
            </div>
        </div>

        <!-- Paypal Email -->
        <div class="row mb-3">
            <x-jet-label for="paypal_email" value="{{ __('Paypal Email') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="paypal_email" type="paypal_email" class="{{ $errors->has('paypal_email') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.paypal_email" />
                <x-jet-input-error for="paypal_email" />
            </div>    
        </div>

        <!-- Twitter Profile -->
        <div class="row mb-3">
            <x-jet-label for="twitter" value="{{ __('Twitter Profile') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="twitter" type="text" class="{{ $errors->has('twitter') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.twitter" autocomplete="twitter" />
                <x-jet-input-error for="twitter" />
            </div>
        </div>

        <!-- Facebook Profile -->
        <div class="row mb-3">
            <x-jet-label for="facebook" value="{{ __('Facebook Profile') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="facebook" type="text" class="{{ $errors->has('facebook') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.facebook" autocomplete="facebook" />
                <x-jet-input-error for="facebook" />
            </div>
        </div>

        <!-- Instagram Profile -->
        <div class="row mb-3">
            <x-jet-label for="instagram" value="{{ __('Instagram Profile') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="instagram" type="text" class="{{ $errors->has('instagram') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.instagram" autocomplete="instagram" />
                <x-jet-input-error for="instagram" />
            </div>
        </div>

        <!-- Linkedin Profile -->
        <div class="row mb-3">
            <x-jet-label for="linkedin" value="{{ __('Linkedin Profile') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="linkedin" type="text" class="{{ $errors->has('linkedin') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.linkedin" autocomplete="linkedin" />
                <x-jet-input-error for="linkedin" />
            </div>
        </div>
        
    </x-slot>

    <x-slot name="actions">
		<div class="d-flex align-items-baseline">
            <button type="submit" class="btn btn-get-started" wire:loading.class="disabled" wire:loading.attr="disabled" >Save Changes</button>
            {{--
    			<x-jet-button>
                    <!-- <div wire:loading class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div> -->

    				{{ __('Save') }}
    			</x-jet-button>
            --}}
		</div>
    </x-slot>
</x-jet-form-section>