<div x-data="{ openScore: false }" class="grid gap-4 mt-3">
    <h2>
        <button @click="openScore = !openScore"
                class="text-lg text-left w-full flex justify-between items-center p-3  rounded shadow bg-sky-300 hover:bg-sky-150 text-gray-800">
            <b>Renda Presumida SPC</b>
            <svg :class="{'rotate-180': openScore}" class="h-6 w-6 transform transition-transform" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </h2>
    <div x-show="openScore" x-collapse class="p-5 rounded-lg shadow">
        <div class="flex justify-between space-x-4">
            <div class="w-1/3 p-4 bg-green-100 shadow-md rounded-md mx-auto">
                <h2 class="text-center text-xl font-bold mb-4">Mediana</h2>
                <div class="border border-gray-300 p-4 text-center bg-white rounded-md">
                    <p class="text-2xl font-bold text-green-800">R$ {{ number_format(optional(optional($this->creditAnalysis->result->return_object->resultado->rendaPresumidaSpc)[0] ?? 0)->mediana ?? 0, 2, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
