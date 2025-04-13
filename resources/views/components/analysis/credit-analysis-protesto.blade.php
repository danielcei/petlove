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
            <b>Protesto</b>
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
                    <th class="border  border-gray-300 p-2 text-center">Quantidade Total</th>
                    <th class="border  border-gray-300 p-2 text-center">Valor Total</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-600">
                <tr>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->protesto->resumo->quantidadeTotal }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ number_format($creditAnalysis->result->return_object->resultado->protesto->resumo->valorTotal ?? 0, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border border-gray-300 p-2">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="border  border-gray-300 p-2 text-center">Cartório</th>
                                <th class="border border-gray-300 p-2 text-center">Cidade</th>
                                <th class="border  border-gray-300 p-2 text-center">Estado (UF)</th>
                                <th class="border border-gray-300 p-2 text-center">Data do Protesto</th>
                                <th class="border  border-gray-300 p-2 text-center">Valor</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-600">
                            <?php foreach (optional($creditAnalysis->result->return_object->resultado->protesto)->detalheProtesto as $protesto) : ?>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">{{ $protesto->cartorio->nome ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $protesto->cartorio->cidade->nome ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $protesto->cartorio->cidade->estado->siglaUf ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ date('d-m-Y', $protesto->dataProtesto / 1000) }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ number_format($protesto->valor ?? 0, 2, ',', '.') }}</td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
