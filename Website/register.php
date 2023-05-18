<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>ReadyMedi | Register Account</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <ul>
                <li><a style="text-decoration: none" href="index.html"> Home</a></li>
                <li><a style="text-decoration: none" href="about.html"> About</a></li>
                <li><a style="text-decoration: none" href="login.php"> Login</a></li>
                <li><a class = "active" style="text-decoration: none"  href="register.php"> Register</a></li>
                <li><a style="text-decoration: none" href="contact.html">Contact</a></li>
                
            </ul>
        </header>   
        <h1>Create An Account</h1>    
        <!--Create user account form-->
        <form style ="text-align: center" action="register.php" method="post">
			<input type="text" name="f_Name" value ="" placeholder="First name" required> </br>
			<input type="text" name="l_Name" value ="" placeholder="Last name" required> </br>
			<input type="text" name="email" value ="" placeholder="Email address" required> </br></br>
			
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
        if (isset($_SESSION["error"])) {	// checking to see if text box "is set" with correct info
            echo "Session Error, Please Try Again!\n";
            echo $_SESSION["error"];
            unset($_SESSION["error"]); // destroys local var of $_SESSION
            die();
        }

        //If true, register account with input data
        if (isset($_POST['Register'])) {
            unset($_POST['Register']);
            $db = get_connection();
            
			$fName	  = $_POST['f_Name'];
			$lName	  = $_POST['l_Name'];
			$username = $_POST['username'];
            $password = $_POST['password'];
			$email	  = $_POST['email'];
			
			
            //check if username and/or password fields are emtpy
            if (strlen($username) == 0 || strlen($password) == 0 
				|| strlen($fName) == 0 || strlen($lName) == 0 || strlen($email) == 0) {
                //Redirect user to complete any missing fields
                $_SESSION["error"] = "Username and/or Password CANNOT be empty!";
                header("Location: register.php");
            }
			
			// insert register data into the User table
			// https://www.php.net/manual/en/mysqli.quickstart.prepared-statements.php
			// https://stackoverflow.com/questions/48083402/how-to-do-prepared-statements-with-php
            if ($statement = $db->prepare("INSERT INTO User (username, password, 
										  f_Name, l_Name, email) VALUES (?, ?, ?, ?, ?)")) {
				$passHash = password_hash($password, PASSWORD_DEFAULT);
				$statement->bind_param('sssss', $username, $passHash, $fName, $lName, $email);

				//test echos
				echo "First name: $fName<br>";
				echo "Last name: $lName<br>";
				echo "Username: $username<br>";
				echo "PassHash: $passHash<br>";
				echo "Email: $email<br>";


				if ($statement->execute()) {
					$result_Obj = $statement->get_result();
					// "Uncaught Error: Call to a member function fetch_assoc() on bool ..."
					//$result = $result_Obj->fetch_assoc();
				
					//If error occurs, redirect page back to register.php
					//if (is_null($result["user_id"])) {
						//$_SESSION["error"] = $result["Error"];
						//$_SESSION["error"] = "User_ID is blank<br>\n";
						//header("Location: register.php");
					//}
					
					//else {
						echo "Account has been registered!";
						
						// sql to create table
						$sql = "CREATE TABLE $username (
												  test_ID int AUTO_INCREMENT,
												  PRIMARY KEY (test_ID),
												  first_ill char(225),
												  first_percent int,
												  sec_ill char(225),
												  sec_percent int,
												  third_ill char(225),
												  third_percent int,
												  symptoms char(225) );";
												  // will insert symptom result string in 'currentQuiz.php'

						echo "<br>Sql Statement: $sql <br>\n";
						// prompt MariaDB to create a new table
						if ($db->query($sql)) {
							echo "<br>Table was created successfully.<br>";
							// redirect to login page
							//header("Location: login.php");
						}
						
						else {
							echo "<br>Error creating table: " . mysqli_error($db);
						}
					//}
				}
				
				// Catches duplicate usernames
				else {
					echo "Result Error: " . mysqli_error($db);
				}
			}
        }
        ?>
		
        <div class ="footer">
            <a class = "active" style="text-decoration: none" href="register.php">Register</a>
            <a style="text-decoration: none" href="index.html"> Home</a></li>
            <a style="text-decoration: none" href="about.html"> About</a></li>
            <a style="text-decoration: none" href="login.php"> Login</a></li>
            <a style="text-decoration: none" href="contact.html"> Contact</a></li>
        </div>
    </body>
</html>