<div style="margin-top: 15px;">
    <div style="background-color: #bbdefb; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b style="display: flex; justify-content: space-between; align-items: center;">
            Renda Presumida SPC
        </b>
    </div>
    <div style="background-color: #ffffff; padding: 20px;">
        <div style="display: flex; justify-content: space-between; gap: 16px;">
            <div style="width: 33%; padding: 16px; background-color: #d4edda; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); border-radius: 8px; margin: 0 auto;">
                <h2 style="text-align: center; font-size: 20px; font-weight: bold; margin-bottom: 16px;">Mediana</h2>
                <div style="border: 1px solid #d1d5db; padding: 16px; text-align: center; background-color: #ffffff; border-radius: 8px;">
                    <p style="font-size: 24px; font-weight: bold; color: #155724;">
                        {{ number_format(optional(optional($creditAnalysis->result->return_object->resultado->rendaPresumidaSpc)[0] ?? 0)->mediana ?? 0, 2, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
