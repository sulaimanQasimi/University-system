<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    <button {{$attributes->merge(['type'=>'button','class'=>'btn btn-primary d-print-inline'])}}>
        {{$slot}}
    </button>
</div>