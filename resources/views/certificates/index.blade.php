<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Certificate List</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('certificates.create') }}" class="btn btn-primary mb-3">Add Certificate</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Criteria</th>
                    <th>Points</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($certificates as $certificate)
                <tr>
                    <td>{{ $certificate->id }}</td>
                    <td>{{ $certificate->name }}</td>
                    <td>{{ $certificate->criteria }}</td>
                    <td>{{ $certificate->points }}</td>
                    <td>
                        <a href="{{ route('certificates.edit', $certificate->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('certificates.destroy', $certificate->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this certificate?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
