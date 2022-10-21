<div>
    <x-jet-dialog-modal wire:model="isModalOpen">
        <x-slot name="title">
            {{ $isEdit ? 'Editar' : 'Adicionar' }} Categoria
            <hr>
        </x-slot>

        <x-slot name="content">
            <div class="mb-6">
                <label class="block mb-2 text-sm text-gray-600">
                    {{__('Title')}}
                </label>
                <input
                    type="text"
                    name="name"
                    placeholder="{{__('Title')}}"
                    wire:model="category.title"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md
                        focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                />
                <x-jet-input-error for="category.title" class="mt-2" />
            </div>
            <div class="mb-6">
                <label for="message" class="block mb-2 text-sm text-gray-600">
                    {{__('Description')}}
                </label>

                <textarea
                    rows="5"
                    name="message"
                    placeholder="{{__('Description')}}"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md
                         focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                    wire:model="category.description"
                ></textarea>
                <x-jet-input-error for="category.description" class="mt-2" />
            </div>
            <div class="mb-6">
                <label class="inline-block text-sm text-gray-600" for="color">{{__('Type')}}</label>
                <div class="relative flex w-full">
                    <select class="block w-full py-3 pl-4 pr-8 bg-white border border-gray-300 rounded-sm
                    appearance-none cursor-pointer focus:outline-none hover:border-gray-400"
                            wire:model="category.entry"
                    >
                        <option>{{__('Select...')}}</option>
                        <option value="expense">{{__('Expense')}}</option>
                        <option value="revenue">{{__('Revenue')}}</option>
                    </select>
                </div>
                <x-jet-input-error for="category.entry" class="mt-2" />
            </div>
            <div class="mb-6">
                <div>
                    <input
                        type="checkbox"
                        name="{{__('Active')}}?"
                        class="w-5 h-5 border border-gray-300 rounded-sm outline-none cursor-pointer"
                        wire:model="category.active"
                    />
                    <label class="ml-2 text-sm">{{__('Active')}}?</label>
                </div>
                <x-jet-input-error for="category.active" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeModalPopover()" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-secondary-button class="ml-2 bg-green-200 text-green-600 hover:bg-green-500" wire:click="save()"
                                    wire:loading.attr="disabled">
                {{ __('Done') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    <div wire:loading.delay wire:target="save">
        <x-loading class="flex justify-center"></x-loading>
    </div>
</div>
