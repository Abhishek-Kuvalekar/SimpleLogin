<html lang = "en-US">
    <head>
        <meta charset = "utf-8">
        <meta name = "author" content = "Abhishek Kuvalekar">
        <meta name = "description" content = "Edit your profile.">
        <link href = "../styles/edit.css" rel = "stylesheet" type = "text/css">
        <title>Profile Settings</title>
        <script type = "text/javascript">
            function checkPass() {
                //document.write("hello");
                //document.write(document.forms["myForm"]["firstname"].value);
                var new_pass = document.forms["myForm"]["new_password"].value;
                var confirmed_pass = document.forms["myForm"]["confirmed_password"].value;
                //document.write(new_pass);
                //document.write(confirmed_pass);
                if(new_pass == confirmed_pass) {
                    return true;
                }
                else {
                    alert("Passwords did not match.");
                    return false;
                }
            }
            function deleteAccount() {
                var result = confirm("Do you really want to delete your account?");
                if(result == true) {
                    window.location = "delete.php";
                }
            }
        </script>
        <noscript>
            Sorry! Your browser does not support Javascript! :-(
        </noscript>
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
            $query = "select firstname, lastname, email, gender from user_info where visited = '"."t"."'";
            $result = mysqli_query($conn, $query);
            if(!$result || mysqli_num_rows($result) == 0) {
                die("Cannot fetch data from database: ".mysqli_error($conn));
            }
            $details = mysqli_fetch_assoc($result);
            $line = "<form action = '"."success.php"."' name = '"."myForm"."' method = '"."post"."' onsubmit = '"."return(checkPass())"."'>"."<br />"."Name: "."<input type = '"."text"."' value = '".$details["firstname"]."' name = '"."firstname"."' placeholder = '"."firstname"."' class = '"."text"."'>"."<input type = '"."text"."' value = '".$details["lastname"]."' name = '"."lastname"."' placeholder = '"."lastname"."' class = '"."text"."'><br />";
            echo $line;
            $line = "E-mail: "."<input type = '"."email"."' value = '".$details["email"]."' name = '"."email"."' placeholder = '"."email"."' id = '"."email"."' class = '"."text"."'><br />";
            echo $line;
            if($details["gender"] == "m") {
                $line = "Gender: "."<input type = '"."radio"."' name = '"."gender"."' value = '"."m"."' checked>"."Male"."<input type = '"."radio"."' name = '"."gender"."' value = '"."f"."'>"."Female"."<br />";
            }
            else {
                $line = "Gender: "."<input type = '"."radio"."' name = '"."gender"."' value = '"."m"."'>"."Male"."<input type = '"."radio"."' name = '"."gender"."' value = '"."f"."' checked>"."Female"."<br />";
            }
            echo $line;
            $line = "New Password: "."<input type = '"."password"."' name = '"."new_password"."' id = '"."new_password"."' class = '"."text"."'><br/>";
            echo $line;
            $line = "Confirm Password: "."<input type = '"."password"."' name = '"."confirmed_password"."' id = '"."confirmed_password"."' class = '"."text"."'><br/>";
            echo $line;
            $line = "<input type = '"."submit"."' value = '"."Submit"."' class = '"."button"."'><input type = '"."button"."' value = '"."Delete Account"."' onclick = '"."deleteAccount();"."' class = '"."button"."'>";
            echo $line;
            $line = "</form>";
            echo $line;
            mysqli_close($conn);
        ?>
    </body>
</html>