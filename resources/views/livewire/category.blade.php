<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="w-3/4 mx-auto sm:px-20 lg:px-8">
            <div class="bg-white flex items-center rounded-lg py-4">
                <div class="p-6">
                    <input class="rounded-full" placeholder="Pesquisar categoria..."
                           wire:model="search" type="text">
                </div>
                <div class="p-6">
                    <button class="bg-blue-100 hover:bg-indigo-600 border p-2 rounded-lg"
                            wire:click="create()">Criar Categoria</button>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.create-form')
    @include('livewire.confirmation-delete')

    <div class="py-4">
        <div class="w-3/4 mx-auto sm:px-20 lg:px-8">
            <div class="bg-white">
                <div class="w-full rounded-lg shadow-lg">
                    <div class="flex-col space-x-8 space-y-6 pb-4">
                        <table class="w-full rounded-lg">
                            <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-200 uppercase border-b border-gray-600">
                                <th class="px-4 py-3 text-center">Título</th>
                                <th class="px-4 py-3 text-center">Descrição</th>
                                <th class="px-4 py-3 text-center">Status</th>
                                <th class="px-4 py-3 text-center">Tipo</th>
                                <th class="px-4 py-3 text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600">
                            @forelse($categories as $category)
                                <tr wire:loading.class.delay="opacity-50">
                                    <td class="px-4 py-3 border">
                                        <p class="font-semibold text-center">{{ $category->title }}</p>
                                    </td>
                                    <td class="px-4 py-3 text-center border">
                                        <span class="font-semibold">{{ $category->description }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-center border">
                                        <span class="px-2 text-sm font-semibold leading-tight {{ $category->active_color }} rounded-lg">
                                            {{ $category->active ? 'Ativo' : 'Inativo' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-center border">
                                        <span class="px-2 text-sm uppercase {{$category->entry_color}}">{{ __($category->entry) }}</span>
                                    </td>
                                    <td class="px-4 py-3 border text-center">
                                        <button wire:click="edit('{{$category->id}}')"
                                            class="bg-blue-100 hover:bg-indigo-600 text-gray-600 px-3 rounded-lg">
                                            Editar
                                        </button>
                                        <button wire:click="delete('{{$category->id}}')"
                                            class="bg-red-100 hover:bg-red-700 text-gray-600 px-3 rounded-lg">
                                            Deletar
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr wire:loading.class.delay="opacity-50">
                                    <td colspan="5">
                                        <div class="flex justify-center items-center">
                                            <span class="font-medium py-8 text-gray-500 text-xl">Categoria não encontrada...</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="pr-4">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
