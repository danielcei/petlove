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
            <h3 class="text-lg font-bold">
                🐾 {{ $pet->name }}
            </h3>
            <p class="text-sm">
                👤 Sexo: {{ $pet->gender }}
            </p>
            <p class="text-sm">
                ⚖️ Peso: {{ $pet->weight }}kg
            </p>
        </div>
    </div>
</div>
