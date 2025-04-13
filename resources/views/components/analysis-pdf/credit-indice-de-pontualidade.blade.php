<div  class="mt-3">
    <?php
    $bgColor = '#bbdefb';
    ?>

    <div style="background-color: {{$bgColor}}; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b>Índice de Pontualidade de Pagamento</b>
    </div>
    <div x-show="open" x-collapse class="p-5">
        <div>
            <table  style="width: 100%;" class="divide-gray-200">
                <thead class="bg-white">
                <tr>
                    <th class="border bg-gray-100 border-gray-300 p-2 text-center">Quantidade Total</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="border border-gray-300 p-2 text-center">
                        {{ optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado->insumoIndicePontualidadePagamentoCadastroPositivo)->resumo->quantidadeTotal }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="border border-gray-300 p-2">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                            <tr>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Segmento</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Descrição</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Porcentual</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach (optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado->insumoIndicePontualidadePagamentoCadastroPositivo)->detalheInsumoIndicePontualidadePagamentoCadastroPositivo as $detalhe) : ?>
                                <?php foreach (optional($detalhe)->segmentos as $segmento) : ?>
                                <?php foreach (optional($segmento)->periodos as $periodo) : ?>
                                <?php
                                $descricaoAmigavel = [
                                    'PAGAMENTO_EM_DIA' => 'Pagamento em Dia',
                                    'PAGAMENTO_ATE_15_DIAS' => 'Pagamento até 15 Dias',
                                    'PAGAMENTO_ENTRE_15_E_30_DIAS_APOS_VENCIMENTO' => 'Pagamento entre 15 e 30 Dias após Vencimento',
                                    'PAGAMENTO_ENTRE_30_E_90_DIAS_APOS_VENCIMENTO' => 'Pagamento entre 30 e 90 Dias após Vencimento',
                                    'PAGAMENTO_ACIMA_DE_90_DIAS_APOS_VENCIMENTO' => 'Pagamento acima de 90 Dias após Vencimento',
                                    'SEM_INFORMACOES_PAGAMENTO_ACIMA_DE_30_DIAS_APOS_VENCIMENTO' => "Sem informações de pagamento acima de 30 dias após o vencimento",
                                    'SEM_INFORMACOES_PAGAMENTO_ATE_30_DIAS_APOS_VENCIMENTO' => 'Sem Informações de Pagamento até 30 Dias após Vencimento',
                                ];
                                ?>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">{{ optional($segmento)->nome ?? 'N/A' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $descricaoAmigavel[optional($periodo)->descricao] ?? optional($periodo)->descricao ?? 'N/A' }}</td><td class="border border-gray-300 p-2 text-center">
                                    {{ number_format(optional($periodo)->porcentual ?? 0, 2, ',', '.') }}%
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <?php endforeach ?>
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
