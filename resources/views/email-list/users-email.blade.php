<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm::px-6 lg:px-8">
            <div class="bg-white w-3/4 mx-auto gap-5 flex flex-col justify-center items-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-12">

                <x-breadcrumbs
                    :links="[
                        ['name' => 'Listas', 'url' => route('email-list.index')],
                        ['name' => 'Criar Lista', 'url' => route('email-list.create')],
                        ['name' => 'Clientes importados']
                    ]"/>

                <section class="w-3/4 flex flex-col gap-10">

                    <div class="flex justify-between">
                        <x-link-button :href="route('email-list.create')" class="w-2/5">
                            Criar Lista
                        </x-link-button>

                        <x-simple-text-input placeholder="Pesquisar" class="w-3/6"  />
                    </div>

                    <div>

                        <ul class="list bg-base-100 rounded-box shadow-md">

                            <li class="p-4 pb-2 text-xs opacity-60 tracking-wide">Clientes Importados</li>

                            @foreach ($customers as $customer)
                                <li class="list-row flex justify-between">
                                    <div>
                                        <div>{{ $customer['name'] }}</div>
                                        <div class="text-xs uppercase font-semibold opacity-60">{{ $customer['email'] }}</div>
                                    </div>

                                    <div>
                                        <button class="btn btn-square btn-ghost">
                                        <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor"><path d="M6 3L20 12 6 21 6 3z"></path></g></svg>
                                        </button>
                                        <button class="btn btn-square btn-ghost">
                                        <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path></g></svg>
                                        </button>
                                    </div>
                                </li>
                            @endforeach

                        </ul>

                    </div>

                    <div>
                        {{ $customers->appends(['email_list_id' => $list])->links() }}
                    </div>


                </section>

            </div>
        </div>
    </div>

</x-app-layout>
