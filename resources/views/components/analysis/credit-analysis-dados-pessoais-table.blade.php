<table class="w-full mt-2 border-collapse border border-gray-300 dark:border-gray-700">
    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
    <tr>
        <th class="px-6 py-2 text-sm font-medium text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-700">Título de Eleitor:</th>
        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-400 text-left">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->numeroTituloEleitor ?: 'N/A' }}</td>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-medium text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-700">Nome:</th>
        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-400 text-left">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->nome }}</td>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-medium text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-700">Nascimento:</th>
        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-400 text-left">{{ date('d/m/Y', optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->dataNascimento / 1000) }}</td>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-medium text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-700">Idade:</th>
        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-400 text-left">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->idade }}</td>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-medium text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-700">Signo:</th>
        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-400 text-left">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->signo }}</td>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-medium text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-700">Sexo:</th>
        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-400 text-left">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->sexo }}</td>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-medium text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-700">Nome da Mãe:</th>
        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-400 text-left">{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->nomeMae ?: 'N/A' }}</td>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-semibold text-gray-900 dark:text-gray-200 bg-gray-200 dark:bg-gray-800" colspan="2">CPF</th>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-medium text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-700">Documento:</th>
        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-400 text-left">{{ optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->cpf)->numero }}</td>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-medium text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-700">Região de origem:</th>
        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-400 text-left">{{ optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->cpf)->regiaoOrigem }}</td>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-semibold text-gray-900 dark:text-gray-200 bg-gray-200 dark:bg-gray-800" colspan="2">Endereço</th>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-medium text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-700">Logradouro:</th>
        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-400 text-left">{{ optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->endereco)->logradouro }}</td>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-medium text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-700">Complemento:</th>
        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-400 text-left">{{ optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->endereco)->numero }},
            {{ optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->endereco)->complemento }}</td>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-medium text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-700">Cep:</th>
        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-400 text-left">{{ optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->endereco)->cep }}</td>
    </tr>
    <tr>
        <th class="px-6 py-2 text-sm font-medium text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-700">Cidade / UF:</th>
        <td class="px-6 py-2 text-sm text-gray-500 dark:text-gray-400 text-left">{{ optional(optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->endereco)->cidade)->nome }}
            {{ optional(optional(optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->endereco)->cidade)->estado)->siglaUf }}</td>
    </tr>
    </tbody>
</table>
