<!-- resources/views/score_report.blade.php -->
<style>
    div.chart_div table {
        width: auto;
        margin: 0 auto !important;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th, .table td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }
    .table th {
        background-color: #f0f0f0;
    }
</style>
<div class="mt-3">
    <?php
    $bgColor = '#bbdefb';

    ?>

    <div
        style="background-color: {{$bgColor}}; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b>{{ $scoreTitle }}</b>
    </div>
    <div class="p-5">
        <img src="https://quickchart.io//chart?v=2.9.4&c=%7B%0A%20%20type%3A%20%27gauge%27%2C%0A%20%20data%3A%20%7B%0A%20%20%20%20datasets%3A%20%5B%0A%20%20%20%20%20%20%7B%0A%20%20%20%20%20%20%20%20value%3A%20{{ $detalheSpcScore12Meses->score }}%2C%0A%20%20%20%20%20%20%20%20data%3A%20%5B300%2C%20700%2C%201000%5D%2C%0A%20%20%20%20%20%20%20%20backgroundColor%3A%20%5B%27green%27%2C%20%27orange%27%2C%20%27red%27%5D%2C%0A%20%20%20%20%20%20%20%20borderWidth%3A%202%2C%0A%20%20%20%20%20%20%7D%2C%0A%20%20%20%20%5D%2C%0A%20%20%7D%2C%0A%20%20options%3A%20%7B%0A%20%20%20%20valueLabel%3A%20%7B%0A%20%20%20%20%20%20fontSize%3A%2022%2C%0A%20%20%20%20%20%20backgroundColor%3A%20%27transparent%27%2C%0A%20%20%20%20%20%20color%3A%20%27%23000%27%2C%0A%20%20%20%20%20%20formatter%3A%20function%20(value%2C%20context)%20%7B%0A%20%20%20%20%20%20%20%20return%20value%20%2B%20%27%20SCORE%27%3B%0A%20%20%20%20%20%20%7D%2C%0A%20%20%20%20%20%20bottomMarginPercentage%3A%2010%2C%0A%20%20%20%20%7D%2C%0A%20%20%7D%2C%0A%7D"
             style="display: block; margin: 0 auto;"/>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Classe</th>
            <th>Horizonte</th>
            <th>Score</th>
            <th>Tipo</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $detalheSpcScore12Meses->classe ?? "-" }}</td>
            <td>{{ $detalheSpcScore12Meses->horizonte ?? "-" }}</td>
            <td>{{ $detalheSpcScore12Meses->score ?? "-" }}</td>
            <td>{{ $detalheSpcScore12Meses->tipoClienteScore ?? "-" }}</td>
        </tr>
        <tr>
            <td colspan="4">{{ $detalheSpcScore12Meses->mesagemInterpretativaScore ?? "" }} {{ $detalheSpcScore12Meses->mesagemInterpretativaProbabilidade ?? "" }}</td>
        </tr>
        </tbody>
    </table>
</>
