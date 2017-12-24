<?php include "base.php"; ?>

<!DOCTYPE html>



<head>
    <title>Centaur Adviser</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />

</head>



<?php



if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{

}
elseif(!empty($_POST['username']) && !empty($_POST['password']))
{
    // let the user login
}
else
{
    // display the login form
}
?>

<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
?>

<script>

</script>

<h1>Member Area</h1>
<p Thanks for logging in! You are <code><?=$_SESSION['Username']?></code> and your email address is <code><?=$_SESSION['EmailAddress']?></code>.</p>
<form method="post" action="logout.php" name="logoutform" id="logoutform">
    <fieldset>
        <input class="btn btn-danger" type="submit" name="logout" id="logout" value="Logout" />
    </fieldset>
</form>

<?php
}
elseif(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));

    $checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");

    if(mysql_num_rows($checklogin) == 1)
    {
        $row = mysql_fetch_array($checklogin);
        $email = $row['EmailAddress'];

        $_SESSION['Username'] = $username;
        $_SESSION['EmailAddress'] = $email;
        $_SESSION['LoggedIn'] = 1;

        echo "<h1>Success</h1>";
        echo "<p>We are now redirecting you to the member area.</p>";

        if ($_SESSION['ColdStart'] == 1)
        {
            header('Location: cold_start.php');
        }
        else{
            header('Location: index.php');
        }

    }
    else
    {
        header('Location: error_login.php');
    }
}
else
{
?>

<h1>Member Login</h1>
<script>
    $("#register").click(function(){
        $("#main").load("register.php");
    });
</script>
<p><a style="cursor: pointer;"  id="register" href="register.php">click here to register</a>.</p>

<form class="form-inline" method="post" action="account.php" name="loginform" id="loginform">
    <fieldset>
        <input type="text" name="username" id="username" class="form-control" size="50" placeholder="Username"><br />
        <input type="password" name="password" id="password" class="form-control" size="50" placeholder="password"><br />

        <input class="btn btn-success" type="submit" name="login" id="login" value="Login" />
    </fieldset>
</form>

<?php
}
?>

