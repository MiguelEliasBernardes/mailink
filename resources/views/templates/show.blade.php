<x-app-layout>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm::px-6 lg:px-8">
            <div class="pt-10 bg-white w-3/4 mx-auto flex flex-col justify-center items-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex justify-between w-full px-10 items-center">
                    <h3 class="text-2xl font-bold font-inter">Nome: <span class="text-lg font-normal">{{ $template->name }}</span></h3>
                    <x-link-button :href="route('templates.index')">
                        Voltar
                    </x-link-button>
                </div>


                <div class="min-h-52 m-10 w-11/12 px-6 border-2 py-4 rounded-lg">

                    {!! $template->content !!}

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
