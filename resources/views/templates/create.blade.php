<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm::px-6 lg:px-8 flex flex-col items-center">

            <x-breadcrumbs
                    :links="[
                        ['name' => 'Templates', 'url' => route('templates.index')],
                        ['name' => 'Criar Template']
                    ]"/>

            <div class="bg-white mt-4 w-2/4 mx-auto gap-5 flex flex-col justify-center items-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-12">



                <x-form action="{{route('templates.store')}}" post>

                    <div class="w-3/4">
                        <h3>Nome</h3>

                        <x-simple-text-input name="name" placeholder="Escolha um nome para o seu template" />
                    </div>

                    <div class="w-3/4 mt-4">
                        <h3>corpo (HTML)</h3>

                        <x-richtext  name="content" placeholder="Coloque alguma descrição..." >

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

            </div>
        </div>
    </div>

</x-app-layout>
