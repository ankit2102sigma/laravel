@extends('layout.app')

{{--@section('content')--}}
    <div class="container">
        <h1 style="text-align: center">All Books</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('books.index') }}" method="GET" class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" value="{{ $search ?? '' }}" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Publication Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->Title}}</td>
                    <td>{{ $book->Author}}</td>
                    <td>{{ $book->Description}}</td>
                    <td>{{ $book->Publication_Date }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-outline-primary">Show</a>
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

{{--@endsection--}}
