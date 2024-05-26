<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h1>Add Book</h1>
    <form method="POST" action="create.php">
        <label>Title:</label>
        <input type="text" name="title" required><br>
        <label>Author:</label>
        <input type="text" name="author" required><br>
        <label>Publication Year:</label>
        <input type="number" name="publication_year" required><br>
        <label>Genre:</label>
        <input type="text" name="genre" required><br>
        <button type="submit">Add Book</button>
    </form>
</body>
</html>
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['publication_year'];
    $genre = $_POST['genre'];

    $stmt = $mysqli->prepare("INSERT INTO Book (title, author, publication_year, genre) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $title, $author, $year, $genre);
    $stmt->execute();
    $stmt->close();

    echo "Book added successfully.";
}
?>
