<html lang = "en-US">
    <head>
        <meta charset = "utf-8">
        <meta name = "author" content = "Abhishek Kuvalekar">
        <meta name = "description" content = "Sign up to your account.">
    </head>
    <body>
        <?php
            require_once('db.php');
            $conn = mysqli_connect($host, $user, $password, $database);
            if(!$conn) {
                die("Connection Error: ".mysqli_connect_error($conn));
            }
            $query = "insert into user_info(firstname, lastname, email, password, gender, visited) values ('".$_POST[first_name]."', '".$_POST[last_name]."', '".$_POST[signup_email]."', '".$_POST[signup_password]."', '".$_POST[gender]."', '"."t"."')";
            $result = mysqli_query($conn, $query);
            if(!$result) {
                die("Cannot create your account: ".mysqli_error($conn));
            }
            mysqli_close($conn);
            header("location:login.php");
        ?>
    </body>
</html>