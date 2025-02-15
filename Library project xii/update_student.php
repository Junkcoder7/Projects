<?php 
@include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM stuent_record WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
}


if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);
    $location = mysqli_real_escape_string($connection, $_POST['location']);
    $institute = mysqli_real_escape_string($connection, $_POST['institute']);

    $updateQuery = "UPDATE stuent_record SET 
        name='$name', email='$email', contact_number='$contact', 
        location='$location', institute='$institute' 
        WHERE id=$id";

    if (mysqli_query($connection, $updateQuery)) {
        header("Location: crudope.php"); 
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="updatestu.css">
</head>
<body>

    <h2>Update Student Record</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
        <br>
        <label>Contact:</label>
        <input type="text" name="contact" value="<?php echo $row['contact_number']; ?>" required>
        <br>
        <label>Location:</label>
        <input type="text" name="location" value="<?php echo $row['location']; ?>" required>
        <br>
        <label>Institute:</label>
        <input type="text" name="institute" value="<?php echo $row['institute']; ?>" required>
        <br>
        <button type="submit" name="update">Update</button>
    </form>

</body>
</html>