<?php 
@include 'config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the book details from the database
    $result = mysqli_query($connection, "SELECT * FROM books WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // If no book found, redirect back to the books management page
    if (!$row) {
        header("Location: booksmanagement.php");
        exit();
    }

if (isset($_POST['update_book'])) {
    // $id = $_POST['id'];
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $author = mysqli_real_escape_string($connection, $_POST['author']);
    $quantity = (int) $_POST['quantity'];

    mysqli_query($connection, "UPDATE books SET title='$title', author='$author', quantity=$quantity WHERE id=$id");
    header("Location: booksmanagement.php");
}
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="bookmanagement12.css">
</head>
<body>

    <header>
        <nav class="navbar">
            <div class="navdiv">
                <div class="logo">Manage Books</div>
                <ul>
                    <li><a href="crudope.php">Manage Students</a></li>
                    <li><a href="booktaken.php">Book Taken</a></li>
                    <li><a href="booksmanagement.php">Manage Books</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <h2>Edit Book</h2>

    <form method="POST">
        <label>Book Title:</label>
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br>
        
        <label>Author:</label>
        <input type="text" name="author" value="<?php echo $row['author']; ?>" required><br>

        <label>Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" required><br>

        <button type="submit" name="update_book">Update Book</button>
    </form>

</body>
</html>