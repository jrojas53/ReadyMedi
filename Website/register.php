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
                <li><a class = "active" style="text-decoration: none"  href="register.php"> Register</a></li>
                <li><a style="text-decoration: none" href="contact.html">Contact</a></li>
                <li style="float:right"><a class="active" href="login.php">Login</a></li>
            </ul>
        </header>     
        <!--Create user account form-->
        <div class ="page_login">
        <h3>New Users</h3>
        <h4 style="text-align: center">Please register below*</h4>
            <form style ="text-align: center" action="register.php" method="post">
                <p style="margin: 0%"> First Name</p>
                    <input type="text" name="f_Name" value ="" placeholder="First name" required> </br>
                <p style="margin: 0%"> Last Name</p>
                    <input type="text" name="l_Name" value ="" placeholder="Last name" required> </br>
                <p style="margin: 0%"> Email Address</p>
                    <input type="text" name="email" value ="" placeholder="Email address" required> </br></br>
                <p style="margin: 0%"> Username</p>
                    <input type="text" name="username" value ="" placeholder="Username" required> </br>
                <p style="margin: 0%"> Password</p>
                    <input type="password" name="password" value ="" placeholder="Password" required> </br>
                <input type="submit" name="Register" value="Register">
            </form>
            <p style="text-align: center; font-family: Tahoma, sans-serif;">
                *Disclaimer: The information provided on this medical website is for general informational purposes only and is not intended to be a substitute for professional medical advice, diagnosis, or treatment. The content of this website is not meant to be a substitute for a medical consultation with a qualified healthcare professional.
                Furthermore, this website does not endorse any specific medical treatment, product, or service. Always seek the advice of a qualified healthcare professional with any questions you may have regarding a medical condition. Never disregard professional medical advice or delay seeking it because of something you have read on this website.
                The information provided on this website may not be accurate, complete, or up-to-date and should not be relied upon as such. This website does not guarantee the accuracy or completeness of any information provided on the site.
                In addition, this website may contain links to other websites that are not controlled or maintained by us. We are not responsible for the content of any such external websites and do not endorse any information contained therein.
                By registering and using this website, you acknowledge and agree that you have read this disclaimer and understand its contents. You further agree to hold harmless and indemnify this website and its owners, agents, and affiliates from any claims, damages, or liabilities arising from your use of this website or reliance on any information provided herein.
            </p>
        </div>

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
    </body>
</html>