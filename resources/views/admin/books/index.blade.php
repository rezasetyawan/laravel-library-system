<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

</head>

<body class="antialiased">
    <main class="mx-20">
        <marquee behavior="" direction="" class="text-red-500 font-semibold text-6xl">INI HALAMAN BUKU</marquee>
        <div>
            <section class="space-y-6">
                <x-primary-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'new-book-modal')">{{ __('Tambah Buku') }}</x-primary-button>

                <x-modal name="new-book-modal" :show="false" focusable>
                    <form method="post" class="p-6" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="title" :value="__('Judul Buku')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Deskripsi Buku')" />
                            <x-textarea id="description" name="description" type="text" class="mt-1 block w-full"
                                required autofocus rows="5" />
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="author" :value="__('Penulis Buku')" />
                            <x-text-input id="author" name="author" type="text" class="mt-1 block w-full"
                                required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('author')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="publisher" :value="__('Penerbit Buku')" />
                            <x-text-input id="publisher" name="publisher" type="text" class="mt-1 block w-full"
                                required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('publisher')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="publication_year" :value="__('Tahun Rilis Buku')" />
                            <x-text-input id="publication_year" name="publication_year" type="number"
                                class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('publication_year')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="publication_date" :value="__('Tanggal Rilis Buku')" />
                            <x-text-input id="publication_date" name="publication_date" type="date"
                                class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('publication_date')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="isbn" :value="__('ISBN')" />
                            <x-text-input id="isbn" name="isbn" type="text" class="mt-1 block w-full"
                                required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('isbn')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="page_count" :value="__('Jumlah Halaman')" />
                            <x-text-input id="page_count" name="page_count" type="text" class="mt-1 block w-full"
                                required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('page_count')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="cover_img" :value="__('Sampul Buku')" />
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm
                            block w-full border focus:z-10 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4 text-sm mt-1"
                                id="cover_img" name="cover_img" type="file" required autofocus>
                            <x-input-error class="mt-2" :messages="$errors->get('cover_img')" />
                        </div>

                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Batal') }}
                            </x-secondary-button>

                            <x-primary-button class="ms-3">
                                {{ __('Tambahkan') }}
                            </x-primary-button>
                        </div>

                    </form>
                </x-modal>
            </section>
        </div>
        <div class="grid grid-cols-6 gap-3 mt-10">
            @foreach ($books as $book)
                <a class="p-2 rounded-md shadow-sm border block" href="/admin/books/{{ $book->slug }}">
                    <div class="flex justify-center"> <img src="{{ asset('storage/' . $book->cover_img) }}"
                            alt="{{ $book->title }}" class="w-28 h-[10.5rem] overflow-hidden"></div>
                    <h2 class="font-semibold mt-2 ">{{ $book->title }}</h2>
                    <p class="text-sm text-muted line-clamp-3">
                        {{ $book->description }}
                    </p>
                </a>
            @endforeach
        </div>
    </main>
</body>

</html>
