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
<?php require '../header.php'; ?>
<div class="container">
<aside>
<?php require 'kanri.php'; ?>
</aside>
<main>
<div class="th0">商品番号</div>
<div class="th1">商品名</div>
<div class="th1">商品価格</div>
<?php
require'connect.php';
foreach ($pdo->query('select * from product') as $row) {
	echo '<form action="update-output.php" method="post">';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<div class="td0">', $row['id'], '</div> ';
	echo '<div class="td1">';
	echo '<input type="text" name="name" value="', $row['name'], '">';
	echo '</div> ';
	echo '<div class="td1">';
	echo ' <input type="text" name="price" value="', $row['price'], '">';
	echo '</div> ';
	echo '<div class="td2"><input type="submit" value="更新"></div>';
	echo '</form>';
	echo "\n";
}
?>
</main>
<?php require '../footer.php'; ?>