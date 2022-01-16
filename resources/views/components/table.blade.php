<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    <table {{ $attributes->merge(['class' => 'table table-bordered table table-head-fixed text-wrap d-print-table shadow-xl']) }}>
        {{$slot}}
    </table>
</div>