<style>
body {
   font-family:'Noto Sans JP',sans-serif;
   background-color:#f6f5f4;
}

aside {

  background-color:;
  width:200px;
  height:300px;
  text-align:center;
} 

main {
  
  font-size:40px;
  width:700px;
  height:300px;
  text-align:center;
  margin-left:10px;/*サイドバーとメインコンテンツの間に隙間                    をあけた*/
}

.container {
  display:flex;/*サイドバーとメインコンテンツを横並びにする                指定をした*/
}
</style>


<?php require '../header.php'; ?>

<div class="container">
<aside>
<?php require 'kanri.php'; ?>
</aside>
<main>
<table>
<tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>
<?php
require 'connect.php';
$sql=$pdo->prepare('select * from product where name like ?');
$sql->execute(['%'.$_REQUEST['keyword'].'%']);
foreach ($sql as $row) {
	echo '<tr>';
	echo '<td>', $row['id'], '</td>';
	echo '<td>', $row['name'], '</td>';
	echo '<td>', $row['price'], '</td>';
	echo '</tr>';
	echo "\n";
}
?>
</table>
</main>
<?php require '../footer.php'; ?>
