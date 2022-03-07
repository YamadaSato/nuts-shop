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
<?php
require 'connect.php';
$sql=$pdo->prepare('update product set name=?, price=? where id=?');
if (empty($_REQUEST['name'])) {
	echo '商品名を入力してください。';
} else
if (!preg_match('/[0-9]+/', $_REQUEST['price'])) {
	echo '商品価格を整数で入力してください。';
} else
if ($sql->execute(
	[htmlspecialchars($_REQUEST['name']), 
	$_REQUEST['price'], $_REQUEST['id']]
)) {
	echo '更新に成功しました。';
} else {
	echo '更新に失敗しました。';
}
?></main>
<?php require '../footer.php'; ?>