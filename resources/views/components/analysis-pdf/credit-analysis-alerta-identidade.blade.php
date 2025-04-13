<div class="mt-3">
    <?php
    $bgColor = '#bbdefb';
    if ($creditAnalysis->result->return_object->resultado->alertaIdentidade->resumo->quantidadeTotal > 0) {
        $bgColor = '#ffcccc';
    }
    ?>

    <div
        style="background-color: {{$bgColor}}; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b>Alerta de Identidade</b>
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
                    <td class="border border-gray-300 p-2 text-center">{{ $creditAnalysis->result->return_object->resultado->alertaIdentidade->resumo->quantidadeTotal }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border border-gray-300 p-2">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                            <tr>
                            <tr class="bg-gray-100">
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
