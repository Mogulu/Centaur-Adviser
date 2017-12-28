<head>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

</head>

<?php include "base.php";


try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pfe;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$id_article = $_POST['id'];

$article = $bdd->query("SELECT * FROM article_list WHERE id = $id_article LIMIT 1");
$data = $article->fetch();

?>
<style>
    .rate-area {
        float:left;
        border-style: none;
    }

    .rate-area:not(:checked) > input {
        position:absolute;
        top:-9999px;
        clip:rect(0,0,0,0);
    }

    .rate-area:not(:checked) > label {
        float:right;
        width:1em;
        padding:0 .1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:400%;
        line-height:1.2;
        color:lightgrey;
        text-shadow:1px 1px #bbb;
    }

    .rate-area:not(:checked) > label:before {
        content: '★ ';
    }

    .rate-area > input:checked ~ label {
        color: gold;
        text-shadow:1px 1px #c60;
        font-size:450% !important;
    }

    .rate-area:not(:checked) > label:hover,
    .rate-area:not(:checked) > label:hover ~ label {
        color: gold;

    }

    .rate-area > input:checked + label:hover,
    .rate-area > input:checked + label:hover ~ label,
    .rate-area > input:checked ~ label:hover,
    .rate-area > input:checked ~ label:hover ~ label,
    .rate-area > label:hover ~ input:checked ~ label {
        color: gold;
        text-shadow: 1px 1px goldenrod;   

    }

    .rate-area > label:active {
        position:relative;
        top:2px;
        left:2px;
    }

</style>
<h1> <?=$data['title']?> </h1>
<p> <?=$data['content']?> </p>
<div id="SetRate">
    <ul class="rate-area" >
        <hr />
        <input type="radio" id="5-star" name="rating" value="5" /><label for="5-star" title="Amazing">5 stars</label>
        <input type="radio" id="4-star" name="rating" value="4" /><label for="4-star" title="Good">4 stars</label>
        <input type="radio" id="3-star" name="rating" value="3" /><label for="3-star" title="Average">3 stars</label>
        <input type="radio" id="2-star" name="rating" value="2" /><label for="2-star" title="Not Good">2 stars</label>
        <input type="radio" id="1-star" name="rating" value="1" /><label for="1-star" title="Bad">1 star</label>

    </ul>
</div>



<script type="text/javascript">



    $('#SetRate').unbind('click').click(function(){

        var Rate = $("input[name='rating']:checked").val();
        var clicked_id = <?=$data['id']?>;
        console.log(Rate);
        
        var datastr = 'rate='+Rate;
        $("#main").load("rate.php",{"id":clicked_id,"rate":Rate});
        $.ajax({
            type:'POST',
            url:'rate.php',
            data:datastr,
            success:function(){
                console.log("article.php POST SUCCESS");
            }

        });


    });

</script>

