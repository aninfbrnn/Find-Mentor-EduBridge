<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Thread</title>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .container {
        width: 90%;
        margin: auto;
    }

    header {
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    header img {
        height: 40px;
    }

    header nav a {
        font-size: 16px;
        color: #333;
        text-decoration: none;
        margin: 0 10px;
        padding: 5px 0;
    }

    header nav a:hover {
        color: #007BFF;
    }

    header nav a.fw-bold {
        font-weight: bold;
        border-bottom: 2px solid #333;
    }
</style>
<body>
<x-app-layout>
<div class="container mt-5">
    <h1>Create a New Forum</h1>
    <form action="{{ route('forum.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_pengguna" class="form-label"><b>* Nama Pengguna</b></label>
            <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required>
        </div>
        <div class="mb-3">
            <label for="nama_forum" class="form-label"><b>* Nama Forum</b></label>
            <input type="text" class="form-control" id="nama_forum" name="nama_forum" required>
        </div>
        <div class="mb-3">
            <label for="type_forum" class="form-label"><b>* Tipe Forum</b></label>
            <select class="form-control" id="type_forum" name="type" required>
                <option value="Programming">Programming</option>
                <option value="Visualisasi">Visualisasi</option>
                <option value="Data & Statistika">Data & Statistika</option>
                <option value="Bisnis">Bisnis</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="komentar" class="form-label"><b>* Komentar</b></label>
            <textarea class="form-control" id="komentar" name="komentar" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create New Forum</button>
    </form>
</div>
</x-app-layout>
</body>
</html>
