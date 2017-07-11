<html>
<head>
    <meta charset = "utf-8">
    <meta name = "author" content = "Abhishek Kuvalekar">
    <meta name = "description" content = "This is a page after user logs in.">
    <link href = "../styles/login.css" rel = "stylesheet" type = "text/css">
    <title>Log In</title>
</head>
<body>
    <?php
        require_once('db.php');
        $conn = mysqli_connect($host, $user, $password, $database);
        if(!$conn) {
            die("Connection Error: ".mysqli_connect_error($conn));
        }
        $query = "select email, password, firstname, lastname from user_info where email = '".$_POST[login_email]."' and password = '".$_POST[login_password]."'";
        $result = mysqli_query($conn, $query);
        if(!$result || mysqli_num_rows($result) == 0) {
            $query = "select firstname, lastname from user_info where visited = '"."t"."'";
            $result = mysqli_query($conn, $query);
            if(!$result || mysqli_num_rows($result) == 0) 
                die("<h2>Invalid email or password.</h2>");
        }
        $details = mysqli_fetch_assoc($result); 
        echo "<header><h2>".$details["firstname"]." ".$details["lastname"]."</h2></header>";
        $query = "update user_info set visited = '"."t"."' where email = '".$_POST[login_email]."' and password = '".$_POST[login_password]."'";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            die("Update operation failed: ".mysqli_error($conn));
        }
        mysqli_close($conn);
    ?>
    <nav>
        <table>
            <tr>
                <th><a href = "login.php">Profile</a></th>
                <th><a href = "edit.php">Settings</a></th>
                <th><a href = "other.php">Others</a></th>
                <th><a href = "../index.php">Log Out</a></th>
            </tr>
        </table>
    </nav>
    <article>
        <?php
            require_once('db.php');
            $conn = mysqli_connect($host, $user, $password, $database);
            if(!$conn)
                die("");
            $query = "select firstname, lastname, email, gender from user_info where visited = '"."t"."'";
            $result = mysqli_query($conn, $query);
            if(!$result || mysqli_num_rows($result) == 0)
                die("Server is down. Please try again after sometime.");
            else {
                $details = mysqli_fetch_assoc($result);
                echo "<div class = \"info\">";
                echo "Name: ".$details["firstname"]." ".$details["lastname"]."<br />";
                echo "Email: ".$details["email"]."<br />";
                if($details["gender"] == "m")               echo "Gender: Male <br />";
                 else
                    echo "Gender: Female <br />";
            }
            mysqli_close($conn);
        ?>
    </article>
</body>
</html>