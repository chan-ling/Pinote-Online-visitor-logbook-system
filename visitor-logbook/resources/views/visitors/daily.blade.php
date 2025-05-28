@extends('layout')

@section('content')
    <h4>Daily Visitor Report ({{ now()->toDateString() }})</h4>
    <a href="{{ route('visitors.index') }}" class="btn btn-secondary mb-3">← Back to Visitor List</a>

    @if ($visitors->isEmpty())
        <div class="alert alert-info">No visitors recorded today.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Purpose</th>
                    <th>Entry</th>
                    <th>Exit</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visitors as $visitor)
                    <tr>
                        <td>{{ $visitor->name }}</td>
                        <td>{{ $visitor->email ?? '—' }}</td>
                        <td>{{ $visitor->phone ?? '—' }}</td>
                        <td>{{ $visitor->purpose }}</td>
                        <td>{{ $visitor->entry_time }}</td>
                        <td>
                            {{ $visitor->exit_time ?? 'Still Inside' }}
                            @if (!$visitor->exit_time)
                                <form method="POST" action="{{ route('visitors.markExit', $visitor->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger mt-1">Mark Exit</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if ($visitor->picture)
                                <a href="{{ asset('storage/' . $visitor->picture) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $visitor->picture) }}" width="50" height="50" alt="Visitor Photo">
                                </a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <style>
            body {
                background: #f4f7f9;
                font-family: 'Segoe UI', sans-serif;
            }

            h4 {
                text-align: center;
                margin-top: 20px;
                font-size: 1.6rem;
                color: #333;
            }

            .table {
                background-color: white;
                box-shadow: 0 0 8px rgba(0, 0, 0, 0.06);
                border-radius: 10px;
                overflow: hidden;
            }

            .table th {
                background-color: #1976d2;
                color: #fff;
                text-align: center;
                padding: 12px;
                font-weight: bold;
            }

            .table td {
                padding: 10px 15px;
                text-align: center;
                vertical-align: middle;
            }

            .btn {
                font-weight: bold;
                padding: 8px 16px;
                border-radius: 6px;
            }

            .btn-primary {
                background-color: #0288d1;
                border: none;
            }

            .btn-secondary {
                background-color: #78909c;
                border: none;
            }

            .btn-danger {
                background-color: #e53935;
                border: none;
            }

            .btn:hover {
                opacity: 0.9;
            }

            .alert-info {
                background-color: #e1f5fe;
                color: #0277bd;
                border-radius: 8px;
                padding: 15px;
                text-align: center;
                margin-top: 20px;
            }

            img {
                border-radius: 6px;
                object-fit: cover;
                width: 50px;
                height: 50px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
            }
        </style>
    @endif
@endsection
