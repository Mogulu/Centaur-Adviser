<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

$article = $bdd->query("SELECT * FROM article_list WHERE id = $id_article ");
$data = $article->fetch();

?>

<style>
table {
  margin: 0 auto;
  text-align: center;
  border-collapse: collapse;
  border: 1px solid #d4d4d4;
  font-size: 20px;
  background: #fff;
}

table th, 
table tr:nth-child(2n+2) {
  background: #e7e7e7;
}
 
table th, 
table td {
  padding: 20px 50px;
}
 
table th {
  border-bottom: 1px solid #d4d4d4;
}     

.stars-outer {
  display: inline-block;
  position: relative;
  font-family: FontAwesome;
}

.stars-outer::before {
  content: "\f006 \f006 \f006 \f006 \f006";
}

.stars-inner {
  position: absolute;
  top: 0;
  left: 0;
  white-space: nowrap;
  overflow: hidden;
  width: 0;
}

.stars-inner::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  color: #f8ce0b;
}

.attribution {
  font-size: 12px;
  color: #444;
  text-decoration: none;
  text-align: center;
  position: fixed;
  right: 10px;
  bottom: 10px;
  z-index: -1;
}
.attribution:hover {
  color: #1fa67a;
}
</style>

<h1> <?=$data['title']?> </h1>
<p> <?=$data['content']?> </p>


<table>
  <tbody>
    <tr class="ArticleRating">
      <td>
        <div class="stars-outer">
          <div class="stars-inner"></div>
        </div>
      </td>
    </tr>
  </tbody>
</table>

<script type="text/javascript">
const ratings = {
  ArticleRating : 2.5,
};

// total number of stars
const starTotal = 5;

for(const rating in ratings) {  
  const starPercentage = (ratings[rating] / starTotal) * 100;
  const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
  document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded; 
}

</script>


