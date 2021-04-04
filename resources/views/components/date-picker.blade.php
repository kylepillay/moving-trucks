<style>
    .pika-single {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: transparent;
        border: none;
        margin-left: 2.5rem;
        margin-right: 0;
        margin-top: 0;
        width: 100%
    }
    .pika-lendar {
        background-color: white;
        border-radius: 10px;
        padding: 18px;
        flex: 1;
        width: 100%;
        margin-right: 0;
        margin-top: 0;
    }
</style>

<input
    x-data="{ liveUpdate: false, picker: null, livewireData: @entangle('quoteRequest.requested_date') }"
    x-ref="input"
    x-init="picker = new Pikaday({ field: $refs.input, keyboardInput: false, bound: false, format: 'MMMM Do YYYY', onSelect: (date) => { if (picker.toString() && (picker.toString() === livewireData)) { return; } let element = document.getElementById($el.getAttribute('hidden_element')); element.value = picker.toString(); element.dispatchEvent(new Event('change')) } } ); if (livewireData && !picker.getDate()) { picker.setDate(livewireData) }"
    type="text"
    class="hidden"
    {{ $attributes }}
>

<script>
    function pickerData() {
        return {
            picker: null,
            hiddenElement: null
        }
    }
</script>