<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Certificate</title>
</head>
<body>
    <h1>Edit Certificate</h1>
    <form action="{{ route('certificates.update', $certificate->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $certificate->name }}" required>
        <br>
        <label for="criteria">Criteria:</label>
        <input type="text" name="criteria" value="{{ $certificate->criteria }}" required>
        <br>
        <label for="points">Points:</label>
        <input type="number" name="points" value="{{ $certificate->points }}" required>
        <br>
        <button type="submit">Update Certificate</button>
    </form>
    <a href="{{ route('certificates.index') }}">Back to List</a>
</body>
</html>
