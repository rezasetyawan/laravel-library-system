<x-app-layout>
    <div>
        <div class="p-2 rounded-md shadow-sm border block">
            <p>{{ $category->name }}</p>
            <p>{{ $category->created_at }}</p>
            <p>{{ $category->updated_at }}</p>
            <p>{{ $category->deleted_at }}</p>
        </div>
</x-app-layout>
