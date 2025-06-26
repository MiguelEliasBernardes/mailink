<dialog id="{{ $id }}" class="modal">
    <div class="modal-box relative">

        <form method="dialog">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>

        {{ $slot }}


    <form method="dialog" class="modal-backdrop">
        <button>fechar</button>
    </form>
</dialog>
