<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['name'])){
    header('location:studentlogin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="studentwelcomestyle.css">
</head>
<body>

<div class="container">
    <div class="content">
        <h3>Hi, <span>User</span></h3>
        <h1>welcome <span><?php echo $_SESSION['name']  ?></span></h1>
        <p>this is an user page</p>
        <p style="color: red;">please contact us here 01-1243512 to cancel your membership</p> 
        <a href="viewbooks.php" class="btn">View_books</a>
        <a href="logout.php" class="btn">logout</a>
    </div>
</div>
    
</body>
</html>