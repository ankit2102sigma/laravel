@extends('layouts.app')

@section('content')
    <h1>Create a new task</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <label for="title">Title:</label>
        <input type="text" name="title" id="title">

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>

        <button type="submit">Create</button>
    </form>
@endsection
