<?php
@include 'config.php';

$query = "SELECT title, author, quantity FROM books";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewbooks</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="viewbooksstyle.css">
</head>
<body>
    <header>
        <h3 style="text-align: center;padding-top: 16px;">Available books</h3>
    </header>
    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)){
                echo"<tr>
                        <td>{$row['title']}</td>
                        <td>{$row['author']}</td>
                        <td>{$row['quantity']}</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
    
</body>
</html>