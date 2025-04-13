<div x-data="{ open: false }" class="mt-3">
    <div style="background-color: #bbdefb; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b style="display: flex; justify-content: space-between; align-items: center;">
            Identificação
        </b>
    </div>
    <div
        style="background-color: #ffffff; padding: 20px;">
        <div>
            <table class="w-full mt-2 border-collapse border border-gray-300">
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100">Nome Comercial:</th>
                    <td class="px-6 py-2 text-sm text-gray-500">{{ optional($consumidor->consumidorPessoaJuridica)->nomeComercial ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100">Razão Social:</th>
                    <td class="px-6 py-2 text-sm text-gray-500">{{ optional($consumidor->consumidorPessoaJuridica)->razaoSocial ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100">CNPJ:</th>
                    <td class="px-6 py-2 text-sm text-gray-500">{{ optional($consumidor->consumidorPessoaJuridica)->cnpj->numero ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100">Situação CNPJ:</th>
                    <td class="px-6 py-2 text-sm text-gray-500">{{ optional(optional($consumidor->consumidorPessoaJuridica)->situacaoCnpj)->descricaoSituacao ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100">Data da Situação CNPJ:</th>
                    <td class="px-6 py-2 text-sm text-gray-500">{{ \Carbon\Carbon::createFromTimestampMs(optional(optional($consumidor->consumidorPessoaJuridica)->situacaoCnpj)->dataSituacao ?: 0)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100">Endereço:</th>
                    <td class="px-6 py-2 text-sm text-gray-500">
                        {{ optional(optional($consumidor->consumidorPessoaJuridica)->endereco)->logradouro ?: 'N/A' }},
                        {{ optional(optional($consumidor->consumidorPessoaJuridica)->endereco)->numero ?: 'N/A' }},
                        {{ optional(optional($consumidor->consumidorPessoaJuridica)->endereco)->complemento ?: 'N/A' }},
                        {{ optional(optional($consumidor->consumidorPessoaJuridica)->endereco)->bairro ?: 'N/A' }},
                        CEP: {{ optional(optional($consumidor->consumidorPessoaJuridica)->endereco)->cep ?: 'N/A' }}
                    </td>
                </tr>

                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100">Natureza Jurídica:</th>
                    <td class="px-6 py-2 text-sm text-gray-500">{{ optional(optional($consumidor->consumidorPessoaJuridica)->naturezaJuridica)->descricao ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100">Código Natureza Jurídica:</th>
                    <td class="px-6 py-2 text-sm text-gray-500">{{ optional(optional($consumidor->consumidorPessoaJuridica)->naturezaJuridica)->codigo ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100">Atividade Econômica Principal:</th>
                    <td class="px-6 py-2 text-sm text-gray-500">{{ optional(optional($consumidor->consumidorPessoaJuridica)->atividadeEconomicaPrincipal)->descricao ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100">Código Atividade Econômica Principal:</th>
                    <td class="px-6 py-2 text-sm text-gray-500">{{ optional(optional($consumidor->consumidorPessoaJuridica)->atividadeEconomicaPrincipal)->codigo ?: 'N/A' }}</td>
                </tr>
                @if (isset($consumidor->consumidorPessoaJuridica->atividadeEconomicaSecundaria) && count($consumidor->consumidorPessoaJuridica->atividadeEconomicaSecundaria) > 0)
                    <tr>
                        <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100"
                            rowspan="{{ count($consumidor->consumidorPessoaJuridica->atividadeEconomicaSecundaria) }}">
                            Atividades Econômicas Secundárias:
                        </th>
                        @foreach ($consumidor->consumidorPessoaJuridica->atividadeEconomicaSecundaria as $index => $atividade)
                            @if ($index > 0)
                    </tr>
                    <tr>
                        @endif
                        <td class="px-6 py-2 text-sm text-gray-500">{{ $atividade->descricao }}({{ $atividade->codigo }})</td>
                        @endforeach
                    </tr>
                @endif
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100">Data de Fundação:</th>
                    <td class="px-6 py-2 text-sm text-gray-500">{{ \Carbon\Carbon::createFromTimestampMs(optional($consumidor->consumidorPessoaJuridica)->dataFundacao ?: 0)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100">E-mail:</th>
                    <td class="px-6 py-2 text-sm text-gray-500">{{ optional($consumidor->consumidorPessoaJuridica)->email ?: 'N/A' }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
