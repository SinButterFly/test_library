<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use App\Models\Category;
use App\Models\Reader;
use App\Models\Book;
use App\Models\Tag;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //главная страница
    public function show_books(Request $request)
    {
        $shelves = Shelf::query()->get();
        $categories = Category::query()->get();
        $tags = Tag::query()->get();
        $books = Book::query()->with('shelf')->with('category')->with('tag')->get();
        return view('index', compact('shelves', 'categories', 'tags', 'books'));        
    }
    //полки
    public function create_shelf(Request $request)
    {
        if ($request->isMethod('post')){
            
            Shelf::create([
                'shelf_name' => $request->shelf_name,
            ]);
        }
        $shelves = Shelf::query()->get();
        return view('shelves', compact('shelves'));
    }

    public function edit_shelf(Request $request)
    {
        if ($request->isMethod('post')) {
            Shelf::query()->where('id', $request->id)->update([
                'shelf_name' => $request->shelf_name,
            ]);
            return redirect(route('shelves_page'));
        }
        $shelves = Shelf::query()->where('id', $request->id)->get();
        return view('shelves_edit', compact('shelves'));
    }

    public function delete_shelf(Request $request)
    {
        Shelf::query()->where('id', $request->id)->delete();
        return redirect(route('shelves_page'));
    }

    //категрии
    public function create_category(Request $request)
    {
        if ($request->isMethod('post')){
            
            Category::create([
                'category_name' => $request->category_name,
            ]);
        }
        $categories = Category::query()->get();
        return view('categories', compact('categories'));
    }

    public function edit_category(Request $request)
    {
        if ($request->isMethod('post')) {
            Category::query()->where('id', $request->id)->update([
                'category_name' => $request->category_name,
            ]);
            return redirect(route('categories_page'));
        }
        $categories = Category::query()->where('id', $request->id)->get();
        return view('categories_edit', compact('categories'));
    }

    public function delete_category(Request $request)
    {
        Category::query()->where('id', $request->id)->delete();
        return redirect(route('categories_page'));
    }

    //теги
    public function create_tag(Request $request)
    {
        if ($request->isMethod('post')){
            
            Tag::create([
                'tag_name' => $request->tag_name,
            ]);
        }
        $tags = Tag::query()->get();
        return view('tags', compact('tags'));
    }

    public function edit_tag(Request $request)
    {
        if ($request->isMethod('post')) {
            Tag::query()->where('id', $request->id)->update([
                'tag_name' => $request->tag_name,
            ]);
            return redirect(route('tags_page'));
        }
        $tags = Tag::query()->where('id', $request->id)->get();
        return view('tags_edit', compact('tags'));
    }

    public function delete_tag(Request $request)
    {
        Tag::query()->where('id', $request->id)->delete();
        return redirect(route('tags_page'));
    }


    //книги
    public function create_book(Request $request)
    {
        if ($request->isMethod('post')){
            $photo = $request->file('photo');
            $photo_name = asset('img/'.$photo->getClientOriginalName());
            Book::create([
                'book_name' => $request->book_name,
                'author' => $request->author,
                'photo' => $photo_name,
                'shelf_id' => (int)$request->shelf_id,
                'category_id' => (int)$request->category_id,
                'tag_id' => (int)$request->tag_id,
            ]);
            $photo->move(public_path('/img'),$photo->getClientOriginalName());
            return redirect(route('books_page'));
        }
        $shelves = Shelf::query()->get();
        $categories = Category::query()->get();
        $tags = Tag::query()->get();
        $books = Book::query()->with('shelf')->with('category')->with('tag')->get();
        return view('books', compact('shelves', 'categories', 'tags', 'books'));
    }

    public function edit_book(Request $request)
    {
        if ($request->isMethod('post')){
            $photo = $request->file('photo');
            $photo_name = asset('img/'.$photo->getClientOriginalName());
            Book::query()->where('id', $request->id)->update([
                'book_name' => $request->book_name,
                'author' => $request->author,
                'photo' => $photo_name,
                'shelf_id' => (int)$request->shelf_id,
                'category_id' => (int)$request->category_id,
                'tag_id' => (int)$request->tag_id,
            ]);
            $photo->move(public_path('/img'),$photo->getClientOriginalName());
            return redirect(route('books_page'));
        }
        $shelves = Shelf::query()->get();
        $categories = Category::query()->get();
        $tags = Tag::query()->get();
        $books = Book::query()->with('shelf')->with('category')->with('tag')->where('id', $request->id)->get();
        return view('books_edit', compact('shelves', 'categories', 'tags', 'books'));
    }

    public function delete_book(Request $request)
    {
        Book::query()
            ->with('shelf')
            ->with('category')
            ->with('tag')
            ->where('id', $request->id)
            ->delete();
        return redirect(route('books_page'));
    }

    //читетели
    public function create_reader(Request $request)
    {
        if ($request->isMethod('post')){
            
            Reader::create([
                'date_reg' => $request->date_reg,
                'reader_name' => $request->reader_name,
                'date_born' => $request->date_born,
                'book_id' => (int)$request->book_id,
            ]);
        }
        $books = Book::query()->get();
        $readers = Reader::query()->with('book')->get();
        return view('readers', compact('readers', 'books'));
    }

    public function edit_reader(Request $request)
    {
        if ($request->isMethod('post')) {
            Reader::query()->where('id', $request->id)->update([
                'date_reg' => $request->date_reg,
                'reader_name' => $request->reader_name,
                'date_born' => $request->date_born,
                'book_id' => (int)$request->book_id,
            ]);
            return redirect(route('readers_page'));
        }
        $books = Book::query()->get();
        $readers = Reader::query()->with('book')->where('id', $request->id)->get();
        return view('readers_edit', compact('readers', 'books'));
    }

    public function delete_reader(Request $request)
    {
        Reader::query()->with('book')->where('id', $request->id)->delete();
        return redirect(route('readers_page'));
    }
}

