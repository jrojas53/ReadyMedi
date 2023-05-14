<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header> 
            <ul>
                <li><a class = "active" style="text-decoration: none"  href="homepage.php"> Account</a></li>
                <li><a style="text-decoration: none" href="maintenance.html"> Old Tests</a></li>
                <li><a style="text-decoration: none" href="currentQuiz.php">New Test</a></li>
                <li style="float:right"><a class="active" href="logout.php">Logout</a></li>
            </ul>
        </header>
        <?php
            //PHP index.php resource provided by: Dr. Nick Toothman
            require_once( "config.php");
            if (isset($_SESSION["error"])) {
                echo $_SESSION["error"] . "<br><br>";
                unset($_SESSION["error"]);
                //die();
            }
            if (isset($_SESSION['username'])) {
                echo "Welcome, " . $_SESSION["username"];
            }
            else {
                header("Location: login.php");
            }
        ?>
        <div class="page_alt">
            
        </div>
    </body>
</html>