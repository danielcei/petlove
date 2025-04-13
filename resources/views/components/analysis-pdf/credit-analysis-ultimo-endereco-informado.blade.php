<div class="mt-3">
    <?php
    $bgColor = '#bbdefb';
    ?>

    <div
        style="background-color: {{$bgColor}}; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b>Endereços Informados Anteriormente</b>
    </div>
    <div x-show="open" x-collapse class="p-5">
        <div>
            <table class="min-w-full divide-y divide-gray-200 mt-2">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        logradouro
                    </th>
                    <th class="px-6 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider">
                        numero
                    </th>
                    <th class="px-6 py-2 text-left  text-xs font-medium text-gray-500 uppercase tracking-wider">bairro
                    </th>
                    <th class="px-6 py-2 text-left  text-xs font-medium text-gray-500 uppercase tracking-wider">cep</th>
                    <th class="px-6 py-2 text-left  text-xs font-medium text-gray-500 uppercase tracking-wider">
                        siglaUf
                    </th>
                    <th class="px-6 py-2 text-left  text-xs font-medium text-gray-500 uppercase tracking-wider">nome
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <?php

                // dd($creditAnalysis->result->return_object->resultado);

                foreach ($creditAnalysis->result->return_object->resultado->ultimoEnderecoInformado->detalheUltimoEnderecoInformado as $detalheUltimoEnderecoInformado) :
                    //dump(isset($detalheUltimoEnderecoInformado->endereco->bairro));

                    ?>
                <tr>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-left text-gray-500"><?= $detalheUltimoEnderecoInformado->endereco->logradouro; ?></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-center text-gray-500 "><?= !empty($detalheUltimoEnderecoInformado->endereco->numero) ?? 'N/A'; ?></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-left text-gray-500"><?= $detalheUltimoEnderecoInformado->endereco->bairro ?? 'N/A'; ?></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-left text-gray-500"><?= $detalheUltimoEnderecoInformado->endereco->cep; ?></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-left text-gray-500 "><?= $detalheUltimoEnderecoInformado->endereco->cidade->estado->siglaUf ?></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-left text-gray-500"><?= $detalheUltimoEnderecoInformado->endereco->cidade->nome ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
