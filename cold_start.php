<?php include "base.php"; ?>
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pfe;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
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

                    <ul class="nav navbar-nav navbar-right">
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

<!-- CATEGORIES!!!-->
<div class="container">
    <?php 

    $categories = $bdd->query("SELECT * FROM categories");

    while ($data = $categories->fetch())
    { ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-info">
                <div class="panel-heading"><?=$data['name']?></div>
                <div class="panel-body"><img src="<?=$data['imageURLL']?>" class="img-responsive" style="height:200px" alt="image"></div>
            </div> 
        </div>

        <?php
    }
        ?>


    </div>
</div>

</body>
        <footer style="color:white" class="footer container-fluid text-center">
            <p>Centaur Adviser Copyright</p>  
        </footer    
</html>

<script type="application/javascript"> 
            

            </script>
