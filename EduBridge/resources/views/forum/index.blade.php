<x-app-layout>
<div class="container mt-5">
    <h1>Forum</h1>
    <a href="{{ route('forum.create') }}" class="btn btn-primary mb-3">Tambah Forum</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Forum</th>
                <th>Dibuat Oleh</th>
                <th>Komentar</th>
                <th>Tipe Forum</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($forums as $forum)
        <tr>
            <td>{{ $forum->nama_forum }}</td>
            <td>{{ $forum->nama_pengguna }} <br> {{ $forum->created_at->format('d M Y') }}</td>
            <td>{{ $forum->komentar ? count($forum->komentar) : 0 }} Komentar</td>
            <td>{{ $forum->type }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('forum.show', $forum->id) }}" class="me-2">
                        <img src="{{ asset('images/read-icon.png') }}" alt="Read" width="25">
                    </a>
                    <a href="{{ route('forum.edit', $forum->id) }}" class="me-2">
                        <img src="{{ asset('images/icon-edit.png') }}" alt="Edit" width="25">
                    </a>
                    <form action="{{ route('forum.destroy', $forum->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus forum ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn p-0">
                            <img src="{{ asset('images/destroy-all.png') }}" alt="Delete" width="25">
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>
<x-app-layout>
<div class="container mt-5">
    <h1>Forum</h1>
    <a href="{{ route('forum.create') }}" class="btn btn-primary mb-3">Tambah Forum</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Forum</th>
                <th>Dibuat Oleh</th>
                <th>Tipe Forum</th>
                <th>Komentar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($forums as $forum)
                <tr>
                    <td>{{ $forum->nama_forum }}</td>
                    <td>{{ $forum->nama_pengguna }}</td>
                    <td>{{ $forum->type }}</td>
                    <td>{{ $forum->komentar }}</td>
                    <td>
                        <a href="{{ route('forum.show', $forum->id) }}" class="btn btn-info">Lihat</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>

    </table>
</div>
</x-app-layout>
