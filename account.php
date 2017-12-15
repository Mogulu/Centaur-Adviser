<?php include "base.php"; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">



<?php



if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
    // let the user access the main page
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

<h1>Member Area</h1>
<pThanks for logging in! You are <code><?=$_SESSION['Username']?></code> and your email address is <code><?=$_SESSION['EmailAddress']?></code>.</p>
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
        header('Location: index.php');
    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"account.php\">click here to try again</a>.</p>";
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
<p><a style="cursor: pointer;"  id="register">click here to register</a>.</p>

<form method="post" action="account.php" name="loginform" id="loginform">
    <fieldset>
        <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
        <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
        <input class="btn btn-success" type="submit" name="login" id="login" value="Login" />
    </fieldset>
</form>

<?php
}
?>

