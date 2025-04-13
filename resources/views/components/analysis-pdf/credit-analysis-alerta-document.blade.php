<div class="mt-3">
    <?php
    $bgColor = '#bbdefb';
    if ($creditAnalysis->result->return_object->resultado->alertaDocumento->resumo->quantidadeTotal > 0) {
        $bgColor = '#ffcccc';
    }
    ?>

    <div
        style="background-color: {{$bgColor}}; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b>Alerta de Documento</b>
    </div>
    <div x-show="open" x-collapse class="p-5">
        <div>
            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-white">
                <tr>
                    <th class="border  bg-gray-100 border-gray-300 p-2 text-center">Quantidade Total</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->alertaDocumento->resumo->quantidadeTotal }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border border-gray-300 p-2">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                            <tr>
                            <tr class="bg-gray-100">
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Mensagem</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Data de Inclusão</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Data de Ocorrência</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Entidade</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Motivo</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Observação</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach (optional($creditAnalysis->result->return_object->resultado->alertaDocumento)->detalheAlertaDocumento as $alerta) : ?>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">@php
                                        $nomesDocumentos = array_map(function($documento) {
                                            return $documento->nome;
                                        }, $alerta->tipoDocumentoAlerta);

                                        $stringDocumentos = implode(', ', $nomesDocumentos);
                                    @endphp

                                    {{ $stringDocumentos }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $alerta->dataInclusao ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $alerta->dataOcorrencia ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $alerta->entidadeOrigem ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $alerta->motivo ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $alerta->observacao ?? '' }}</td>
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
