@extends('layout.app')

<h1 class="my-4" style="text-align: center">Edit Data {{ $book->title }}</h1>
<form action="{{ route('books.update', $book->id) }}" method="POST" class="w-50 mx-auto">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $book->Title }}" required>
    </div>
    <div class="form-group">
        <label for="author">Author:</label>
        <input type="text" class="form-control" name="author" id="author" value="{{ $book->Author }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" rows="5" required>{{ $book->Description }}</textarea>
    </div>
    <div class="form-group">
        <label for="publish_date">Publish Date:</label>
        <input type="date" class="form-control" name="Publication_Date" id="publish_date" value="{{ $book->Publication_Date }}" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Update Book</button>
</form>
