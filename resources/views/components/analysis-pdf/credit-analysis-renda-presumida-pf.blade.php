<div  class="mt-3">
    <?php
    $bgColor = '#bbdefb';
    ?>
    <div style="background-color: {{$bgColor}}; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b>Renda Presumida PF</b>
    </div>
    <div x-show="open" x-collapse class="p-5">
        <div class="flex justify-between space-x-4">
            <div class="w-1/3 p-4 bg-blue-100 shadow-md rounded-md">
                <h2 class="text-center text-xl font-bold mb-4">Renda Mínima</h2>
                <div class="border border-gray-300 p-4 text-center bg-white rounded-md">
                    <p class="text-2xl font-bold text-blue-800">R$ {{ number_format(optional($creditAnalysis->result->return_object->resultado->insumoRendaPresumidaPF->detalheInsumoRendaPresumidaPF[0])->rendaMinima ?? 0, 2, ',', '.') }}</p>
                </div>
            </div>
            <div class="w-1/3 p-4 bg-green-100 shadow-md rounded-md">
                <h2 class="text-center text-xl font-bold mb-4">Renda Mediana</h2>
                <div class="border border-gray-300 p-4 text-center bg-white rounded-md">
                    <p class="text-2xl font-bold text-green-800">R$ {{ number_format(optional($creditAnalysis->result->return_object->resultado->insumoRendaPresumidaPF->detalheInsumoRendaPresumidaPF[0])->rendaMediana ?? 0, 2, ',', '.') }}</p>
                </div>
            </div>
            <div class="w-1/3 p-4 bg-red-100 shadow-md rounded-md">
                <h2 class="text-center text-xl font-bold mb-4">Renda Máxima</h2>
                <div class="border border-gray-300 p-4 text-center bg-white rounded-md">
                    <p class="text-2xl font-bold text-red-800">R$ {{ number_format(optional($creditAnalysis->result->return_object->resultado->insumoRendaPresumidaPF->detalheInsumoRendaPresumidaPF[0])->rendaMaxima ?? 0, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
