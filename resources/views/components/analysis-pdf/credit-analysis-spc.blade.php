<div  class="mt-3">
    <?php
    $bgColor = '#bbdefb';
    if ($creditAnalysis->result->return_object->resultado->spc->resumo->quantidadeTotal > 0) {
        $bgColor = '#ffcccc';
    }
    ?>

    <div style="background-color: {{$bgColor}}; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b>Pendências Financeiras SPC</b>
    </div>
    <div x-show="open" x-collapse class="p-5">
        <div>
            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-white">
                <tr>
                    <th class="border  bg-gray-100 border-gray-300 p-2 text-center">Quantidade Total</th>
                    <th class="border  bg-gray-100 border-gray-300 p-2 text-center">Valor Total</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->spc->resumo->quantidadeTotal }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ number_format($creditAnalysis->result->return_object->resultado->spc->resumo->valorTotal ?? 0, 2, ',', '.')   }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border border-gray-300 p-2">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                            <tr>
                            <tr class="bg-gray-100">
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Contrato</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Associado</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Endereço do Associado
                                </th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Telefone Associado</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Entidade</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Data da Inclusão</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Vencimento</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Valor</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Instituição Financeira
                                </th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Avalista</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach (optional($creditAnalysis->result->return_object->resultado->spc)->detalheSpc as $spc) : ?>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">{{ $spc->contrato ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $spc->nomeAssociado ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $spc->cidadeAssociado->nome ?? '' }}
                                    - {{ $spc->cidadeAssociado->estado->siglaUf ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $spc->telefoneAssociado->numeroDdd ?? '' }} {{ $spc->telefoneAssociado->numero ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $spc->codigoEntidade ?? '' }}
                                    - {{ $spc->nomeEntidade ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ date('d-m-Y', $spc->dataInclusao / 1000) }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ date('d-m-Y', $spc->dataVencimento / 1000) }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ number_format($spc->valor ?? 0, 2, ',', '.') }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $spc->registroInstituicaoFinanceira ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $spc->compradorFiadorAvalista ?? '' }}</td>
                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
