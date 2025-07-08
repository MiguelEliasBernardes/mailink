<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm::px-6 lg:px-8 flex flex-col justify-center items-center gap-4">

            <x-breadcrumbs
                    :links="[
                        ['name' => 'Campanhas', 'url' => route('campaigns.index')],
                        ['name' => 'Criar Campanha']
                    ]"/>

            <div class="bg-white w-2/4 mx-auto gap-5 flex flex-col justify-center items-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-12">

                <div role="tablist" class="tabs tabs-box">
                    <a role="tab" class="tab" href="{{ route('campaigns.create') }}">Configurações</a>
                    <a role="tab" class="tab tab-active">Template</a>
                    <a role="tab" class="tab">Entrega</a>
                </div>

                <div class="min-h-52 m-10 w-11/12 px-6 border-2 py-4 rounded-lg ">
                        {!! $templates->content !!}
                </div>


                <div class="flex justify-between w-full px-10 items-center">
                    <x-link-button :href="route('campaigns.create')">
                        Voltar
                    </x-link-button>

                    <x-link-button :href="route('campaignDelivery',[$templates->id])" >
                        Salvar
                    </x-link-button>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
