<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('Css/table.css') }}">
    @yield('styles')
</head>
<body>

@if(count($tasks) > 0)
    <div class="main">
    <h1>All Tasks</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>No tasks found.</p>
@endif
    </div>
</body>
</html>
