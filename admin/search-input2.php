






<?php require '../header.php'; ?>
<div class="container">
<aside>
<?php require 'kanri.php'; ?>
</aside>
<main>
商品名を入力してください。
<form action="search-output2.php" method="post">
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>
</main>
</div>
<?php require '../footer.php'; ?>

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