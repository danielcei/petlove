<div  class="mt-3">
    <?php
    $bgColor = '#bbdefb';
    ?>
    <div style="background-color: {{$bgColor}}; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); cursor: pointer;">
        <b>{{ $scoreTitle }}</b>
    </div>
    <div x-show="open" x-collapse class="p-5">
        @include('components.analysis.credit-analysis-resumo-score')
    </div>
</div>
