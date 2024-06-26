<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'author' => ['required'],
            'publisher' => ['required'],
            'publication_year' => ['integer', 'required'],
            'publication_date' => ['date', 'required'],
            'cover_img' => ['image', 'required'],
            'isbn' => ['required'],
            'page_count' => ['integer', 'required']
        ]);


        $coverImgPath = $request->file('cover_img')->store('book-cover-pictures', 'public');

        $validatedData['cover_img'] = $coverImgPath;
        $validatedData['category_id'] = 1;
        $validatedData['slug'] = Str::slug($request->title);
        // TODO: CHANGE CATEGORY ID, BASE ON USER INPUT

        Book::create($validatedData);
        return redirect('/admin/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // damn bro route model binding op bgt coeg
        return view('admin.books.show', ["book" => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'author' => ['required'],
            'publisher' => ['required'],
            'publication_year' => ['integer', 'required'],
            'publication_date' => ['date', 'required'],
            'cover_img' => ['image', 'required'],
            'isbn' => ['required'],
            'page_count' => ['integer', 'required']
        ]);

        $validatedData['category_id'] = 1;
        $validatedData['slug'] = Str::slug($request->title);
        $coverImgPath = $request->file('cover_img')->store('book-cover-pictures', 'public');

        $validatedData['cover_img'] = $coverImgPath;
        Storage::disk('local')->delete($book->cover_img);

        Book::where('id', $book->id)->update($validatedData);
        return redirect($request->url());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Book $book)
    {
        $queryParams = $request->query();
        $softDeleteValue = filter_var($queryParams['softDelete'], FILTER_VALIDATE_BOOLEAN) ?? false;

        if ($softDeleteValue) {
            $book->forceDelete();
            return redirect('/admin/books');
        } else {
            $book->delete();
            return redirect('/admin/books');
        }
    }
}