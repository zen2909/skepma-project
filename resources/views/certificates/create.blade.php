<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Certificate</title>
</head>
<body>
    <h1>Add Certificate</h1>
    <form action="{{ route('certificates.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="criteria">Criteria:</label>
        <input type="text" name="criteria" required>
        <br>
        <label for="points">Points:</label>
        <input type="number" name="points" required>
        <br>
        <button type="submit">Add Certificate</button>
    </form>
    <a href="{{ route('certificates.index') }}">Back to List</a>
</body>
</html>
