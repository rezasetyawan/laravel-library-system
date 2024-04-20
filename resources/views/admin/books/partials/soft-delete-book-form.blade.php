<section class="space-y-6">
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-book-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-book-deletion" :show="$errors->bookDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('books.destroy') }}?softDelete=true" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Apakah Anda yakin ingin menghapus buku ini?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Buku ini akan dihapus, namun Anda dapat mengembalikannya nanti.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Hapus Buku') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
