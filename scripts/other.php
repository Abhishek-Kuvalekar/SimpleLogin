<html lang = "eng-US">
    <head>
        <meta charset = "utf-8">
        <meta name = "author" content = "Abhishek Kuvalekar">
        <meta name = "description" content = "Displays information about other user.">
        <link href = "../styles/other.css" rel = "stylesheet" type = "text/css">
        <title>Other Users</title>
    </head>
    <body>
        <?php
            require_once('db.php');
            $conn = mysqli_connect($host, $user, $password, $database);
            if(!$conn) {
                die("Connection Error: ".mysqli_connect_error($conn));
            }
            $query = "select firstname, lastname from user_info where visited = '"."t"."'";
            $result = mysqli_query($conn, $query);
            if(!$result || mysqli_num_rows($result) == 0) {
                die("Cannot fetch data from database: ".mysqli_error($conn));
            }
            $details = mysqli_fetch_assoc($result);
            echo "<header><h2>".$details["firstname"]." ".$details["lastname"]."</h2></header>";
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
        <?php
            require_once('db.php');
            $conn = mysqli_connect($host, $user, $password, $database);
            if(!$conn) {
                die("Connection Error: ".mysqli_connect_error($conn));
            }
            $query = "select firstname, lastname, email, gender from user_info where visited = '"."f"."'";
            $result = mysqli_query($conn, $query);
            if(!$result || mysqli_num_rows($result) == 0) {
                print("<div class = other>There are no other users signed up on this server.</div>");
            }
            print("<div class = other>");
            while($details = mysqli_fetch_assoc($result)) {
                $info = "Name: ".$details["firstname"]." ".$details["lastname"]."<br />"."Email: ".$details["email"]."<br />"."Gender: ";
                if($details["gender"] == "m")
                    $info = $info."Male<br /><br /><br />";
                else
                    $info = $info."Female<br /><br /><br />";
                print($info);
            }
            print("</div>");
            mysqli_close($conn);
        ?>
    </body>
</html>