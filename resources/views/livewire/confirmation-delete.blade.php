<div>
    <x-jet-confirmation-modal wire:model="isConfirmationOpen">
        <x-slot name="title">
            Confirma
            <hr>
        </x-slot>

        <x-slot name="content">

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeModalPopover()" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:loading.attr="disabled">
                {{ __('Confirm') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
