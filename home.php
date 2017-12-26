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

<div class="container">
    <a> RECOMENDATION </a>
    <?php 
    
    $select = $bdd->query("SELECT * FROM users WHERE Username = '".$_SESSION['Username']."'");
    $Cat = $select->fetch();
    $Usercategories = explode(",",$Cat['Categories']);
    
    foreach($Usercategories as $value)
    {
            $select = $bdd->query("SELECT * FROM categories WHERE id='".$value."'");
            $Currentcat = $select->fetch();
        
            $articles = $bdd->query("SELECT *, MAX(rating) FROM article_list WHERE category ='".$Currentcat['name']."' LIMIT 2");
            $data = $articles->fetch();
     
    ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-info" id="<?=$data['id']?>" onClick="article_click(this.id)">
                <div class="panel-heading"><?=$data['title']?></div>
                <div class="panel-body"><img src="<?=$data['vignette_url']?>" class="img-responsive" style="height:150px" alt="image"></div>
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