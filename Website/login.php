<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>User Account Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <ul>
                <li><a style="text-decoration: none" href="index.html"> Home</a></li>
                <li><a style="text-decoration: none" href="about.html"> About</a></li>
                <li><a class = "active" style="text-decoration: none"  href="login.php"> Login</a></li>
                <li><a style="text-decoration: none" href="contact.html">Contact</a></li>
                <li style="float:right"><a class="active" href="register.php">Register</a></li>
            </ul>
        </header>   
        <div class="page_login">
            <h3>Returning Users</h3>
            <h4 style="text-align: center"><a style="text-decoration: none" href="register.php"> If you are not a returning user, please click here to register</a></h4>
                <h4 style="text-align: center">Please login below</h4>
            <div class="indiv_2">
                <!--Comment><h1>Login</h1><!-->
                <form style ="text-align: center" action="login.php" method="post">
                    <input type="text" name="username" value ="" placeholder="Username" required> </br>
                    <input type="password" name="password" value ="" placeholder="Password" required> </br>
                    <input type="submit" name="Login" value="Login">
                </form>
            </div>
            <div class="horizontal-bar">
            </div>
            <div class="indiv_2">
                <h3>Don't have an account?</h3>
                <button class="button button2">
                    <a style="text-decoration: none text-align:center" href="test_question_page.php">
                        Continue as a Guest
                    </a>
                </button> 
            </div>
        </div>

        <?php
        // PHP login form resource provided by: Dr. Nick Toothman
        // Currently Commented: will uncomment
        // when register.php is ready to be 
        // attached to .connect.php or config.php
        require_once( "config.php");

        //Check for Session Error
        if (isset($_SESSION["error"])) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
            die();
        }
        //If true, login user with input data
        if (isset($_POST['Login'])) {
            unset($_POST['Login']);
            $db = get_connection();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $statement = $db->prepare("SELECT * FROM User WHERE username=?");
            $statement->bind_param('s', $username);

            //Execute SQL Statement
            if ($statement->execute()) {
                if (mysqli_stmt_bind_result($statement, $res_id, $res_user, $res_password, $res_fname, $res_lname, $res_email)) {
                    $result_count = 0;
                    while($statement->fetch()) {
                        $result_count++;
                    }
                    if($result_count == 0) {
                        $_SESSION["error"] = "Error: Username and/or password entered was not found";
                        header("Location: login.php");
                    }
                    else {
                        //Verify user password
                        $isGood = password_verify($password, $res_password);

                        if ($isGood) {
                            //start session for active user
                            $_SESSION["user_id"] = $res_id;
                            $_SESSION["username"] = $res_user;
                            
                            //Direct user to user dashboard
                            header("Location:homepage.php");
                        }
                        else {
                            $_SESSION["error"] = "Error: Username and/or password entered was not found";
                            header("Location: login.php");
                        }
                    }
                }
                else {
                    echo "Error code: " . mysqli_error($db);
                    die();
                }
            }
            else {
                echo "QUERY ERROR: " . mysqli_error($db);
                die();
            }
        }
        ?>
    </body>
</html>