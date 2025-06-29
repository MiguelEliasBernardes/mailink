<x-app-layout>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm::px-6 lg:px-8">
            <div class="pt-10 bg-white w-3/4 mx-auto flex flex-col justify-center items-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <x-breadcrumbs
                    :links="[
                        ['name' => 'Templates', 'url' => route('templates.index')],
                        ['name' => 'Criar Template', 'url' => route('templates.create')],
                        ['name' => 'Editar Template']
                    ]"/>

                <x-form id="form-template" action="{{ route('templates.update', $id) }}" class="mt-10" patch>

                    <div class="w-3/4">
                        <h3>Nome</h3>

                        <x-simple-text-input id="edit-name" value="{{ $template->name }}" name="name" placeholder="Escolha um nome para o seu template" />
                    </div>

                    <div class="w-3/4 mt-4">
                        <h3>corpo (HTML)</h3>

                        <x-richtext :value="$template->content"  name="content" placeholder="Coloque alguma descrição..." >

                        </x-richtext>
                    </div>

                    <div class="w-3/4 flex justify-end gap-5 my-14">
                        <x-secondary-button :href="route('templates.index')">
                            Voltar
                        </x-secondary-button>

                        <x-primary-button >
                            Salvar
                        </x-primary-button>
                    </div>

                </x-form>
            </div>
        </div>
    </div>
</x-app-layout>
