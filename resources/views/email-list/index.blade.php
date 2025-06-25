<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm::px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @forelse ( $emailLists as $list )

                        // fazer a lista das listas

                    @empty

                        <div class="flex flex-col gap-10 justify-center items-center">

                            <x-card-skeleton>
                            </x-card-skeleton>

                            <div class="flex flex-col gap-4">
                                <p class="font-inter">Nenhuma lista cadastrada.</p>

                                <x-link-button :href="route('email-list.create')">
                                    {{ "Criar Lista" }}
                                </x-link-button>
                            </div>


                        </div>


                    @endforelse

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
