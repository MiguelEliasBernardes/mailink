<x-form action="{{ route('customer-email.store') }}" post >

    <div class="w-3/4">
        <h3>Nome</h3>

        <x-simple-text-input name="name" placeholder="Nome do cliente" />
    </div>

    <div class="w-3/4 mt-4">
        <h3>E-mail</h3>
        <x-simple-text-input name="email" placeholder="E-mail do cliente" />
    </div>

    <div class="w-3/4 flex justify-end gap-5 mt-6">
        <x-secondary-button >
            Voltar
        </x-secondary-button>

        <x-primary-button >
            Salvar
        </x-primary-button>
    </div>

    <input type="hidden" value="{{ $email_list_id }}" name="email_list_id">

</x-form>
