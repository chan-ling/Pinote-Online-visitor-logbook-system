<!DOCTYPE html>
<html>
<head>
    <title>Visitor Logbook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Base Styles */
        body {
            background: linear-gradient(to right, #e3f2fd, #ffffff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        h2 {
            text-align: center;
            font-weight: bold;
            color: #1565c0;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
        }

        .container {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            margin-top: 60px;
        }

        .alert-success {
            background-color: #d9f7be;
            color: #1b5e20;
            border-left: 5px solid #43a047;
            font-weight: 500;
            border-radius: 8px;
        }

        .btn {
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #1976d2;
            border: none;
        }

        .btn-info {
            background-color: #00acc1;
            border: none;
        }

        .btn-danger {
            background-color: #e53935;
            border: none;
        }

        .btn-secondary {
            background-color: #546e7a;
            border: none;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        table.table {
            border-radius: 8px;
            overflow: hidden;
        }

        table th {
            background-color: #f1f8ff;
            color: #0d47a1;
        }

        table td {
            vertical-align: middle;
        }

        img {
            border-radius: 4px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Online Visitor Logbook</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
</div>
</body>
</html>
