<?php
@include 'config.php';

if (isset($_POST['borrow'])) {
    $student_name = mysqli_real_escape_string($connection, $_POST['student_name']);
    $book_id = mysqli_real_escape_string($connection, $_POST['book_id']);
    $borrow_date = mysqli_real_escape_string($connection, $_POST['borrow_date']);
    $time_dur = mysqli_real_escape_string($connection, $_POST['Time_dur']);

    // Check book availability
    $query = "SELECT quantity FROM books WHERE id = $book_id";
    $result = mysqli_query($connection, $query);
    $book = mysqli_fetch_assoc($result);

    if ($book['quantity'] > 0) {
        // Reduce book count
        $updateQuery = "UPDATE books SET quantity = quantity - 1 WHERE id = $book_id";
        mysqli_query($connection, $updateQuery);

        // Add student record
        $insertQuery = "INSERT INTO borrowed_books (student_name, book_id, Borrowed_Date, Time_Duration) VALUES ('$student_name', $book_id,'$borrow_date','$time_dur')";
        mysqli_query($connection, $insertQuery);

        echo "<script> alert('Book borrowed successfully!')</script>";
        header("Location: booktaken.php"); 
         exit(); 
        //  prevent further execution
    } else {
        echo "<script> alert('Book is out of stock!')</script>";
    }
}
// Retrun/Delete Book
if(isset($_POST['return'])){
    $borrow_id = mysqli_real_escape_string($connection, $_POST['borrow_id']);
    $book_id = mysqli_real_escape_string($connection,$_POST['book_id']);

    //Increase book quantity
    $updateQuery = "UPDATE books SET quantity = quantity + 1 WHERE id = $book_id";
    mysqli_query($connection,$updateQuery);
   
    // Delete form borrowed_books
    $deleteQuery = "DELETE FROM borrowed_books WHERE id = $borrow_id";
    mysqli_query($connection, $deleteQuery);

    $resetQuery = "ALTER TABLE borrowed_books AUTO_INCREMENT = 1";
    mysqli_query($connection, $resetQuery);

    echo"<script> alert('Book returned successfully');</script>";
    header("Location: booktaken.php"); 
    exit();
    // prevent further execution
}

?>
<html>
    <head>
        <title>Taken books</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="booktakenstyle.css">
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
    
<form method="POST">
    <label>Student Name:</label>
    <input type="text" name="student_name" required>
    
    <label>Select Book:</label>
    <select name="book_id">
        <?php
        $query = "SELECT * FROM books WHERE quantity > 0";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['id']}'>{$row['title']} ({$row['quantity']} available)</option>";
        }
        ?>
    </select>
    <label>Borrowed_Date</label>
    <input type="date" name="borrow_date" required>

    <label>Time_Duration</label>
    <input type="number" name="Time_dur" required>

    <button type="submit" name="borrow">Borrow Book</button>
</form>

<h2>Borrowed Books</h2>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Student Name</th>
        <th>Book Title</th>
        <th>Borrrow Date</th>
        <th>Duration</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT borrowed_books.id, borrowed_books.student_name, borrowed_books.Borrowed_Date, borrowed_books.Time_Duration,
        books.title,books.id AS book_id
        FROM borrowed_books
        JOIN books ON borrowed_books.book_id = books.id";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['student_name']}</td>
                <td>{$row['title']}</td>
                <td>{$row['Borrowed_Date']}</td>
                <td>{$row['Time_Duration']}days</td>
                <td>
                    <form method='POST' style='display: inline-block;'>
                        <input type='hidden' name='borrow_id' value='{$row['id']}'>
                        <input type='hidden' name='book_id' value='{$row['book_id']}'>
                        <button type='submit' name='return'>Return</button>
                    </form>
                </td>
            </tr>";
        }
        ?>
    </tbody>
</table>
    </body>
</html>
