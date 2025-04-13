<div>
    <div>
        <style>
            div.chart_div table {
                width: auto;
                margin: 0 auto !important;
            }
        </style>
        <!-- ApexCharts Graph -->
        <x-filament::card>
            <div class="flex justify-center items-center">
                <h2 class="text-center text-xl font-bold mb-4"><?= $scoreTitle ?></h2><br>
                <div id="chart_score_resumo{{$scoreType}}"></div>
            </div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {'packages': ['gauge']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Label', 'Value'],
                        ['', <?php echo $detalheSpcScore12Meses->score; ?>],
                    ]);

                    var options = {
                        height: 300,
                        redFrom: 0, redTo: 399,
                        yellowFrom: 400, yellowTo: 700,
                        greenFrom: 701, greenTo: 1000,
                        minorTicks: 5,
                        max: 1000,
                    };

                    var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

                    chart.draw(data, options);
                }
            </script>
            <div id="container">
                <div id="chart_div" align='center'></div>
            </div>

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-50">
                        Classe
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-50">
                        Horizonte
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-50">
                        Score
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-50">
                        Tipo
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-200">
                        {{ $detalheSpcScore12Meses->classe ?? "-" }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-200">
                        {{ $detalheSpcScore12Meses->horizonte ?? "-" }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-200">
                        {{ $detalheSpcScore12Meses->score ?? "-" }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-200">
                        {{ $detalheSpcScore12Meses->tipoClienteScore ?? "-" }}
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="px-6 py-4 text-sm text-gray-500 dark:text-gray-200">
                        {{ $detalheSpcScore12Meses->mesagemInterpretativaScore ?? "" }}
                        {{ $detalheSpcScore12Meses->mesagemInterpretativaProbabilidade ?? "" }}
                    </td>
                </tr>
                </tbody>
            </table>
        </x-filament::card>
    </div>
</div>
