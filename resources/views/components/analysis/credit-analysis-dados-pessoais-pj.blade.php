<?php
$bgColor = 'bg-sky-300 hover:bg-sky-150 text-gray-800';
?>

<div x-data="{ open: false }" class="mt-3">
    <h2>
        <button @click="open = !open"
                class="text-lg text-left w-full flex justify-between items-center p-3 rounded shadow {{$bgColor}}">
            <b>Identificação</b>
            <svg :class="{'rotate-180': open}" class="h-6 w-6 transform transition-transform" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </h2>
    <div x-show="open" x-collapse class="bg-gray-100 p-5 rounded-lg shadow dark:bg-gray-800">
        <div>
            <table class="w-full mt-2 border-collapse border border-gray-300 dark:border-gray-600">
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-600">
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-gray-200">Nome Comercial:</th>
                    <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-200">{{ optional($consumidor->consumidorPessoaJuridica)->nomeComercial ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-gray-200">Razão Social:</th>
                    <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-200">{{ optional($consumidor->consumidorPessoaJuridica)->razaoSocial ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-gray-200">CNPJ:</th>
                    <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-200">{{ optional($consumidor->consumidorPessoaJuridica)->cnpj->numero ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-gray-200">Situação CNPJ:</th>
                    <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-200">{{ optional(optional($consumidor->consumidorPessoaJuridica)->situacaoCnpj)->descricaoSituacao ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-gray-200">Data da Situação CNPJ:</th>
                    <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-200">{{ \Carbon\Carbon::createFromTimestampMs(optional(optional($consumidor->consumidorPessoaJuridica)->situacaoCnpj)->dataSituacao ?: 0)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-gray-200">Endereço:</th>
                    <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-200">
                        {{ optional(optional($consumidor->consumidorPessoaJuridica)->endereco)->logradouro ?: 'N/A' }},
                        {{ optional(optional($consumidor->consumidorPessoaJuridica)->endereco)->numero ?: 'N/A' }},
                        {{ optional(optional($consumidor->consumidorPessoaJuridica)->endereco)->complemento ?: 'N/A' }},
                        {{ optional(optional($consumidor->consumidorPessoaJuridica)->endereco)->bairro ?: 'N/A' }},
                        CEP: {{ optional(optional($consumidor->consumidorPessoaJuridica)->endereco)->cep ?: 'N/A' }}
                    </td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-gray-200">Natureza Jurídica:</th>
                    <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-200">{{ optional(optional($consumidor->consumidorPessoaJuridica)->naturezaJuridica)->descricao ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-gray-200">Código Natureza Jurídica:</th>
                    <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-200">{{ optional(optional($consumidor->consumidorPessoaJuridica)->naturezaJuridica)->codigo ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-gray-200">Atividade Econômica Principal:</th>
                    <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-200">{{ optional(optional($consumidor->consumidorPessoaJuridica)->atividadeEconomicaPrincipal)->descricao ?: 'N/A' }}</td>
                </tr>
                @if (isset($consumidor->consumidorPessoaJuridica->atividadeEconomicaSecundaria) && count($consumidor->consumidorPessoaJuridica->atividadeEconomicaSecundaria) > 0)
                    <tr>
                        <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-gray-200" rowspan="{{ count($consumidor->consumidorPessoaJuridica->atividadeEconomicaSecundaria) }}">Atividades Econômicas Secundárias:</th>
                        @foreach ($consumidor->consumidorPessoaJuridica->atividadeEconomicaSecundaria as $index => $atividade)
                            @if ($index > 0)
                    </tr><tr>
                        @endif
                        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-200">{{ $atividade->descricao }} ({{ $atividade->codigo }})</td>
                        @endforeach
                    </tr>
                @endif
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-gray-200">Data de Fundação:</th>
                    <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-200">{{ \Carbon\Carbon::createFromTimestampMs(optional($consumidor->consumidorPessoaJuridica)->dataFundacao ?: 0)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th class="px-6 py-2 text-sm font-medium text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-gray-200">E-mail:</th>
                    <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-200">{{ optional($consumidor->consumidorPessoaJuridica)->email ?: 'N/A' }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
