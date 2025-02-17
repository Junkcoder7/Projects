<html>
    <head>
        <title>LBMS/loginpage</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="adminlogincss.css">
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
        <div class="leftsection">
            <img src="admin.png" alt="Admin photo">
        </div>
        <div class="rightsection">
            <form action="" method="" onsubmit="return validate(event)">
                <h2> Admin LogIn</h2>
                <label for="Admin">Enter the Admin username</label><br>
                <input type="text" name="name" required placeholder="enter admin name" id="user"><br>
                <label for="password">Enter the Admin password</label><br>
                <input type="password" name="pass" required placeholder="enter admin password" id="passwd"><br>
               <button type="submit">LogIn</button>
            </form>
        </div>
        </section>
        <script>
            function validate(event){
                event.preventDefault();
            let name=document.getElementById('user').value;
            let password=document.getElementById('passwd').value;
            if(name=="Team V8" && password=="Ronaldo7"){
                alert("Logged successfully");
                window.location.href = "admincrud.html";
            }
            else{
                alert("LogIn Denied");
            }
        }
        </script>
    </body>
</html>