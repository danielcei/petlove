<div x-data="{ open: false }" class="mt-3">
    <?php
    $bgColor = 'bg-sky-300 hover:bg-sky-150 text-gray-800';
    if ($creditAnalysis->result->return_object->resultado->alertaIdentidade->resumo->quantidadeTotal > 0) {
        $bgColor = 'bg-red-300 hover:bg-red-150 text-gray-800';
    }
    ?>
    <h2>
        <button @click="open = !open"
                class="text-lg text-left w-full flex justify-between items-center p-3 rounded shadow {{$bgColor}} dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-gray-300">
            <b>Alerta de Identidade</b>
            <svg :class="{'rotate-180': open}" class="h-6 w-6 transform transition-transform" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </h2>
    <div x-show="open" x-collapse class="bg-gray-100 p-5 rounded-lg shadow">
        <div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                <tr>
                    <th class="border bg-gray-100 border-gray-300 p-2 text-center">Quantidade Total</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->alertaIdentidade->resumo->quantidadeTotal }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border border-gray-300 p-2">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                            <tr>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Mensagem</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach (optional($creditAnalysis->result->return_object->resultado->alertaIdentidade)->detalheAlertaIdentidade as $alerta) : ?>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">{{ $alerta->mensagem ?? '' }}</td>
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
