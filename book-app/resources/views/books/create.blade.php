@extends('layout.app')

@section('content')
    <div class="border p-3">
        <h1 class="my-4 border-bottom pb-3" style="text-align: center">Add a New Book</h1>
        <form action="{{ route('books.store') }}" method="POST" class="w-50 mx-auto">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="title" value="{{ old('title') }}" required>
                @if ($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}" name="author" id="author" value="{{ old('author') }}" required>
                @if ($errors->has('author'))
                    <div class="invalid-feedback">
                        {{ $errors->first('author') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" rows="5" required>{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="date">Publication Date:</label>
                <input type="date" class="form-control {{ $errors->has('Publication_Date') ? 'is-invalid' : '' }}" name="Publication_Date" id="date" value="{{ old('Publication_Date') }}" required>
                @if ($errors->has('Publication_Date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('Publication_Date') }}
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-3 w-100">Add Book</button>
        </form>
    </div>
@endsection
