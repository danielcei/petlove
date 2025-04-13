<div class="mt-3">
    <?php
    $bgColor = '#bbdefb';
    ?>

    <div
        style="background-color: {{$bgColor}}; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b>Indice de relacionamento Mercado PF</b>
    </div>
    <div x-show="open" x-collapse class="p-5">

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
