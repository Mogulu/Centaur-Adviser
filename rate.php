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

$select = $bdd->query("SELECT * FROM article_list WHERE id = $idArticle LIMIT 1");
$data = $select->fetch();

$RatingList = explode(";",$data['rate_historic']);
array_push($RatingList, $rate);

$numberRate = $data['number_rate'];

$new_numberRate = $numberRate + 1 ;
$new_RatingList = implode(";",array_filter($RatingList));

$newRate = (array_sum($RatingList)/$new_numberRate);

$bdd->query("UPDATE article_list SET rate_historic = '".$new_RatingList."' WHERE id =  $idArticle");

$bdd->query("UPDATE article_list SET number_rate = '".$new_numberRate."' WHERE id =  $idArticle");

$bdd->query("UPDATE article_list SET rate = '".$newRate."' WHERE id =  $idArticle");

?>

<script>
    alert("THANKS FOR VOTING ;)");
    var clicked_id = <?php echo $idArticle; ?>;
    var datastr = 'id='+clicked_id;
    $("#main").load("article.php",{"id":clicked_id});
    $.ajax({
        type:'POST',
        url:'article.php',
        data:datastr,
        success:function(){
            //console.log("rate.php POST SUCCESS");
        }

    });
</script>