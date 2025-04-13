<div x-data="{ openScore: false }" class="grid gap-4 mt-3">
    <h2>
        <button @click="openScore = !openScore"
                class="text-lg text-left w-full flex justify-between items-center p-3 {{ optional($creditAnalysis->result->return_object->resultado->insumoRendaPresumidaPFPlus)->detalheInsumoRendaPresumidaPFPlus[0]->rendaPlusCartao > 0 ? 'bg-red-50 hover:bg-red-100' : 'bg-sky-100 hover:bg-sky-50' }} rounded shadow">
            <b>Renda Presumida PF Plus</b>
            <svg :class="{'rotate-180': openScore}" class="h-6 w-6 transform transition-transform" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </h2>

    <div x-show="openScore" x-collapse class="p-5 rounded-lg shadow">
        <div class="flex justify-center items-center space-x-4">
            <!-- Cartão 1 -->
            <div class="w-1/2 p-4 bg-blue-100 shadow-md rounded-md">
                <h2 class="text-center text-xl font-bold mb-4">Cartão</h2>
                <div class="border border-gray-300 p-4 text-center bg-white rounded-md">
                    <p class="text-2xl font-bold text-blue-800">R$ {{ number_format(optional(optional(optional($creditAnalysis->result->return_object->resultado)->insumoRendaPresumidaPFPlus)->detalheInsumoRendaPresumidaPFPlus[0])->rendaPlusCartao ?? 0, 2, ',', '.') }}</p>
                </div>
            </div>
            <!-- Cartão 2 -->
            <div class="w-1/2 p-4 bg-green-100 shadow-md rounded-md">
                <h2 class="text-center text-xl font-bold mb-4">Renda Parcelada</h2>
                <div class="border border-gray-300 p-4 text-center bg-white rounded-md">
                    <p class="text-2xl font-bold text-green-800">R$ {{ number_format(optional(optional(optional($creditAnalysis->result->return_object->resultado)->insumoRendaPresumidaPFPlus)->detalheInsumoRendaPresumidaPFPlus[0])->rendaPlusParcelado ?? 0, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
