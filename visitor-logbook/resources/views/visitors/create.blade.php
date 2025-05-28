@extends('layout')

@section('content')
<form method="POST" action="{{ route('visitors.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
</div>

<div class="form-group mb-3">
    <label>Phone Number</label>
    <input type="text" name="phone" class="form-control" required>
</div>

    <div class="mb-3">
        <label>Purpose:</label>
        <textarea name="purpose" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Photo:</label>
        <input type="file" name="picture" class="form-control">
    </div>
    <button class="btn btn-success">Register</button>
</form>
 <style>
    body {
    background: linear-gradient(to right, #e0f7fa, #f1f8e9);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

form {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 40px auto;
}

form label {
    font-weight: bold;
    color: #37474f;
    display: block;
    margin-bottom: 5px;
}

form input,
form textarea {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 20px;
    border: 1px solid #cfd8dc;
    border-radius: 8px;
    transition: border 0.3s;
}

form input:focus,
form textarea:focus {
    border-color: #0288d1;
    outline: none;
}

.btn-success {
    background-color: #43a047;
    border: none;
    color: white;
    font-weight: bold;
    padding: 12px 24px;
    border-radius: 8px;
    transition: background 0.3s ease;
}

.btn-success:hover {
    background-color: #2e7d32;
    cursor: pointer;
}

    </style>
@endsection  