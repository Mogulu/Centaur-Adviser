<?php include "base.php"; ?>
<!DOCTYPE html>
<head>
    <title>Centaur Adviser</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />


</head>
<body>  
    <div id="main">
        <?php
        if(!empty($_POST['username']) && !empty($_POST['password']))
        {
            $username = mysql_real_escape_string($_POST['username']);
            $password = md5(mysql_real_escape_string($_POST['password']));
            $email = mysql_real_escape_string($_POST['email']);

            $checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'");

            if(mysql_num_rows($checkusername) == 1)
            {
                echo "<h1>Error</h1>";
                echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
            }
            else
            {
                $registerquery = mysql_query("INSERT INTO users (Username, Password, EmailAddress) VALUES('".$username."', '".$password."', '".$email."')");
                if($registerquery)
                {
                    $_SESSION['ColdStart'] = 1;
                    echo "<h1>Success</h1>";
                    echo "<p>Your account was successfully created. Please <a href=\"account.php\">click here to login</a>.</p>";
                }
                else
                {
                    echo "<h1>Error</h1>";
                    echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
                }       
            }
        }
        else
        {
        ?>

        <h1>Register</h1>

        <p>Please enter your details below to register.</p>

        <form method="post" action="register.php" name="registerform" id="registerform">
            <fieldset>
                <input type="text" name="username" id="username" class="form-control" size="50" placeholder="Username"><br />
                <input type="password" name="password" id="password" class="form-control" size="50" placeholder="Password"><br />
                <input type="email" name="email" id="email" class="form-control" size="50" placeholder="Email Address"><br />
                <input class="btn btn-success" type="submit" name="register" id="register" value="Register" />
            </fieldset>
        </form>

        <?php
        }
        ?>

    </div>
</body>
</html>