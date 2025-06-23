<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Email List") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm::px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @forelse ( $emailLists as $list )

                        // fazer a lista das listas

                    @empty

                        <div class="flex justify-center">
                            <x-link-button :href="route('email-list.create')">

                        { __("Create your firts email list") }

                            </x-link-button>
                        </div>


                    @endforelse

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
