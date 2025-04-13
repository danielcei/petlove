<div class="mt-3">
    <?php
    $bgColor = '#bbdefb';
    if (count($creditAnalysis->result->return_object->resultado->pendenciaFinanceira->detalhePendenciaFinanceira) > 0) {
        $bgColor = '#ffcccc';
    }
    ?>

    <div
        style="background-color: {{$bgColor}}; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b>Pendências Financeiras Serasa</b>
    </div>
    <div x-show="open" x-collapse class="p-5">
        <div>
            <table class="divide-gray-200">
                <thead class="bg-white">
                <tr>
                    <th class="border bg-gray-100 border-gray-300 p-2 text-center">Ocorrência Mais Antiga</th>
                    <th class="border bg-gray-100 border-gray-300 p-2 text-center">Ocorrência Mais Recente</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $ocorrenciaMaisAntiga = optional($creditAnalysis->result->return_object->resultado->pendenciaFinanceira)->ocorrenciaMaisAntigaChequenet;
                    $ocorrenciaMaisRecente = optional($creditAnalysis->result->return_object->resultado->pendenciaFinanceira)->ocorrenciaMaisRecenteChequenet;

                    $dataOcorrenciaMaisAntiga = $ocorrenciaMaisAntiga ? \Carbon\Carbon::createFromTimestampMs($ocorrenciaMaisAntiga)->format('d/m/Y') : 'N/A';
                    $dataOcorrenciaMaisRecente = $ocorrenciaMaisRecente ? \Carbon\Carbon::createFromTimestampMs($ocorrenciaMaisRecente)->format('d/m/Y') : 'N/A';
                @endphp

                <tr>
                    <td class="border border-gray-300 p-2 text-center">{{ $dataOcorrenciaMaisAntiga }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $dataOcorrenciaMaisRecente }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border border-gray-300 p-2">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                            <tr>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Contrato</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Origem</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Título da Ocorrência</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Data da Ocorrência</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Valor da Pendência</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($creditAnalysis->result->return_object->resultado->pendenciaFinanceira->detalhePendenciaFinanceira as $pendencia) : ?>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">{{ $pendencia->contrato ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $pendencia->origem ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $pendencia->tituloOcorrencia ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ date('d-m-Y', $pendencia->dataOcorrencia / 1000) }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ number_format($pendencia->valorPendencia ?? 0, 2, ',', '.') }}</td>
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
