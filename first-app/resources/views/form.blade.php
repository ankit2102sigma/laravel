<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('Css/custom.css') }}">
    @yield('styles')
</head>
<body>
<div class="container">
<h1>Create a new task</h1>
<div class="main">
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf

    <label for="title">Title:</label>
    <input type="text" name="title" id="title">

    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea>

    <button type="submit">Create</button>
</form>
</div>
</div>
</body>
</html>
