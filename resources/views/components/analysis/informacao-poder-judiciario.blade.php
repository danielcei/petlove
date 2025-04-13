<div x-data="{ open: false }" class="mt-3">
    <h2>
        <?php
        $bgColor = 'bg-sky-300 hover:bg-sky-150 text-gray-800';
        if ($creditAnalysis->result->return_object->resultado->protesto->resumo->quantidadeTotal > 0) {
            $bgColor = 'bg-red-300 hover:bg-red-150 text-gray-800';
        }
        ?>
        <button @click="open = !open"
                class="text-lg text-left w-full flex justify-between items-center p-3 rounded shadow {{$bgColor}}">
            <b>Informações do Poder Judiciário</b>
            <svg :class="{'rotate-180': open}" class="h-6 w-6 transform transition-transform" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </h2>
    <div x-show="open" x-collapse class="bg-gray-100 p-5 rounded-lg shadow dark:bg-gray-800">
        <div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white dark:bg-gray-700">
                <tr>
                    <th class="border  border-gray-300 p-2 text-center">Vara</th>
                    <th class="border border-gray-300 p-2 text-center">Comarca</th>
                    <th class="border  border-gray-300 p-2 text-center">Estado</th>
                    <th class="border  border-gray-300 p-2 text-center">Data do Documento</th>
                    <th class="border  border-gray-300 p-2 text-center">Data de Inclusão</th>
                    <th class="border  border-gray-300 p-2 text-center">Entidade Origem</th>
                    <th class="border  border-gray-300 p-2 text-center">Número do Processo</th>
                    <th class="border border-gray-300 p-2 text-center">Valor</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-600">
                <?php foreach (optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->informacaoPoderJudiciario)->detalheInformacaoPoderJudiciario as $detalhe) : ?>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">{{ optional(optional($detalhe)->vara)->nome ?? 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ optional(optional(optional($detalhe)->vara)->comarca)->nome ?? 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ optional(optional(optional(optional($detalhe)->vara)->comarca)->estado)->siglaUf ?? 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ optional($detalhe->dataDocumento) ? \Carbon\Carbon::createFromTimestamp($detalhe->dataDocumento / 1000)->format('d/m/Y') : 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ optional($detalhe->dataInclusao) ? \Carbon\Carbon::createFromTimestamp($detalhe->dataInclusao / 1000)->format('d/m/Y') : 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ optional($detalhe)->entidadeOrigem ?? 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ optional($detalhe)->numeroProcesso ?? 'N/A' }}</td>
                    <td class="border border-gray-300 p-2 text-center">R$ {{ number_format(optional($detalhe)->valor ?? 0, 2, ',', '.') }}</td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
