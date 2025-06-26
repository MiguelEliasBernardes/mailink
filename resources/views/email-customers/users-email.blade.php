<x-app-layout>


    <div class="py-12" x-data="customerModal()" x-init="init()">
        <div class="max-w-7xl mx-auto sm::px-6 lg:px-8">

            @if (request('status'))
                <x-toast :status="request('status')" :message="request('message')"  />
            @endif

            <div class="bg-white w-3/4 mx-auto gap-5 flex flex-col justify-center items-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-12">

                <x-breadcrumbs
                    :links="[
                        ['name' => 'Listas', 'url' => route('email-list.index')],
                        ['name' => 'Criar Lista', 'url' => route('email-list.create')],
                        ['name' => 'Clientes importados']
                    ]"/>

                <section class="w-3/4 flex flex-col gap-10">

                    <div class=" flex justify-between">
                        <x-link-button  class="w-2/5 btn" onclick="document.getElementById('create-customer').showModal()">
                            Adicionar Email
                        </x-link-button>

                        <x-form :class="'!items-end'" :action="route('customer-email.index')" get>
                            <input type="hidden" name="email_list_id" value="{{ $list_id }}">
                            <x-simple-text-input placeholder="Pesquisar" class="w-10/12 " name="search" />
                        </x-form>

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

                                    <div class="flex">
                                        <button class="btn btn-square btn-ghost" x-on:click="openEditModal({{ $customer['id'] }})">
                                            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                            </svg>
                                        </button>

                                        <x-form :action="route('customer-email.destroy', $customer['id'])" delete class=" py-0" onsubmit="return(confirm('Tem certeza que deseja excluir?'))">
                                            <button class="btn btn-square btn-ghost btn-error" >
                                                <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                </svg>
                                            </button>

                                            <input type="hidden" name="email_list_id" value="{{ $list_id }}">
                                        </x-form>

                                    </div>
                                </li>
                            @endforeach

                        </ul>

                    </div>

                    <div>
                        {{ $customers->appends(['email_list_id' => $list_id])->links() }}
                    </div>


                </section>

            </div>
        </div>


        <x-modal-dialog id="create-customer">

            @include('email-customers.create-customer', ["email_list_id" => $list_id])

        </x-modal-dialog>

        <x-modal-dialog id="edit-customer">

            @include('email-customers.edit-customer', ["email_list_id" => $list_id])

        </x-modal-dialog>
    </div>

</x-app-layout>

<script>
    function customerModal() {
        return {
            customer: { name: '', email: '', id: null },
            async openEditModal(id) {
                try {
                    const res = await fetch(`/customer/${id}`);
                    const data = await res.json();
                    this.customer = data;

                    document.getElementById('edit-name').value = data.name;
                    document.getElementById('edit-email').value = data.email;
                    document.getElementById('edit-id').value = data.id;

                    document.getElementById('edit-customer').showModal();
                } catch (e) {
                    console.error('Erro ao buscar cliente:', e);
                }
            },
            init() {}
        }
    }
</script>
