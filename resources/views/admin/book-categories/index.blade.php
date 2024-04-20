<x-app-layout>
    <div>
        @foreach ($categories as $category)
            <a class="p-2 rounded-md shadow-sm border block" href="/admin/books/{{ $category->id }}">
                <p>{{ $category->name }}</p>
                <p>{{ $category->created_at }}</p>
                <p>{{ $category->updated_at }}</p>
                <p>{{ $category->deleted_at }}</p>
            </a>
        @endforeach
</x-app-layout>
