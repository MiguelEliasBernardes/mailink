<x-form id="form-template" action="/templates" patch>

    <div class="w-3/4">
        <h3>Nome</h3>

        <x-simple-text-input id="edit-name" name="name" placeholder="Escolha um nome para o seu template" />
    </div>

    <div class="w-3/4 mt-4">
        <h3>corpo (HTML)</h3>

        <x-richtext name="content" placeholder="Coloque alguma descrição..." >

        </x-richtext>
    </div>

    <div class="w-3/4 flex justify-end gap-5 mt-14">
        <x-secondary-button :href="route('templates.index')">
            Voltar
        </x-secondary-button>

        <x-primary-button >
            Salvar
        </x-primary-button>
    </div>

</x-form>

