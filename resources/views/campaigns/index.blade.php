<x-app-layout>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm::px-6 lg:px-8">
            <div class="bg-white w-3/4 mx-auto  dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                @if (request('status'))
                    <x-toast :status="request('status')" :message="request('message')"  />
                @endif

                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col gap-10">

                    <div class=" flex justify-between">
                        <x-link-button :href="route('campaigns.create')"  class="w-2/6 btn" >
                            Criar Campanha
                        </x-link-button>

                        <x-form :class="'!items-end'" :action="route('campaigns.index')" get>
                            <x-simple-text-input placeholder="Pesquisar" class="w-2/3 " name="search" />
                        </x-form>

                    </div>

                    <ul class="list bg-base-100 rounded-box shadow-md">

                        <li class="p-4 pb-2 text-xs opacity-60 tracking-wide">Campanhas Cadastrados</li>

                        @forelse ( $campaigns as $campaign )

                        <li class="list-row flex justify-between">
                                <div>
                                    <div>{{ $campaign['name'] }}</div>
                                </div>

                                <div class="flex">

                                    <x-form :action="route('campaignDelivery', $campaign['id'])" get>
                                        <button class="btn btn-square btn-ghost">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[20px] h-[20px]" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send-icon lucide-send"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"/><path d="m21.854 2.147-10.94 10.939"/></svg>
                                        </button>
                                    </x-form>

                                    <x-form :action="route('campaigns.edit' , $campaign['id'])" get>
                                        <button class="btn btn-square btn-ghost">
                                            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                            </svg>
                                        </button>
                                    </x-form>

                                    <x-form :action="route('campaigns.destroy', $campaign['id'])" delete class=" py-0" onsubmit="return(confirm('Tem certeza que deseja excluir?'))">
                                        <button class="btn btn-square btn-ghost btn-error" >
                                            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                            </svg>
                                        </button>

                                    </x-form>

                                </div>
                            </li>
                        @empty

                            <div class="flex flex-col gap-10 justify-center items-center">

                                <x-card-skeleton>
                                </x-card-skeleton>

                                <div class="flex flex-col gap-4">
                                    <p class="font-inter mb-8 font-medium text-base">Nenhuma campanha cadastrada.</p>
                                </div>
                            </div>
                        @endforelse
                    </ul>

                    <div class="">
                        {{ $campaigns->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
