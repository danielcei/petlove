<x-filament::widget class="col-span-1 md:col-span-2 lg:col-span-3 p-0 border-0">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse  ($this->pets as $pet)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 relative">
                <!-- Menu de ações -->
                <div class="absolute top-2 right-2">
                    <x-filament::dropdown placement="bottom-end">
                        <x-slot name="trigger">
                            <x-filament::icon-button
                                icon="heroicon-o-ellipsis-vertical"
                                color="gray"
                            />
                        </x-slot>

                        <x-filament::dropdown.list>
                            <!-- Editar -->
                            <x-filament::dropdown.list.item
                                wire:click="callAction('edit', {{ $pet->id }})"
                                icon="heroicon-o-pencil"
                            >
                                Editar
                            </x-filament::dropdown.list.item>

                            <!-- Excluir -->
                            <x-filament::dropdown.list.item
                                wire:click="callAction('delete', {{ $pet->id }})"
                                icon="heroicon-o-trash"
                                color="danger"
                            >
                                Excluir
                            </x-filament::dropdown.list.item>
                        </x-filament::dropdown.list>
                    </x-filament::dropdown>
                </div>

                <div class="flex gap-4">
                    @if($pet->photo)
                        <img src="{{ asset('storage/'.$pet->photo) }}" class="h-40 w-40 object-cover rounded-md">
                    @else
                        <div class="w-40 h-40 bg-gray-100 rounded-md flex items-center justify-center">
                            <x-heroicon-o-photo class="w-10 h-10 text-gray-400" />
                        </div>
                    @endif

                    <div class="flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold">{{ $pet->name }}</h3>
                            <p class="text-sm">Sexo: {{ $pet->gender }}</p>
                            <p class="text-sm">Peso: {{ $pet->weight }}kg</p>
                        </div>

                        <!-- Botão de agendamento -->
                        <div class="mt-4">
                            <x-filament::button
                                wire:click="callAction('schedule', {{ $pet->id }})"
                                icon="heroicon-o-calendar"
                                size="sm"
                            >
                                Agendar Serviço
                            </x-filament::button>
                        </div>
                    </div>
                </div>

            </div>
        @empty

            <div class="col-span-full flex flex-col items-center justify-center p-8 bg-white dark:bg-gray-800 rounded-xl shadow">
                <div class="text-center mb-6">
                    <x-heroicon-o-plus-circle class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-500" />
                    <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">
                        Nenhum pet cadastrado
                    </h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Comece adicionando seu primeiro pet!
                    </p>
                </div>
                <x-filament::button
                    wire:click="callCreate('create')"
                    icon="heroicon-o-plus"
                    size="lg"
                    color="primary"
                >
                    Adicionar Pet
                </x-filament::button>
            </div>
            @endforelse


    </div>
</x-filament::widget>
