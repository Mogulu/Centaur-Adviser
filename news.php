<?php include "base.php"; 

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pfe;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>

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
                <div class="panel-footer"><?=$data['resume']?></div>
            </div> 
        </div>

        <?php
    }
        ?>


    </div>
</div>