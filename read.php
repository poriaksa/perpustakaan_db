<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
</head>
<body>
    <h1>Book List</h1>
    <a href="create.php">Add New Book</a>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Publication Year</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
        <?php
        include 'db.php';
        $result = $mysqli->query("SELECT * FROM Book");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['author'] . "</td>";
            echo "<td>" . $row['publication_year'] . "</td>";
            echo "<td>" . $row['genre'] . "</td>";
            echo "<td>";
            echo "<a href='update.php?id=" . $row['id'] . "'>Edit</a> | ";
            echo "<a href='delete.php?id=" . $row['id'] . "'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
