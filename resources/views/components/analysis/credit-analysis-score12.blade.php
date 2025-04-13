<div x-data="{ openScore: false }" class="grid gap-4 mt-3">
    <h2>
        <button @click="openScore = !openScore"
                class="text-lg text-left w-full flex justify-between items-center p-3  rounded shadow bg-sky-300 hover:bg-sky-150 text-gray-800">
            <b>{{ $scoreTitle }}</b>
            <svg :class="{'rotate-180': openScore}" class="h-6 w-6 transform transition-transform" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </h2>
    <div x-show="openScore" x-collapse class="bg-gray-100 p-5 rounded-lg shadow">
        @include('components.analysis.credit-analysis-resumo-score')
    </div>
</div>
