<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <meta name = "author" content = "Abhishek Kuvalekar">
        <meta name = "description" content = "This is a simple login/sign-up screen developed for mini-backend-task.">
        <link href = "styles/index.css" rel = "stylesheet" type = "text/css">
        <title>Log In/Sign Up</title>
        <?php
            if(!file_exists('scripts/db.php')) {
                header("Location: scripts/install.php");
            }
            require_once('scripts/db.php');
            $conn = mysqli_connect($host, $user, $password, $database);
            if(!$conn) {
                die("Cannot connect to database: ".mysqli_connect_error);
            }
            $query = "update user_info set visited = '"."f"."' where visited = '"."t"."'";
            mysqli_query($conn, $query);
            mysqli_close($conn);
        ?>
    </head>
    <body>
        <header>
            <h2>Log In </h2> 
            <div class = "login_form">
                <form action = "scripts/login.php" method = "post" class = "login">
                    Email: <input type = "email" name = "login_email">
                    Password: <input type = "password" name = "login_password"> 
                    <input type = "submit" value = "Log In">
                </form>
            </div>
        </header>
        
        <section>
            <h2>Create a new account</h2>
            <form action = "scripts/signup.php" method = "post" class = "signup">
                <input type = "text" value = "" placeholder="First Name" name = "first_name" class = "text">
                <input type = "text" value = "" placeholder="Surname"  name = "last_name" class = "text">
                <br /><br />
                <input type = "email" value = "" placeholder="Email address" name = "signup_email" class = "text" id = "email">
                <br /><br />
                <input type = "password" value = "" placeholder = "New Password" name = "signup_password" class = "text" id = "password">
                <br /><br />
                <input type = "radio"  name = "gender" value = "f">Female
                <input type = "radio"  name = "gender" value = "m">Male
                <br /><br />
                <input type = "submit" value = "Sign Up" class = "button">
            </form>
        </section>
    </body>
</html>