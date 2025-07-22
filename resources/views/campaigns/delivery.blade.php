<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm::px-6 lg:px-8 flex flex-col justify-center items-center gap-4">

            <x-breadcrumbs
                    :links="[
                        ['name' => 'Campanhas', 'url' => route('campaigns.index')],
                        ['name' => 'Criar Campanha']
                    ]"/>

            <div class="bg-white w-3/4 mx-auto gap-5 flex flex-col justify-start items-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-12">

                <div role="tablist" class="tabs tabs-box">
                    <a role="tab" class="tab" href="{{ route('campaigns.create') }}">Configurações</a>
                    <a role="tab" class="tab" href="{{ redirect()->back() }}">Template</a>
                    <a role="tab" class="tab tab-active">Entrega</a>
                </div>

                <form action="{{ route('send.single.mail',[$campaign_id]) }}" class="w-3/4">
                    <label for="emailTest" class="font-inter">Testar a campanha</label>
                    <div class="flex justify-between">
                        <x-text-input class="w-3/4" type="email" name="emailTest" placeholder="Digite o email" />
                        <x-primary-button class="h-10 w-1/5 justify-center">
                            Enviar
                        </x-primary-button>
                    </div>
                </form>

                <div class="w-3/4 ">
                    <p>De: {{config('mail.from.address')}}</p>
                    <p>Para: <span>{{$campaign->emailList->email_users->count()}}</span></p>
                    <p>Assunto: <span>{{$campaign->subject}}</span></p>
                </div>

                <div class="w-3/4">
                    <p>Enviar: Agora</p>
                </div>

                <div class="w-3/4 flex justify-end gap-6">
                    <x-link-button>
                        Voltar
                    </x-link-button>

                    <x-link-button :href="route('send.mail',[
                        $campaign_id
                    ])" >
                        Disparar Campanha
                    </x-link-button>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
