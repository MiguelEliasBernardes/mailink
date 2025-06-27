<x-form action="{{ route('customer-email.update') }}" post >

    <h2 class="font-inter">Editando Cliente</h2>

    <div class="w-3/4 mt-4">
        <h3>Nome</h3>

        <x-simple-text-input id="edit-name" name="name" placeholder="Nome do cliente" />
    </div>

    <div class="w-3/4 mt-4">
        <h3>E-mail</h3>
        <x-simple-text-input id="edit-email" name="email" placeholder="E-mail do cliente" />
    </div>

    <div class="w-3/4 flex justify-end gap-5 mt-6">
        <x-secondary-button :href="route('customer-email.index', ['email_list_id' => $list_id])">
            Voltar
        </x-secondary-button>

        <x-primary-button >
            Salvar
        </x-primary-button>
    </div>

    <input type="hidden" name="user_id" value="" id="edit-id">
    <input type="hidden" value="{{ $email_list_id }}" name="email_list_id">

</x-form>
