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

<p> RECOMENDATION </p>
<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-primary" >
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
            <div class="panel panel-info" id="<?=$data['id']?>" onClick="article_click(this.id)">
                <div class="panel-heading"><?=$data['title']?></div>
                <div class="panel-body"><img src="<?=$data['vignette_url']?>" class="img-responsive" style="width:100%" alt="image"></div>
                <div class="panel-footer"><?=$data['resume']?></div>
                <script>
                    function article_click(clicked_id){
                        console.log(clicked_id);
                        var datastr = 'id='+clicked_id;
                        $("#main").load("article.php",{"id":clicked_id});
                        $.ajax({
                            type:'POST',
                            url:'article.php',
                            data:datastr,
                            success:function(){
                                console.log("POST SUCCESS");
                            }

                        });

                    }
                    $('.panel-info')
                        .css('cursor', 'pointer')
                        .hover(
                        function(){
                            $(this).css('background', '#ff00ff');
                            $(this).className="panel panel-default";

                        },
                        function(){
                            $(this).css('background', '');
                        }
                    );
                </script>
            </div> 
        </div>

        <?php
    }
        ?>


    </div>
</div>