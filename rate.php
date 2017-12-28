<?php include "base.php";


try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pfe;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$rate = (int)$_POST['rate'];
$idArticle = $_POST['id'];
/*echo "rate : ";
echo $rate;
echo ", id artcile :";
echo $idArticle;*/
$select = $bdd->query("SELECT * FROM article_list WHERE id = $idArticle LIMIT 1");
$data = $select->fetch();


$oldRate = (int)$data['rate'];
$numberRate = (int)$data['number_rate'];
$newRate = ((($oldRate*$numberRate) + $rate)/($numberRate + 1));

echo $newRate;
$newRate = (int)$newRate;

$new_numberRate = $numberRate + 1 ;

echo " ,";
echo $newRate;

$bdd->query("UPDATE article_list SET rate = '".$newRate."' WHERE id =  $idArticle LIMIT 1");
$bdd->query("UPDATE article_list SET number_rate = '".$new_numberRate."' WHERE id =  $idArticle LIMIT 1");

?>

<!--<script>
var clicked_id = <?php echo $idArticle; ?>;
var datastr = 'id='+clicked_id;
$("#main").load("article.php",{"id":clicked_id});
$.ajax({
type:'POST',
url:'article.php',
data:datastr,
success:function(){
console.log("rate.php POST SUCCESS");
}

});
</script>-->