<?php
@include 'config.php';

// ADD A BOOK
if (isset($_POST['add_book'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $author = mysqli_real_escape_string($connection, $_POST['author']);
    $quantity = (int) $_POST['quantity'];

    $query = "INSERT INTO books (title, author, quantity) VALUES ('$title', '$author', $quantity)";
    mysqli_query($connection, $query);
    header("Location: booksmanagement.php");
}

// DELETE A BOOK
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($connection, "DELETE FROM books WHERE id=$id");
    header("Location: booksmanagement.php");
}

// UPDATE A BOOK
if (isset($_POST['update_book'])) {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $author = mysqli_real_escape_string($connection, $_POST['author']);
    $quantity = (int) $_POST['quantity'];

    mysqli_query($connection, "UPDATE books SET title='$title', author='$author', quantity=$quantity WHERE id=$id");
    header("Location: booksmanagement.php");
}
?>
<html>
    <head><title style="text-align: center;">books</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="bookmanagement12.css">
</head>
<body>
<header>
        <nav class="navbar">
            <div class="navdiv">
            <div class="logo">Manage student</div>
            <ul>
                <li><a href="crudope.php">Manage_User/Students</a></li>
                <li><a href="booktaken.php">Book taken</a></li>
                <li><a href="booksmanagement.php">Manage books</a></li>
            </ul>
            </div>
        </nav>
        </header>

<h2 style="text-align: center;">Manage Books</h2>

<form method="POST">
    <label>Book Title:</label>
    <input type="text" name="title" required>
    
    <label>Author:</label>
    <input type="text" name="author" required>

    <label>Quantity:</label>
    <input type="number" name="quantity" required>

    <button type="submit" name="add_book">Add Book</button>
</form>

<h3 style="text-align: center;">Book List</h3>
<table border="1">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>
    <?php
    $result = mysqli_query($connection, "SELECT * FROM books");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['title']}</td>
                <td>{$row['author']}</td>
                <td>{$row['quantity']}</td>
                <td>
                    <a href='booksmanagement.php?delete={$row['id']}'>Delete</a>
                    <a href='updatebooks.php?id={$row['id']}'>Edit</a>
                </td>
              </tr>";
    }
    ?>
</table>
</body>
</html>