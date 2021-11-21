<div>
    <x-jet-dialog-modal wire:model="isModalOpen">
        <x-slot name="title">
            {{ $isEdit ? 'Editar' : 'Adicionar' }} Categoria
            <hr>
        </x-slot>

        <x-slot name="content">
            Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted.
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeModalPopover()" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-secondary-button class="ml-2 bg-green-200 text-green-600 hover:bg-green-500" wire:click="save()" wire:loading.attr="disabled">
                {{ __('Done') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    <div wire:loading.delay wire:target="save">
        <x-loading class="flex justify-center"></x-loading>
    </div>
</div>
