<div>
    <table class="table-auto w-full shadow-md rounded-lg border border-gray-200">
        <thead class="bg-gray-100 dark:bg-gray-700 dark:bg-gray-900 dark:text-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                Descrição
            </th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                Quantidade
            </th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                Valor
            </th>
        </tr>
        </thead>
        <tbody class="bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-gray-200">
        <tr class="bg-white dark:bg-gray-700">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Protesto</th>
            <td class="border px-6 py-2 text-sm text-gray-900 dark:text-gray-200">{{ optional(optional(optional($creditAnalysis->result->return_object->resultado)->protesto)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-900 dark:text-gray-200">{{ 'R$ ' . number_format(optional(optional(optional($creditAnalysis->result->return_object->resultado)->protesto)->resumo)->valorTotal ?? 0, 2, ',', '.') }}</td>
        </tr>
        <tr class="bg-gray-50 dark:bg-gray-600 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Registro SPC</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ $creditAnalysis->result->return_object->resultado->spc->resumo->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ 'R$ ' . number_format($creditAnalysis->result->return_object->resultado->spc->resumo->valorTotal ?? 0, 2, ',', '.') }}</td>
        </tr>
        <tr class="bg-white dark:bg-gray-700 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Informação do Poder Judiciário</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->informacaoPoderJudiciario)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->informacaoPoderJudiciario)->resumo)->valorTotal ?? '-' }}</td>
        </tr>
        <tr class="bg-gray-50 dark:bg-gray-600 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Cheques sem Fundos - CCF</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional($creditAnalysis->result->return_object->resultado)->chequeSemFundoVarejo)->resumo->quantidadeTotal ?? 0; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ 'R$ ' . number_format(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->chequeSemFundoVarejo)->resumo)->valorTotal ?? 0, 2, ',', '.') }}</td>
        </tr>
        <tr class="bg-white dark:bg-gray-700 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Consulta Realizada</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ $creditAnalysis->result->return_object->resultado->consultaRealizada->resumo->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consultaRealizada)->resumo)->valorTotal ?? '-' }}</td>
        </tr>
        <tr class="bg-gray-50 dark:bg-gray-600 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Contra Ordem</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->contraOrdem)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->contraOrdem)->resumo)->valorTotal ?? '-' }}</td>
        </tr>
        <tr class="bg-white dark:bg-gray-700 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Pendência Financeira Serasa</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional($creditAnalysis->result->return_object->resultado)->pendenciaFinanceira)->resumo->quantidadeTotal ?? 0; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->pendenciaFinanceira)->resumo)->valorTotal ?? '-' }}</td>
        </tr>
        <tr class="bg-gray-50 dark:bg-gray-600 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Contra Ordem Doc. Diferente do Consultado</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->contraOrdemDocumentoDiferente)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->contraOrdemDocumentoDiferente)->resumo)->valorTotal ?? '-' }}</td>
        </tr>
        <tr class="bg-white dark:bg-gray-700 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Credito Concedido</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->creditoConcedido)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->creditoConcedido)->resumo)->valorTotal ?? '-' }}</td>
        </tr>
        <tr class="bg-gray-50 dark:bg-gray-600 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Registro de Cheque Lojista</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->chequeLojista)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->chequeLojista)->resumo)->valorTotal ?? '-' }}</td>
        </tr>
        <tr class="bg-white dark:bg-gray-700 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Cheque Consulta Online SRS</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional($creditAnalysis->result->return_object->resultado)->chequeConsultaOnlineSrs)->resumo->quantidadeTotal ?? 0; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->chequeConsultaOnlineSrs)->resumo)->valorTotal ?? '-' }}</td>
        </tr>
        <tr class="bg-gray-50 dark:bg-gray-600 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Cheque Sem Fundo Varejo</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional($creditAnalysis->result->return_object->resultado)->chequeSemFundoVarejo)->resumo->quantidadeTotal ?? 0; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->chequeConsultaOnlineSrs)->resumo)->valorTotal ?? '-' }}</td>
        </tr>
        <tr class="bg-white dark:bg-gray-700 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Alerta Documento</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->alertaDocumento)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">-</td>
        </tr>

        <tr class="bg-gray-50 dark:bg-gray-600 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Alerta Identidade</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional($creditAnalysis->result->return_object->resultado)->alertaIdentidade)->resumo->quantidadeTotal ?? 0; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">-</td>
        </tr>

        <tr class="bg-white dark:bg-gray-700 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Telefone Vinculado Assinante Consultado</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->telefoneVinculadoAssinanteConsultado)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">-</td>
        </tr>

        <tr class="bg-gray-50 dark:bg-gray-600 dark:text-gray-50">
            <th class="border px-6 py-2 text-sm dark:text-gray-50  font-medium">Telefone Consultado</th>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->telefoneConsultado)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm dark:text-gray-50 ">-</td>
        </tr>

        </tbody>
    </table>
</div>
