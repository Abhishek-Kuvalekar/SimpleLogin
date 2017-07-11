<html lang = "en-US">
    <head>
        <meta charset = "utf-8">
        <meta name = "author" content = "Abhishek Kuvalekar">
        <meta name = "description" content = "Profile update successful.">
    </head>
    <body>
        <?php
            echo $_POST[firstname];
            require_once('db.php');
            $conn = mysqli_connect($host, $user, $password, $database);
            if(!$conn) {
                die("Connection Error: ".mysqli_connect_error($conn));
            }
            $query = "update user_info set firstname = '".$_POST[firstname]."', lastname = '".$_POST[lastname]."', email = '".$_POST[email]."', gender = '".$_POST[gender]."', password = '".$_POST[confirmed_password]."' where visited = '"."t"."'";
            $result = mysqli_query($conn, $query);
            if(!$result) {
                die("Cannot update your account: ".mysqli_error($conn));
            }
            mysqli_close($conn);
            header("location: login.php");
        ?>
    </body>
</html>