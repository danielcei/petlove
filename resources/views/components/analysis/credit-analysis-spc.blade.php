<div x-data="{ open: false }" class="mt-3">
    <?php
    $bgColor = 'bg-sky-300 hover:bg-sky-150 text-gray-800';
    if ($creditAnalysis->result->return_object->resultado->spc->resumo->quantidadeTotal > 0) {
        $bgColor = 'bg-red-300 hover:bg-red-150 text-gray-800';
    }
    ?>
    <h2>
        <button @click="open = !open"
                class="text-lg text-left w-full flex justify-between items-center p-3 rounded shadow {{$bgColor}}">
            <b>Pendências Financeiras SPC</b>
            <svg :class="{'rotate-180': open}" class="h-6 w-6 transform transition-transform" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </h2>
    <div x-show="open" x-collapse class="bg-gray-100 p-5 rounded-lg shadow dark:bg-gray-800">
        <div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-700 dark:bg-gray-700">
                <tr>
                    <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Quantidade Total</th>
                    <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Valor Total</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-600">
                <tr>
                    <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $creditAnalysis->result->return_object->resultado->spc->resumo->quantidadeTotal }}</td>
                    <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ number_format($creditAnalysis->result->return_object->resultado->spc->resumo->valorTotal ?? 0, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border border-gray-300 p-2">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-700 dark:bg-gray-700">
                            <tr>
                                <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Contrato</th>
                                <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Associado</th>
                                <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Endereço do Associado</th>
                                <th class="border border-gray-300 p-2 text-center dark:text-gray-200">Telefone Associado</th>
                                <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Entidade</th>
                                <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Data da Inclusão</th>
                                <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Vencimento</th>
                                <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Valor</th>
                                <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Instituição Financeira</th>
                                <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Avalista</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach (optional($creditAnalysis->result->return_object->resultado->spc)->detalheSpc as $spc) : ?>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $spc->contrato ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $spc->nomeAssociado ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $spc->cidadeAssociado->nome ?? '' }} - {{ $spc->cidadeAssociado->estado->siglaUf ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $spc->telefoneAssociado->numeroDdd ?? '' }} {{ $spc->telefoneAssociado->numero ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $spc->codigoEntidade ?? '' }} - {{ $spc->nomeEntidade ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ date('d-m-Y', $spc->dataInclusao / 1000) }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ date('d-m-Y', $spc->dataVencimento / 1000) }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ number_format($spc->valor ?? 0, 2, ',', '.') }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $spc->registroInstituicaoFinanceira ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $spc->compradorFiadorAvalista ?? '' }}</td>
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
