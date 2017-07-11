<html>
    <head>
        <meta charset = "utf-8">
        <meta name = "author" content = "Abhishek Kuvalekar">
        <meta name = "description" content = "Delete your account.">
    </head>
    <body>
        <?php
            require_once('db.php');
            $conn = mysqli_connect($host, $user, $password, $database);
            if(!$conn) {
                die("Connection Error: ".mysqli_connect_error($conn));
            }
            $query = "delete from user_info where visited = '"."t"."'";
            $result = mysqli_query($conn, $query);
            if(!$result) {
                die("Cannot delete your account: ".mysqli_error($conn));
            }
            mysqli_close($conn);
            header("location:../index.php");
        ?>
    </body>
</html>