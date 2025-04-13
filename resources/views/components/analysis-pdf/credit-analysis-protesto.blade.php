<div class="mt-3">
    <?php
    $bgColor = '#bbdefb';
    if ($creditAnalysis->result->return_object->resultado->protesto->resumo->quantidadeTotal > 0) {
        $bgColor = '#ffcccc';
    }
    ?>

    <div
        style="background-color: {{$bgColor}}; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b>Protesto</b>
    </div>
    <div class="p-5">
        <div>
            <table  style="width: 100%;" class="divide-gray-200">

                <thead class="bg-white">
                <tr>
                    <th class="border  bg-gray-100 border-gray-300 p-2 text-center">Quantidade Total</th>
                    <th class="border  bg-gray-100 border-gray-300 p-2 text-center">Valor Total</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->protesto->resumo->quantidadeTotal }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ number_format($creditAnalysis->result->return_object->resultado->protesto->resumo->valorTotal ?? 0, 2, ',', '.')   }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border border-gray-300 p-2">
                        <table style="width: 100%;">
                            <thead class="bg-gray-100">
                            <tr>
                            <tr class="bg-gray-100">
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Cartório</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Cidade</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Estado (UF)</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Data do Protesto</th>
                                <th class="border bg-gray-100 border-gray-300 p-2 text-center">Valor</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach (optional($creditAnalysis->result->return_object->resultado->protesto)->detalheProtesto as $protesto) : ?>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">{{ $protesto->cartorio->nome ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $protesto->cartorio->cidade->nome ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ $protesto->cartorio->cidade->estado->siglaUf ?? '' }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ date('d-m-Y', $protesto->dataProtesto / 1000) }}</td>
                                <td class="border border-gray-300 p-2 text-center">{{ number_format($protesto->valor ?? 0, 2, ',', '.') }}</td>
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
