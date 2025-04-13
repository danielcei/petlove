<div class="mt-3">
    <?php
    $bgColor = '#bbdefb';
    if (optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->informacaoPoderJudiciario)->quantidadeTotal > 0) {
        $bgColor = '#ffcccc';
    }
    ?>

    <div
        style="background-color: {{$bgColor}}; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b>Informações do Poder Judiciário</b>
    </div>
    <div class="p-5">
        <div>
            <table style="width: 100%;" class="divide-gray-200">
                <thead class="bg-white">
                <tr>
                    <th class="border bg-gray-100 border-gray-300 p-2 text-center">Vara</th>
                    <th class="border bg-gray-100 border-gray-300 p-2 text-center">Comarca</th>
                    <th class="border bg-gray-100 border-gray-300 p-2 text-center">Estado</th>
                    <th class="border bg-gray-100 border-gray-300 p-2 text-center">Data do Documento</th>
                    <th class="border bg-gray-100 border-gray-300 p-2 text-center">Data de Inclusão</th>
                    <th class="border bg-gray-100 border-gray-300 p-2 text-center">Entidade Origem</th>
                    <th class="border bg-gray-100 border-gray-300 p-2 text-center">Número do Processo</th>
                    <th class="border bg-gray-100 border-gray-300 p-2 text-center">Valor</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach (optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->informacaoPoderJudiciario)->detalheInformacaoPoderJudiciario as $detalhe) : ?>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">{{ optional(optional($detalhe)->vara)->nome ?? 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ optional(optional(optional($detalhe)->vara)->comarca)->nome ?? 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ optional(optional(optional(optional($detalhe)->vara)->comarca)->estado)->siglaUf ?? 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ \Carbon\Carbon::createFromTimestamp(optional($detalhe)->dataDocumento / 1000)->format('d/m/Y') ?? 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ \Carbon\Carbon::createFromTimestamp(optional($detalhe)->dataInclusao / 1000)->format('d/m/Y') ?? 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ optional($detalhe)->entidadeOrigem ?? 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ optional($detalhe)->numeroProcesso ?? 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">
                        R$ {{ number_format(optional($detalhe)->valor ?? 0, 2, ',', '.') }}</td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
