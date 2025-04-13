<div x-data="{ open: false }" class="mt-3">
    <h2>
        <?php
        $bgColor = 'bg-sky-300 hover:bg-sky-150 text-gray-800';
        if (count(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado->pendenciaFinanceira->detalhePendenciaFinanceira) > 0) {
            $bgColor = 'bg-red-300 hover:bg-red-150 text-gray-800';
        }
        ?>
        <button @click="open = !open"
                class="text-lg text-left w-full flex justify-between items-center p-3 rounded shadow {{ $bgColor }}">
            <b>Pendências Financeiras Serasa</b>
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
                    <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Ocorrência Mais Antiga</th>
                    <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Ocorrência Mais Recente</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-600">
                @php
                    $ocorrenciaMaisAntiga = optional($creditAnalysis->result->return_object->resultado->pendenciaFinanceira)->ocorrenciaMaisAntigaChequenet;
                    $ocorrenciaMaisRecente = optional($creditAnalysis->result->return_object->resultado->pendenciaFinanceira)->ocorrenciaMaisRecenteChequenet;

                    $dataOcorrenciaMaisAntiga = $ocorrenciaMaisAntiga ? \Carbon\Carbon::createFromTimestampMs($ocorrenciaMaisAntiga)->format('d/m/Y') : 'N/A';
                    $dataOcorrenciaMaisRecente = $ocorrenciaMaisRecente ? \Carbon\Carbon::createFromTimestampMs($ocorrenciaMaisRecente)->format('d/m/Y') : 'N/A';
                @endphp

                <tr>
                    <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $dataOcorrenciaMaisAntiga }}</td>
                    <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $dataOcorrenciaMaisRecente }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border border-gray-300 p-2">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-700 dark:bg-gray-700">
                            <tr>
                                <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Contrato</th>
                                <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Origem</th>
                                <th class="border border-gray-300 p-2 text-center dark:text-gray-200">Título da Ocorrência</th>
                                <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Data da Ocorrência</th>
                                <th class="border  border-gray-300 p-2 text-center dark:text-gray-200">Valor da Pendência</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($creditAnalysis->result->return_object->resultado->pendenciaFinanceira->detalhePendenciaFinanceira as $pendencia) : ?>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $pendencia->contrato ?? 'N/A' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $pendencia->origem ?? 'N/A' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $pendencia->tituloOcorrencia ?? 'N/A' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ optional($pendencia->dataOcorrencia) ? date('d-m-Y', $pendencia->dataOcorrencia / 1000) : 'N/A' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ number_format($pendencia->valorPendencia ?? 0, 2, ',', '.') }}</td>
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
