<?php 
@include 'config.php';


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM stuent_record WHERE id = $id";
    if (mysqli_query($connection, $deleteQuery)) {
        header("Location: crudope.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}


$query = "SELECT * FROM stuent_record";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="crudoppcss.css">
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

    <h2 style="text-align: center;
    margin-top: 8px;
    margin-bottom: 8px;">Student Records</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Location</th>
            <th>Institute</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['contact_number']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['institute']; ?></td>
            <td>
                <a class="btn edit" href="update_student.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a class="btn delete" href="crudope.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
        <?php } ?>

    </table>

</body>
</html>