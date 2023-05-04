@extends('layout.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end my-3">
            <form action="{{ route('logout') }}" method="get">
                @csrf
                <button type="submit" class="btn btn-danger">Log Out</button>
            </form>
        </div>
        <h1 class="my-5 text-center">All Books</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('books.index') }}" method="GET" class="form-inline">
                    <div class="input-group mb-4">
                        <input type="text" class="form-control" name="search" value="{{ $search ?? '' }}" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 mb-4 text-right">
                <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
            </div>
        </div>
        @if (isset($search) && $books->isEmpty())
            <div class="alert alert-info" role="alert">
                No results found for "{{ $search }}". Please try a different search term.
            </div>
    @else
            <table class="table overflow-wrap">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Publication Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="text-break">
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->Title}}</td>
                        <td>{{ $book->Author}}</td>
                        <td>{{ $book->Description}}</td>
                        <td>{{ $book->Publication_Date }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6">
                    {{ $books->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif
        @if ($books->isEmpty())
            <p>No books added.</p>
        @endif
    </div>
@endsection
