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
  <title>Article Recomender</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Article recommender</h1>      
    <p>PFE 5A 2017-2018</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
 
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">History</a></li>
        <li><a href="#">News</a></li>
          
      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Browse<b class="caret"></b></a> 
                      
       <ul class="dropdown-menu">
       <li class="kopie"><a href="#">Health</a></li>
       <li><a href="#">Network</a></li>
       <li class="active"><a href="#">Politic</a></li>
       <li><a href="#">Science</a></li>
          </ul>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="account.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
          <?php
          if (!empty($_SESSION['Username']))
          {
        ?>
          <li><a> Welcome    <code><?=$_SESSION['Username']?></code></a></li>
          
          <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <a> RECOMENDATION </a>
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Article 1</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</div>
      </div> 
    </div>
      
      
</div><br>
     <!-- NEW POSTS !!!-->
        <div class="container">
    <a> NEW POSTS </a>
    <?php 
    
    $articles = $bdd->query("SELECT * FROM article_list ORDER BY id DESC");
    
   while ($data = $articles->fetch())
{ ?>
	  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-danger">
        <div class="panel-heading"><?=$data['title']?></div>
        <div class="panel-body"><img src="<?=$data['vignette_url']?>" class="img-responsive" style="width:100%" alt="image"></div>
        <div class="panel-footer"><?=$data['content']?></div>
      </div> 
    </div>
    
    <?php
}
    ?>
         
</div><br>

    <div class="container">
    <a> DISCOVERY </a>
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading">Article 1</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</div>
      </div> 
    </div>
</div><br>

<footer class="container-fluid text-center">
</footer>

</body>
</html>
