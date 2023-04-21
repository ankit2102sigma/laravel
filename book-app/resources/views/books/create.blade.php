@extends('layout.app')

@section('content')
    @if(count($errors) > 0 )
        <script>
            @foreach($errors->all() as $error)
            alert('{{ $errors }}');
            @endforeach
        </script>
    @endif

    <h1 class="my-4" style="text-align: center">Add a New Book</h1>
    <form action="{{ route('books.store') }}" method="POST" class="w-50 mx-auto">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" id="author" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="date">Publication Date:</label>
            <input type="date" class="form-control" name="Publication_Date" id="date" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Add Book</button>
    </form>
@endsection
