<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm::px-6 lg:px-8 flex flex-col items-center">

            <x-breadcrumbs
                    :links="[
                        ['name' => 'Listas', 'url' => route('email-list.index')],
                        ['name' => 'Criar Lista']
                    ]"/>

            <div class="bg-white w-2/4 mt-4 mx-auto gap-5 flex flex-col justify-center items-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-12">

                <x-form action="{{route('email-list.store')}}" post>

                    <div class="w-3/4">
                        <h3>Lista</h3>

                        <x-simple-text-input name="name" placeholder="Escolha um nome para a sua lista" />
                    </div>

                    <div class="w-3/4 mt-4">
                        <h3>Lista de emails</h3>
                        <input name="csv" type="file" class="file-input w-full" />
                    </div>

                    <div class="w-3/4 flex justify-end gap-5 mt-6">
                        <x-secondary-button :href="route('email-list.index')">
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
