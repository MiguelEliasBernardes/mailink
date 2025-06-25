<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm::px-6 lg:px-8">
            <div class="bg-white w-2/4 mx-auto gap-5 flex flex-col justify-center items-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-12">

                <x-breadcrumbs
                    :links="[
                        ['name' => 'Listas', 'url' => route('email-list.index')],
                        ['name' => 'Criar Lista']
                    ]"/>

                <div class="w-3/4">
                    <h3>Lista</h3>
                    <x-simple-text-input placeholder="Escolha um nome para a sua lista" />
                </div>

                <div class="w-3/4">
                    <h3>Lista de emails</h3>
                    <input type="file" class="file-input w-full" />
                </div>

                <div class="w-3/4 flex justify-end gap-5">
                    <x-secondary-button >
                        Voltar
                    </x-secondary-button>

                    <x-primary-button >
                        Salvar
                    </x-primary-button>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
