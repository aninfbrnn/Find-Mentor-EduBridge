<table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Skills</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mentors as $mentor)
        <tr>
            <td><img src="/images/{{ $mentor->image }}" alt="{{ $mentor->name }}" width="50"></td>
            <td>{{ $mentor->name }}</td>
            <td>{{ $mentor->skills }}</td>
            <td>${{ $mentor->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $mentors->links() }}
