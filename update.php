<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM Book WHERE id=$id");
    $book = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $book['title']; ?>" required><br>
        <label>Author:</label>
        <input type="text" name="author" value="<?php echo $book['author']; ?>" required><br>
        <label>Publication Year:</label>
        <input type="number" name="publication_year" value="<?php echo $book['publication_year']; ?>" required><br>
        <label>Genre:</label>
        <input type="text" name="genre" value="<?php echo $book['genre']; ?>" required><br>
        <button type="submit">Update Book</button>
    </form>
</body>
</html>

<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['publication_year'];
    $genre = $_POST['genre'];

    $stmt = $mysqli->prepare("UPDATE Book SET title=?, author=?, publication_year=?, genre=? WHERE id=?");
    $stmt->bind_param("ssisi", $title, $author, $year, $genre, $id);
    $stmt->execute();
    $stmt->close();

    echo "Book updated successfully.";
}
?>
