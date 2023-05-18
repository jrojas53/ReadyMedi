<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Logout</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <ul>
            <li><a style="text-decoration: none" href="index.html"> Home</a></li>
                <li><a style="text-decoration: none" href="about.html"> About</a></li>
                <li><a style="text-decoration: none" href="contact.html">Contact</a></li>
                <li style="float:right"><a class="active" href="login.php">Login</a></li>
            </ul>
        </header>        
            <?php
                //PHP Code Reference were provided by Dr.Toothman
                date_default_timezone_set('America/Los_Angeles');
                if(session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                session_unset();
                /*Delete Session Cookie along with PHP Session
                Reference Source: 
                https://www.geeksforgeeks.org/
                session_unset-vs-session_destroy-in-php/#
                */
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(session_name(), '', time() - 42000,
                        $params["path"], $params["domain"],
                        $params["secure"], $params["httponly"]
                    );
                }
                session_destroy();
                header("Location: login.php");
            ?>
    </body>
</html>