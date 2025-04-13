<!-- resources/views/credit_analysis_report.blade.php -->
<div>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        .bg-gray-200 {
            background-color: #e5e7eb; /* Cor do cabeçalho */
        }
        .bg-gray-100 {
            background-color: #f9fafb; /* Cor das células */
        }
    </style>

    <table>
        <thead>
        <tr>
            <th colspan="2" class="bg-gray-200">Dados do Consumidor</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>Titulo de Eleitor:</th>
            <td>{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->numeroTituloEleitor ?: 'N/A' }}</td>
        </tr>
        <tr>
            <th>Nome:</th>
            <td>{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->nome }}</td>
        </tr>
        <tr>
            <th>Nascimento:</th>
            <td>{{ date('d/m/Y', optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->dataNascimento / 1000) }}</td>
        </tr>
        <tr>
            <th>Idade:</th>
            <td>{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->idade }}</td>
        </tr>
        <tr>
            <th>Signo:</th>
            <td>{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->signo }}</td>
        </tr>
        <tr>
            <th>Sexo:</th>
            <td>{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->sexo }}</td>
        </tr>
        <tr>
            <th>Nome da Mãe:</th>
            <td>{{ optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->nomeMae ?: 'N/A' }}</td>
        </tr>
        <tr>
            <th colspan="2" class="bg-gray-200">CPF</th>
        </tr>
        <tr>
            <th>Documento:</th>
            <td>{{ optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->cpf)->numero }}</td>
        </tr>
        <tr>
            <th>Região de origem:</th>
            <td>{{ optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->cpf)->regiaoOrigem }}</td>
        </tr>
        <tr>
            <th colspan="2" class="bg-gray-200">Endereço</th>
        </tr>
        <tr>
            <th>Logradouro:</th>
            <td>{{ optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->endereco)->logradouro }}</td>
        </tr>
        <tr>
            <th>Complemento:</th>
            <td>{{ optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->endereco)->numero }},
                {{ optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->endereco)->complemento }}</td>
        </tr>
        <tr>
            <th>Cep:</th>
            <td>{{ optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->endereco)->cep }}</td>
        </tr>
        <tr>
            <th>Cidade / UF:</th>
            <td>{{ optional(optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->endereco)->cidade)->nome }}
                / {{ optional(optional(optional(optional(optional(optional(optional(optional(optional($creditAnalysis)->result)->return_object)->resultado)->consumidor)->consumidorPessoaFisica)->endereco)->cidade)->estado)->siglaUf }}</td>
        </tr>
        </tbody>
    </table>
</div>
