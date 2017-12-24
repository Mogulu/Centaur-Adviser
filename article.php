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

<?php 
$id_article = $_POST['id'];
debug_to_console($id_article);
$article = $bdd->query("SELECT * FROM article_list WHERE id = $id_article ");
$data = $article->fetch();
?>


<h1> <?=$data['title']?> </h1>
<p> <?=$data['content']?> </p>


