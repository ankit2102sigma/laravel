<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\Book;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $search = $request->query('search');
        $books = Book::where(function ($query) use ($search) {
            if ($search) {
                $query->where('Title', 'like', '%' . $search . '%')
                    ->orWhere('Author', 'like', '%' . $search . '%')
                    ->orWhere('Description', 'like', '%' . $search . '%')
                    ->orWhere('Publication_Date', 'like', '%' . $search . '%');
            }

        })->paginate(2);



        return view('books.index', compact('books', 'search'));
    }


    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'author' => 'required|max:20|regex:/^[a-zA-Z ]+$/',
            'description' => 'required|max:50',
            'Publication_Date' => 'before:today|required',

        ]);

        $book = new Book([
            'title' => $request->get('title'),
            'author' => $request->get('author'),
            'description' => $request->get('description'),
            'Publication_Date' => $request->get('Publication_Date')

        ]);
        $book->save();

        return redirect('books')->with('success', 'Book has been added');
    }

    public function show(int $id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
        return view('books.show', compact('book'));
    }


    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:20',
            'author' => 'required|max:20|regex:/^[a-zA-Z ]+$/',
            'description' => 'required|max:50',
            'Publication_Date' => 'before:today|required',

        ]);

        $book = Book::find($id);
        $book->title = $request->get('title');
        $book->author = $request->get('author');
        $book->description = $request->get('description');
        $book-> Publication_Date = $request->get('Publication_Date');
        $book->save();

        return redirect('books')->with('success', 'Book has been updated');
    }

    public function destroy(int $id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('books')->with('success', 'Book has been deleted');
    }
}
