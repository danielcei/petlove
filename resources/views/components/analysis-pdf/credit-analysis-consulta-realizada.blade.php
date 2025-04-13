<div class="mt-3">
    <?php
    $bgColor = '#bbdefb';

    ?>

    <div
        style="background-color: {{$bgColor}}; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b>Consultas Realizadas</b>
    </div>
    <div x-show="open" x-collapse class="p-5">
        <div>
            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-white">
                <tr>
                    <th class="border  bg-gray-100 border-gray-300 p-2 text-center">Quantidade Total</th>
                    <th class="border  bg-gray-100 border-gray-300 p-2 text-center">Quantidade Dias Consultados</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->consultaRealizada->resumo->quantidadeTotal }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->consultaRealizada->quantidadeDiasConsultados  }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border border-gray-300 p-2">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                            <tr>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 p-2">Nome Associado</th>
                                <th class="border border-gray-300 p-2">Data da Consulta</th>
                                <th class="border border-gray-300 p-2">Nome da Entidade</th>
                                <th class="border border-gray-300 p-2">Origem do Associado</th>
                                <th class="border border-gray-300 p-2">Estado do Associado</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach (optional($creditAnalysis->result->return_object->resultado->consultaRealizada)->detalheConsultaRealizada as $detalhe) : ?>
                            <tr>
                                <td class="border border-gray-300 p-2">{{ $detalhe->nomeAssociado }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ date('Y-m-d', $detalhe->dataConsulta / 1000) }}</td>
                                <td class="border border-gray-300 p-2">{{ $detalhe->nomeEntidadeOrigem }}</td>
                                <td class="border border-gray-300 p-2">{{ optional(optional($detalhe)->origemAssociado)->nome }}</td>
                                <td class="border border-gray-300 p-2">{{ optional(optional(optional($detalhe)->origemAssociado)->estado)->siglaUf }}</td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
