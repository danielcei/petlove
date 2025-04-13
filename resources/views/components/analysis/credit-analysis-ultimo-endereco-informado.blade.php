<div x-data="{ open: false }" class="mt-3">
    <?php
    $bgColor = 'bg-sky-300 hover:bg-sky-150 text-gray-800';
    if (empty($creditAnalysis->result->return_object->resultado->ultimoEnderecoInformado->detalheUltimoEnderecoInformado)) {
        $bgColor = 'bg-red-300 hover:bg-red-150 text-gray-800';
    }
    ?>
    <h2>
        <button @click="open = !open"
                class="text-lg text-left w-full flex justify-between items-center p-3 {{ $bgColor }} rounded shadow">
            <b>Endereços Informados Anteriormente</b>
            <svg :class="{'rotate-180': open}" class="h-6 w-6 transform transition-transform" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </h2>

    <div x-show="open" x-collapse class="bg-gray-100 p-5 rounded-lg shadow dark:bg-gray-800">
        <div>
            <table class="min-w-full divide-y divide-gray-200 mt-2">
                <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="border border-gray-300 p-2">logradouro</th>
                    <th class="border border-gray-300 p-2">numero</th>
                    <th class="border border-gray-300 p-2">bairro</th>
                    <th class="border border-gray-300 p-2">cep</th>
                    <th class="border border-gray-300 p-2">siglaUf</th>
                    <th class="border border-gray-300 p-2">nome</th>
                </tr>
                </thead >
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-600">
                <?php foreach ($creditAnalysis->result->return_object->resultado->ultimoEnderecoInformado->detalheUltimoEnderecoInformado as $detalheUltimoEnderecoInformado) : ?>
                <tr>
                    <td class="border border-gray-300 p-2"><?= $detalheUltimoEnderecoInformado->endereco->logradouro; ?></td>
                    <td class="border border-gray-300 p-2"><?= $detalheUltimoEnderecoInformado->endereco->numero ?? 'N/A'; ?></td>
                    <td class="border border-gray-300 p-2"><?= $detalheUltimoEnderecoInformado->endereco->bairro ?? 'N/A'; ?></td>
                    <td class="border border-gray-300 p-2"><?= $detalheUltimoEnderecoInformado->endereco->cep; ?></td>
                    <td class="border border-gray-300 p-2"><?= $detalheUltimoEnderecoInformado->endereco->cidade->estado->siglaUf; ?></td>
                    <td class="border border-gray-300 p-2"><?= $detalheUltimoEnderecoInformado->endereco->cidade->nome; ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
