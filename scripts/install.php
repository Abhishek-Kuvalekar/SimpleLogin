<html lang = "en-US">
    <head>
        <meta charset = "utf-8">
        <meta name = "author" content = "Abhishek Kuvalekar">
        <meta name = "description" content = "Install my login site.">
        <link href = "../styles/install.css" rel = "stylesheet" type = "text/css">
        <title>Install</title>
    </head>
    <body>
        <h2>Install</h2>
        <form name = "installation_form" action = "create_database.php" method = "post">
            <input type = "text" placeholder = "database_name" class = "info" name = "database"><br />
            <input type = "text" placeholder = "MySQL_host(localhost)" class = "info" name = "host"><br />
            <input type = "text" placeholder = "MySQL Username" class = "info" name = "user"><br />
            <input type = "password" placeholder = "MySQL Password" class = "info" name = "password"><br />
            <input type = "submit" value = "Submit" class = "button">
        </form>
    </body>
</html>