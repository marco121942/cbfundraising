@props(['submit'])

<form wire:submit.prevent="{{ $submit }}" {{ $attributes->merge(['class' => '']) }}>
    <!-- .prevent -->
    
    {{ $form }}
    
    @if (isset($actions))
        <div class="d-flex justify-content-center">
            {{ $actions }}
        </div>
    @endif
</form>

