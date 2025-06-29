@props(['name' => 'content', 'disabled' => false, 'value' => false])
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
@endpush

@push('styles')
<style>

.ql-toolbar,
.ql-container {
    border: none !important;
    background-color: transparent !important;
}

.ql-editor {
    background-color: transparent !important;
    color: white !important;
    padding: 0.5rem !important;
    border: none !important;
}

.ql-toolbar button {
    color: #ccc !important;
}

.ql-toolbar:focus,
.ql-container:focus,
.ql-editor:focus {
    outline: none !important;
    box-shadow: none !important;
}
</style>
@endpush

<div x-data="{
    value: '{{ $value }}',
    init(){
        let quill = new Quill(this.$refs.quill, {theme: 'snow'})
        quill.root.innerHTML = this.value
        quill.on('text-change', () => this.value = quill.root.innerHTML )
    },
}" class="min-h-40 textarea w-full">
    <input type="hidden" name="{{ $name }}" x-model="value"/>
    <div x-ref="quill" class="!bg-transparent !border-none !p-0" id="edit-content"></div>

</div>
