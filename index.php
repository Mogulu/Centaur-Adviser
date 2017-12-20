<?php include "base.php"; 

if($_SESSION['LoggedIn']!=1)
{
    header('Location: account.php');
}

if($_SESSION['ColdStart'] == 1)
{
    header('Location: cold_start.php');
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Centaur Adviser</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="jquerry.js"></script>


    </head>

    <body>
        <a href="index.php">
            <div class="jumbotron">
                <div class="container text-center">
                    <img src="img/logo_white.png" href="index.php" class="img-responsive center-block" style="width:auto%; max-height:100px;text-align:center" alt="image">
                </div>
            </div>
        </a>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                </div>

                <div class="collapse navbar-collapse myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a style="cursor: pointer;"  id="home" >Home</a></li>
                        <li><a style="cursor: pointer;"  id="history">History</a></li>
                        <li><a style="cursor: pointer;"  id="news">News</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Browse<b class="caret"></b></a> 

                            <ul class="dropdown-menu">
                                <li class="kopie"><a href="#">Health</a></li>
                                <li><a href="#">Network</a></li>
                                <li class="active"><a href="#">Politic</a></li>
                                <li><a href="#">Science</a></li>

                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a style="cursor: pointer;"  id="account"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                        <?php
                        if (!empty($_SESSION['Username']))
                        {
                        ?>
                        <li class="disabled" ><a style="cursor: text; color:#EEE"> Welcome    <code><?=$_SESSION['Username']?></code></a></li>
                        <?php } ?>  
                    </ul>
                </div>
            </div>

        </nav>

        <div id="main" class="fill">
        </div>

        <footer style="color:white" class="footer container-fluid text-center">
            <p>Centaur Adviser Copyright</p>  
        </footer>

    </body>
</html>
