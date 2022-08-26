<x-jet-form-section submit="updatePassword">
    
    <x-slot name="form">
        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>
    
        <div class="row mb-3">
            <x-jet-label for="current_password" value="{{ __('Current Password') }}" class="col-md-4 col-lg-3 col-form-label" />
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="current_password" type="password" class="{{ $errors->has('current_password') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.current_password" autocomplete="current-password" />
                <x-jet-input-error for="current_password" />
            </div>
        </div>

        <div class="row mb-3">
            <x-jet-label for="password" value="{{ __('New Password') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.password" autocomplete="new-password"/>
                <x-jet-input-error for="password" />
            </div>
        </div>

        <div class="row mb-3">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="col-md-4 col-lg-3 col-form-label"/>
            <div class="col-md-8 col-lg-9">
                <x-jet-input id="password_confirmation" type="password" class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                <x-jet-input-error for="password_confirmation" />
            </div>
        </div>
    
    </x-slot>

    <x-slot name="actions">
        <button type="submit" class="btn btn-get-started" wire:loading.class="disabled" wire:loading.attr="disabled" >Change Password</button>
        {{--
        <x-jet-button>
            {{ __('Change Password') }}
        </x-jet-button>
        --}}
    </x-slot>
</x-jet-form-section>
