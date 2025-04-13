<div>
    <table class="table-auto w-full shadow-md rounded-lg border border-gray-200">
        <thead class="bg-gray-400">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-50 uppercase tracking-wider">
                Descrição
            </th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-50 uppercase tracking-wider">
                Quantidade
            </th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-50 uppercase tracking-wider">
                Valor
            </th>
        </tr>
        </thead>
        <tbody class="bg-white">

        <tr class="bg-gray-100">
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Protesto</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional($creditAnalysis->result->return_object->resultado)->protesto)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional($creditAnalysis->result->return_object->resultado)->protesto)->resumo)->valorTotal ?? 0; }}</td>
        </tr>
        <tr>
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Registro SPC</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ $creditAnalysis->result->return_object->resultado->spc->resumo->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ $creditAnalysis->result->return_object->resultado->spc->resumo->valorTotal ?? 0; }}</td>
        </tr>
        <tr class="bg-gray-100">
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Informação do Poder Judiciário</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->informacaoPoderJudiciario)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->informacaoPoderJudiciario)->resumo)->valorTotal ?? '-'  }}
            </td>
        </tr>
        <tr>
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Cheques sem Fundos - CCF</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional($creditAnalysis->result->return_object->resultado)->chequeSemFundoVarejo)->resumo->quantidadeTotal ?? 0; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->chequeSemFundoVarejo)->resumo)->valorTotal ?? '-'  }}</td>
        </tr>
        <tr class="bg-gray-100">
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Consulta Realizada</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ $creditAnalysis->result->return_object->resultado->consultaRealizada->resumo->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consultaRealizada)->resumo)->valorTotal ?? '-'  }}</td>
        </tr>
        <tr>
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Contra Ordem</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->contraOrdem)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->contraOrdem)->resumo)->valorTotal ?? '-'  }}</td>
        </tr>
        <tr class="bg-gray-100">
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Pendência Financeira Serasa</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional($creditAnalysis->result->return_object->resultado)->pendenciaFinanceira)->resumo->quantidadeTotal ?? 0; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">
                {{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->pendenciaFinanceira)->resumo)->valorTotal ?? '-'  }}
            </td>
        </tr>
        <tr>
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Contra Ordem Doc. Diferente do Consultado</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->contraOrdemDocumentoDiferente)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->contraOrdemDocumentoDiferente)->resumo)->valorTotal ?? '-'  }}</td>
        </tr>
        <tr class="bg-gray-100">
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Credito Concedido</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->creditoConcedido)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->creditoConcedido)->resumo)->valorTotal ?? '-'  }}</td>
        </tr>
        <tr>
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Registro de Cheque Lojista</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->chequeLojista)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->chequeLojista)->resumo)->valorTotal ?? '-'  }}</td>
        </tr>
        <tr class="bg-gray-100">
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Cheque Consulta Online SRS</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional($creditAnalysis->result->return_object->resultado)->chequeConsultaOnlineSrs)->resumo->quantidadeTotal ?? 0; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->chequeConsultaOnlineSrs)->resumo)->valorTotal ?? '-'  }}</td>
        </tr>
        <tr>
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Cheque Sem Fundo Varejo</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional($creditAnalysis->result->return_object->resultado)->chequeSemFundoVarejo)->resumo->quantidadeTotal ?? 0; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->chequeConsultaOnlineSrs)->resumo)->valorTotal ?? '-'  }}</td>
        </tr>
        <tr class="bg-gray-100">
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Alerta Documento</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->alertaDocumento)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">-</td>
        </tr>

        <tr class="bg-gray-100">
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Alerta Identidade</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional($creditAnalysis->result->return_object->resultado)->alertaIdentidade)->resumo->quantidadeTotal ?? 0; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">-</td>
        </tr>

        <tr>
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Telefone Vinculado Assinante Consultado</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->telefoneVinculadoAssinanteConsultado)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">-</td>
        </tr>
        <tr class="bg-gray-100">
            <th class="border px-6 py-2 text-sm font-medium text-gray-900">Telefone Consultado</th>
            <td class="border px-6 py-2 text-sm text-gray-500">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->telefoneConsultado)->resumo)->quantidadeTotal; }}</td>
            <td class="border px-6 py-2 text-sm text-gray-500">-</td>
        </tr>
        </tbody>
    </table>
</div>
