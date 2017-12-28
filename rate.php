<?php include "base.php";


try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pfe;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$rate = $_POST['rate'];
$idArticle = $_POST['id'];
echo "rate : ";
echo $rate;
echo ", id artcile :";
echo $idArticle;

?>
<script>
    var clicked_id = 5;
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
</script>