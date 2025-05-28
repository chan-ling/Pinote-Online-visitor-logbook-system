@extends('layout')

@section('content')
    <a href="{{ route('visitors.create') }}" class="btn btn-primary mb-3">Register New Visitor</a>
    <a href="{{ route('visitors.daily') }}" class="btn btn-info mb-3">Today's Report</a>


    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Purpose</th>
                <th>Entry</th>
                <th>Exit</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visitors as $visitor)
            <tr>
                <td>{{ $visitor->name }}</td>
                <td>{{ $visitor->purpose }}</td>
                <td>{{ $visitor->entry_time }}</td>
                <td>{{ $visitor->exit_time ?? 'Still Inside' }}</td>
                <td>
                    @if($visitor->picture)
                        <img src="{{ asset('storage/' . $visitor->picture) }}" width="50">
                    @endif
                </td>
                <td>
   {{ $visitor->exit_time ? \Carbon\Carbon::parse($visitor->exit_time)->format('Y-m-d H:i:s') : 'Still Inside' }}

    @if(!$visitor->exit_time)
        <form action="{{ route('visitors.markExit', $visitor->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger mt-1">Mark Exit</button>
        </form>
    @endif
</td>

            </tr>
            @endforeach
        </tbody>
        <style>
            body {
    background-color: #f0f4f8;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.container {
    padding: 40px 20px;
}

.btn {
    font-weight: bold;
    border-radius: 8px;
    padding: 10px 20px;
    margin-right: 10px;
    transition: background 0.3s ease;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-info {
    background-color: #17a2b8;
    border: none;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
}

.btn:hover {
    opacity: 0.9;
}

.table {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    overflow: hidden;
}

.table th {
    background-color: #343a40;
    color: white;
    text-align: center;
}

.table td {
    text-align: center;
    vertical-align: middle;
}

img {
    border-radius: 8px;
    border: 1px solid #ccc;
}

            </style>
    </table>
@endsection
