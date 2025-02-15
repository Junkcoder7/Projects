<?php
@include 'config.php';

if(isset($_POST['submit'])){

$name = mysqli_real_escape_string($connection, $_POST['username']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$contact = mysqli_real_escape_string($connection, $_POST['num']);
$location = mysqli_real_escape_string($connection, $_POST['location']);
$institute = mysqli_real_escape_string($connection, $_POST['Institute']);
$password = md5($_POST['pass']);
$cpassword = md5($_POST['cpass']);

$select = "SELECT * FROM stuent_record WHERE email = '$email' && password = '$password'";

$result = mysqli_query($connection, $select);

if(mysqli_num_rows($result) > 0){
    
    $error[] ='user already exist';

}
else{

    if($password !=$cpassword){
        $error[] = 'password not matched!';
    }
    else{
        $insert ="INSERT INTO stuent_record(name, email, contact_number, location, institute, password) VALUES('$name', '$email', '$contact', '$location', '$institute', '$password')";
        mysqli_query($connection, $insert);
        header('location:studentlogin.php');
    }
}
};
?>



<html>
<head>
        <title>LBMS/loginpage</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="studentregister12.css">
    </head>
    <body>
        <header>
        <nav class="navbar">
            <div class="navdiv">
            <div class="logo">Login/Register</div>
            <ul>
                <li><a href="adminlogin.php">Admin</a></li>
                <li><a href="studentlogin.php">Student</a></li>
            </ul>
            </div>
        </nav>
        </header>
        <section>
            <div class="left">
                <img src="register.png" alt="Student login">
            </div>
            <div class="right">
                <form  method="post">
                    <h2>Student Login</h2>
                    <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                    ?>
                    <label for="username">Enter your username</label><br>
                    <input type="text" name="username" required placeholder="enter your username "><br>
                    <label for="email">Enter your Email </label><br>
                    <input type="email" name="email" required placeholder="enter your email "><br>
                    <label for="contact no">Enter your Contact no </label><br>
                    <input type="number" name="num" required placeholder="enter your number "><br>
                    <label for="Location">Enter your Location </label><br>
                    <input type="text" name="location" required placeholder="enter your location "><br>
                    <label for="Institute">Enter your Institute name:</label><br>
                    <input type="text" name="Institute" required placeholder="enter your institute name"><br>
                    <label for="password">Enter your password</label><br>
                    <input type="password" name="pass" required placeholder="enter your password "><br>
                    <label for="cpassword">Conform passowrd</label><br>
                    <input type="password" name="cpass" required placeholder="conform password"><br>
                    <input type="submit" name="submit" value="Register" class="login-button">
                </form>
            </div>
        </section>
    </body>
</html>