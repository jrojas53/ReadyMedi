<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Account</title>
        <style>
            body {
                background-image: url("summer_background_gradient.jpg");
                background-size: cover;
	            background-position: center center;
	            background-attachment: fixed;                
            }
            h1 {
                text-align: center; 
                font-family: Tahoma, sans-serif; 
                color: white; 
                font-size: 80px; 
                text-shadow: 2px 2px 5px gray; 
                margin: 0%;
            }
            h2 {
                text-align: center; 
                font-family: Tahoma, sans-serif; 
                color: black; 
                text-shadow: 2px 2px 5px wheat;
                font-size: 50px; 
                margin: 0%;
            }
            ul  {
                list-style-type: none;
                margin: auto;
                border: 0;
                padding: 0;
                top: 0;
                overflow: hidden;
                font-family: Tahoma, sans-serif;
            }
            li {
                float: left;
                margin-left: 20px;
            }
            li a {
                display: block;
                color: lightgray;
                text-align: center;
                padding: 15px;
                font-size: 20px;
            }
            li a:hover:not(.active) {
                color: white;
            }
            .active {
                color: white;           
            }
            .footer {
                overflow: hidden;
                text-align: right;
            }
        </style>
    </head>
    <body>
        <header>
            <ul>
                <li><a class = "active" style="text-decoration: none"  href="index.html"> Home</a></li>
                <li><a style="text-decoration: none" href="about.html"> About</a></li>
                <li><a style="text-decoration: none" href="contact.html">Contact</a></li>
            </ul>
        </header>        
        <?php
            echo "This is the account page!";
        ?>
        <h1>Login</h1>
        <p>Login or Create an Account</p>
        <div class ="footer">
            <a class = "active" style="text-decoration: none" href="account.php">Account</a>
            <a style="text-decoration: none" href="index.html"> Home</a></li>
            <a style="text-decoration: none" href="about.html"> About</a></li>
            <a style="text-decoration: none" href="contact.html"> Contact</a></li>
        </div>
    </body>
</html>