<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Account</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <ul>
                <li><a class = "active" style="text-decoration: none"  href="register.php"> Register</a></li>
            </ul>
        </header>        
        <!--Create user account form><!-->
        <form action="register.php" method="post">
            <input type="text" name="username" value ="" placeholder="Username" required> </br>
            <input type="password" name="password" value ="" placeholder="Password" required> </br>
            <input type="submit" name="Register" value="Register">
        </form>
        
        <?php
        // PHP Register form resource provided by: Dr. Nick Toothman
        // Currently Commented: will uncomment
        // when register.php is ready to be 
        // attached to .connect.php or config.php
        require_once( "config.php");

        //Check for Session Error
        if (isset($_SESSION["error"])) {
            echo "Session Error, Please Try Again!\n";
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
            die();
        }

        //If true, register account with input data
        if (isset($_POST['Register'])) {
            unset($_POST['Register']);
            $db = get_connection();
            $username = $_POST['username'];
            $password = $_POST['password'];
            //check if username and/or password fields are emtpy
            if (strlen($username) == 0 || strlen($password) == 0) {
                //Redirect user to complete any missing fields
                $_SESSION["error"] = "Username and/or Password CANNOT be empty!";
                header("Location: register.php");
            }

            $statement = $db->prepare("INSERT INTO User (username, password) VALUES (?, ?)");
            $passHash = password_hash($password, PASSWORD_DEFAULT);
            $statement->bind_param('ss', $username, $passHash);

            if ($statement->execute()) {
                $resulObj = $statement->get_result();
                $result = $resulObj->fetch_assoc();
                //If error occurs, redirect page back to register.php
                if (is_null($result["userid"])) {
                    $_SESSION["error"] = $result["Error"];
                    header("Location: register.php");
                }
                else {
                    echo "Account has been registered!";
                    header("Location: login.php");
                }
            }
            else {
                echo "Result Error: " . mysqli_error($db);
            }
        }
        ?>
        <h1>Create An Account</h1>
        <div class ="footer">
            <a class = "active" style="text-decoration: none" href="login.php">Login</a>
            <a style="text-decoration: none" href="index.html"> Home</a></li>
            <a style="text-decoration: none" href="about.html"> About</a></li>
            <a style="text-decoration: none" href="contact.html"> Contact</a></li>
        </div>
    </body>
</html>