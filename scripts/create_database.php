<html lang = "en-US">
    <head>
        <meta charset = "utf-8">
        <meta name = "author" content = "Abhishek Kuvalekar">
        <meta name = "description" content = "Create a database."> 
    </head>
    <body>
        <?php
            $database = $_POST[database];
            $host = $_POST[host];
            $user = $_POST[user];
            $password = $_POST[password];
            $conn = mysqli_connect($host, $user, $password);
            if(!$conn) {
                die("Cannot connect: ".mysqli_connect_error());
            }
            $query = "create database ".$database;
            $result = mysqli_query($conn, $query);
            if(!$result) {
                die("Cannot create database: ".mysqli_error($conn));
            }
            mysqli_close($conn);
            $conn = mysqli_connect($host, $user, $password, $database);
            if(!$conn) {
                die("Cannot connect: ".mysqli_connect_error());
            }
            $query = "create table user_info (user_id int(6) not null auto_increment primary key, firstname varchar(20), lastname varchar(20), email varchar(64), password varchar(16), gender char(1), sign_up_time TIMESTAMP, visited enum('t', 'f'))";
            $result = mysqli_query($conn, $query);
            if(!$result) {
                die("Cannot create tables: ".mysqli_error($conn));
            }
            mysqli_close($conn);
            $file = fopen("db.php", "w");
            if($file == false) {
                die("Cannot create file: db.php");
            }
            $string = '<?php
                $host = '.$host.';
                $user = '.$user.';
                $password = '.$password.';
                $database = '.$database.';
            ?>';
            fwrite($file, $string);
            fclose($file);
            header("Location: ../index.php");
        ?>
    </body>
</html>