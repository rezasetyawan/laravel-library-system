<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $book->title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

</head>

<body class="antialiased">
    <main class="p-6">
        <form method="post" class="p-6" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-3">
                    <img src="{{ asset('storage/' . $book->cover_img) }}"
                            alt="{{ $book->title }}" class="block w-full overflow-hidden rounded-md">
                    <x-input-label for="cover_img" :value="__('Sampul Buku')"  class="mt-4"/>
                    <input
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm
                        block w-full border focus:z-10 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4 text-sm mt-1"
                        id="cover_img" name="cover_img" type="file" required autofocus
                        value="{{ old('cover_image', asset('storage/' . $book->cover_img)) }}">
                    <x-input-error class="mt-2" :messages="$errors->get('cover_img')" />
                </div>
    
                <div class="col-span-9">
                    <div>
                        <x-input-label for="title" :value="__('Judul Buku')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required
                            autofocus value="{{ old('title', $book->title) }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>
    
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Deskripsi Buku')" />
                        <x-textarea id="description" name="description" type="text" class="mt-1 block w-full" required
                            autofocus rows="5">{{ old('description', $book->description) }}</x-textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>
    
                    <div class="mt-4">
                        <x-input-label for="author" :value="__('Penulis Buku')" />
                        <x-text-input id="author" name="author" type="text" class="mt-1 block w-full" required
                            autofocus value="{{ old('author', $book->author) }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('author')" />
                    </div>
    
                    <div class="mt-4">
                        <x-input-label for="publisher" :value="__('Penerbit Buku')" />
                        <x-text-input id="publisher" name="publisher" type="text" class="mt-1 block w-full" required
                            autofocus value="{{ old('publisher', $book->publisher) }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('publisher')" />
                    </div>
    
                    <div class="mt-4">
                        <x-input-label for="publication_year" :value="__('Tahun Rilis Buku')" />
                        <x-text-input id="publication_year" name="publication_year" type="number" class="mt-1 block w-full"
                            required autofocus value="{{ old('publication_year', $book->publication_year) }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('publication_year')" />
                    </div>
    
                    <div class="mt-4">
                        <x-input-label for="publication_date" :value="__('Tanggal Rilis Buku')" />
                        <x-text-input id="publication_date" name="publication_date" type="date" class="mt-1 block w-full"
                            required autofocus
                            value="{{ old('publication_date', $book->publication_date->format('Y-m-d')) }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('publication_date')" />
                    </div>
    
                    <div class="mt-4">
                        <x-input-label for="isbn" :value="__('ISBN')" />
                        <x-text-input id="isbn" name="isbn" type="text" class="mt-1 block w-full" required
                            autofocus value="{{ old('isbn', $book->isbn) }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('isbn')" />
                    </div>
    
                    <div class="mt-4">
                        <x-input-label for="page_count" :value="__('Jumlah Halaman')" />
                        <x-text-input id="page_count" name="page_count" type="text" class="mt-1 block w-full" required
                            autofocus value="{{ old('page_count', $book->page_count) }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('page_count')" />
                    </div>
    
    
                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Batal') }}
                        </x-secondary-button>
    
                        <x-primary-button class="ms-3">
                            {{ __('Perbarui') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </form>

    </main>
</body>

</html>
