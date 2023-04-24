@extends('layout.app')


    <div class="border p-3">
    <h1 class="my-4 border-bottom pb-3" style="text-align: center">Edit Data {{ $book->title }}</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST" class="w-50 mx-auto">
        @csrf
        @method('PUT')
        <div class="form-group ">
            <label for="title">Title:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $book->Title }}" required>
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="author">Author:</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author" value="{{ $book->Author }}" required>
            @error('author')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="description">Description:</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5" required>{{ $book->Description }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="publish_date">Publish Date:</label>
            <input type="date" class="form-control @error('Publication_Date') is-invalid @enderror" name="Publication_Date" id="publish_date" value="{{ $book->Publication_Date }}" required>
            @error('Publication_Date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3 w-100">Update Book</button>
    </form>

</div>
