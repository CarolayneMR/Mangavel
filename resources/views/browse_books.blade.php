<!DOCTYPE html>
<html>
<head>
   <title>Browse Movies</title>
</head>
<body>
<h2>Movies</h2>
@forelse ($books as $book)
  <p>
    Title: {{ $book->title }}<br>
  </p>
@empty
    <p>No results</p>
@endforelse
</body>
</html>