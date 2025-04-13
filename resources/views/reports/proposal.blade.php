<!DOCTYPE html>
<html>
<head>
    <title>Relatório Customizado</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            font-size: 12px;
        }

        @page {
            margin-top: 150px;
            margin-bottom: 0px;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        header {
            position: fixed;
            top: -120px;
            left: 0px;
            right: 0px;
            text-align: center;
            line-height: 35px;
        }

        footer {
            position: fixed;
            bottom: -20px;
            left: 0px;
            right: 0px;
            height: 100px;
            text-align: right;
            line-height: 35px;
            margin-right: 10%;
        }

        .header, .footer {
            width: 100%;
            text-align: center;
            position: fixed;
        }

        .header {
            top: 0;
        }

        .header img {
            max-width: 200px;
            margin-bottom: 10px;
            margin-left: 10%;
        }

        .title {
            text-align: center;
            text-transform: uppercase;
        }

        .title {
            color: #294d92;
        }

        .title hr {
            border: 0;
            height: 1px;
            background: #294d92;
            margin: 0 auto;
            width: 80%;
        }

        .content {
            margin-top: 30px;
            margin-bottom: 50px;
            margin-right: 10%;
            margin-left: 10%;
            text-align: justify;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            page-break-inside: auto;
        }

        th {
            background-color: #294d92;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .footer {
            bottom: 0;
        }

        .footer .page-number:after {
            content: counter(page);
        }

        .footer p {
            font-size: 12px;
        }

        .signature {
            text-align: center;
            margin-top: 100px;
        }

        .signature .line {
            border-top: 1px solid #000;
            width: 200px;
            margin: 0 auto;
        }

        .signature p {
            margin: 5px 0 0 0;
        }
    </style>
</head>
<body>

<header>
    <img src="images/logo.png" alt="Logo" style="max-width: 200px; margin-bottom: 10px;">

</header>

<main>


<div class="title">
    <h2>TERMO DE ACEITE DA PROPOSTA</h2>
    <hr>
</div>
<div class="content">
    <p>
        Pelo presente termo, autorizamos a implementação e o início dos serviços conforme as condições descritas na proposta a seguir. A prestação do serviço e o respectivo faturamento deverão observar os dados indicados abaixo, em conformidade com a composição das consultas escolhida e o contrato apresentado.
    </p>

    <table>
        <thead>
        <tr>
            <th>Cliente</th>
            <th>CNPJ</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->cnpj }}</td>
        </tr>
        </tbody>
        <thead>
        <thead>
        <tr>
            <th>E-mail</th>
            <th>Telefone</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $client->email }}</td>
            <td>{{ $client->telephone }}</td>
        </tr>
        </tbody>
        <thead>
        <tr>
            <th colspan="4">Endereço</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="4">
                <b>Cep:</b> {{ $client->zipcode }} <br>
                <b>Logradouro:</b> {{ $client->street }}  {{ $client->number }} {{ $client->complement }} <br>
                <b>Cidade:</b> {{ $client->city }} <br>
                <b>Estado:</b> {{ $client->state }} <br>
                <b>Bairro:</b> {{ $client->district }} <br>
            </td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr>
            <th>Pacote</th>
        </thead>
    </table>

    <table>
        <thead>
        <tr>
            <th style="background-color: #f4f6fa; color: #294d92">Faturamento mínimo</th>
            <th style="background-color: #f4f6fa; color: #294d92">Software</th>
        </thead>
        <tbody>
        <tr>
            <td style="text-align: center;">R$ {{ number_format($client->plan->price, 2, ',', '.') }}
                ({{$client->plan->name}})
            </td>
            <td style="text-align: center;">R$ {{ number_format($client->monthly_fee, 2, ',', '.') }}</td>
        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr>
            <th>Produtos</th>
        </thead>
    </table>

    @foreach($client->productCustomer as $productCustomer)
        <table>
            <thead>
            <tr>
                <th style="background-color: #f4f6fa; color: #294d92">{{$productCustomer->name}}</th>
            </thead>
            <tbody>
            @foreach($productCustomer->products as $product)
                <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <b> {{$product->product->spc_code}} - {{$product->product->spc_name}} </b>
                            </td>
                            <td>
                                R$ {{ $product->price_consultant }}
                            </td>
                        </tr>

                        @foreach($product->optionals as $optional)
                            <tr>
                                <td>
                                    {{$optional->optional->spc_code}} - {{$optional->optional->spc_name}}
                                </td>
                                <td>
                                    R$ {{ $optional->price_consultant }}
                                </td>
                        @endforeach
                    </table>
                 </td>
            </tr>
            @endforeach
            <tr>
                <td style="text-align: center;">
                    R$ {{ number_format($productCustomer->price, 2, ',', '.') }}
                </td>
            </tr>
            </tbody>
        </table>
    @endforeach


    <table>
        <thead>
        <tr>
            <th>Usuários</th>
        </thead>
    </table>

    <table>
        <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>

        </thead>

        <tbody>
        @foreach($client->users as $user)
            <tr>
                <td>{{ $user->name }} </td>
                <td>{{ $user->cpf }} </td>
                <td>{{ $user->email }} </td>
                <td>{{ $user->telephone }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <table>
        <thead>
        <tr>
            <th> PROTEÇÃO DE DADOS (LGPD)</th>
        </thead>
    </table>
    Cientes do dever legal de cumprir a Lei Geral de Proteção de Dados Pessoais (Lei nº 13.709/2018 - LGPD) e demais legislações aplicáveis, garantindo que todos os dados pessoais coletados sejam tratados conforme as finalidades especificadas em contrato e com a devida segurança. Serão adotadas as medidas adequadas para proteger os dados contra acessos não autorizados e incidentes, notificando os titulares e as autoridades competentes quando necessário. Ainda, asseguramos que os colaboradores, parceiros e prestadores de serviços envolvidos no tratamento de dados pessoais são devidamente instruídos e comprometidos com o cumprimento das normas de proteção de dados, estando sujeitos a cláusulas de confidencialidade e responsabilidade. Ao término do contrato, os dados serão eliminados ou anonimizados, salvo obrigação legal em contrário.

</div>
<div class="signature">
    <div class="line"></div>
    <p>{{ $client->name }}</p>
    <p>{{ $client->cnpj }}</p>
    <p>Representante Legal: </p>
</div>
</main>
<footer>
    <img src="{{ asset('images/regua_spc_trans.png') }}" alt="Logo"  height="50px">
</footer>

</body>
</html>
