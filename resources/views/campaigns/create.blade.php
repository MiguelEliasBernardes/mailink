<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm::px-6 lg:px-8">
            <div class="bg-white w-2/4 mx-auto gap-5 flex flex-col justify-center items-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-12">

                <x-breadcrumbs
                    :links="[
                        ['name' => 'Campanhas', 'url' => route('campaigns.index')],
                        ['name' => 'Criar Campanha']
                    ]"/>

                <x-form action="{{route('campaigns.store')}}" post>

                    <div class="w-3/4">
                        <h3>Nome</h3>

                        <x-simple-text-input name="name" placeholder="Escolha um nome para a sua campanha" />
                    </div>

                    <div class="w-3/4 mt-4">
                        <h3>Assunto do e-mail</h3>

                        <x-simple-text-input name="subject" placeholder="Digite o assunto do email" />
                    </div>

                    <div class="w-3/4 mt-4">
                        <h3>Selecione uma lista</h3>

                        <x-dropdown-basic :itens=" $email_lists" />
                    </div>

                    <div class="w-3/4 mt-4">
                        <h3>Selecione um template</h3>

                        <x-dropdown-basic :itens=" $templates" />
                    </div>

                    <div class="w-3/4 mt-4">
                        <h3>Rastrear email quando:</h3>

                        <input type="checkbox" name="link-verified"  />
                        <input type="checkbox" name="email-verified"  />

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
