<div x-data="{ open: false }" class="mt-3">
    <?php
    $bgColor = 'bg-sky-300 hover:bg-sky-150 text-gray-800';
    if ($creditAnalysis->result->return_object->resultado->alertaDocumento->resumo->quantidadeTotal > 0) {
        $bgColor = 'bg-red-300 hover:bg-red-150 text-gray-800';
    }
    ?>
    <h2>
        <button @click="open = !open"
                class="text-lg text-left w-full flex justify-between items-center p-3 rounded shadow {{$bgColor}}">
            <b>Alerta de Documento</b>
            <svg :class="{'rotate-180': open}" class="h-6 w-6 transform transition-transform" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </h2>
    <div x-show="open" x-collapse class="bg-gray-100 dark:bg-gray-800 p-5 rounded-lg shadow">
        <div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white dark:bg-gray-700">
                <tr>
                    <th class="border bg-gray-100 border-gray-300 p-2 text-center dark:bg-gray-600 dark:text-gray-50">Quantidade Total</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <tr>
                    <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $creditAnalysis->result->return_object->resultado->alertaDocumento->resumo->quantidadeTotal }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border border-gray-300 p-2 dark:text-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr class="bg-gray-100 dark:bg-gray-600">
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center dark:bg-gray-600 dark:text-gray-50">Mensagem</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center dark:bg-gray-600 dark:text-gray-50">Data de Inclusão</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center dark:bg-gray-600 dark:text-gray-50">Data de Ocorrência</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center dark:bg-gray-600 dark:text-gray-50">Entidade</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center dark:bg-gray-600 dark:text-gray-50">Motivo</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center dark:bg-gray-600 dark:text-gray-50">Observação</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach (optional($creditAnalysis->result->return_object->resultado->alertaDocumento)->detalheAlertaDocumento as $alerta) : ?>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">@php
                                        $nomesDocumentos = array_map(function($documento) {
                                            return $documento->nome;
                                        }, $alerta->tipoDocumentoAlerta);

                                        $stringDocumentos = implode(', ', $nomesDocumentos);
                                    @endphp

                                    {{ $stringDocumentos }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $alerta->dataInclusao ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $alerta->dataOcorrencia ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $alerta->entidadeOrigem ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $alerta->motivo ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center dark:text-gray-200">{{ $alerta->observacao ?? '' }}</td>
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
