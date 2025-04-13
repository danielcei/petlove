<div class="mt-3">
        <div
            style="background-color: #bbdefb; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;"
            @click="open = !open">
            <b style="display: flex; justify-content: space-between; align-items: center;">
                Identificação
            </b>
        </div>
        <div style="background-color: #ffffff; padding: 20px;">
            <div>
                @include('components.analysis-pdf.credit-analysis-dados-pessoais-table')
            </div>
        </div>
</div>
