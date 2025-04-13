<div x-data="{ openScore: false }" class="grid gap-4 mt-3">
    <h2>
        <button @click="openScore = !openScore"
                class="text-lg text-left w-full flex justify-between items-center p-3  rounded shadow bg-sky-300 hover:bg-sky-150 text-gray-800">
            <b>Índice de Relacionamento Mercado PF</b>
            <svg :class="{'rotate-180': openScore}" class="h-6 w-6 transform transition-transform" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </h2>

    <div x-show="openScore" x-collapse class="p-5 rounded-lg shadow">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 p-2 text-center">Indicador</th>
                    <th class="border border-gray-300 p-2 text-center">Valor</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Relacionamento Mercado Geral PF</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->relacionamentoMercadoGeralPF ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Relacionamento Mercado Financeira PF</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->relacionamentoMercadoFinanceiraPF ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Relacionamento Mercado Comércio PF</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->relacionamentoMercadoComercioPF ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Relacionamento Mercado Seguro PF</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->relacionamentoMercadoSeguroPF ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Relacionamento Mercado Utility PF</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->relacionamentoMercadoUtilityPF ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Relacionamento Mercado Investimento PF</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->relacionamentoMercadoInvestimentoPF ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Relacionamento Mercado Outros PF</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->relacionamentoMercadoOutrosPF ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Tendência Geral</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->tendenciaGeral ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Tendência Financeira</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->tendenciaFinanceira ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Tendência Comércio</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->tendenciaComercio ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Tendência Seguro</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->tendenciaSeguro ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Tendência Utility</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->tendenciaUtility ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Tendência Investimento</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->tendenciaInvestimento ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Tendência Outros</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->tendenciaOutros ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Novos Contratos</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->novosContratos ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Contratos a Vencer</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->contratosAVencer ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">Contratos Vencidos</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->indiceRelacionamentoMercadoPf->detalheIndiceRelacionamentoMercadoPf[0]->contratosVencidos ?? 'N/A' }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
