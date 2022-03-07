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
  text-align:light;
  margin-left:10px;/*サイドバーとメインコンテンツの間に隙間                    をあけた*/
}

.container {
  display:flex;/*サイドバーとメインコンテンツを横並びにする                指定をした*/
}
</style>





<?php 
session_start();
require '../header.php'; 
?>
<?php require '../header.php'; ?>
<div class="container">
<aside>
<?php require 'kanri.php'; ?>
</aside>
<main>
<p>商品を追加します。</p>
<form action="insert-output.php" method="post" 
      enctype="multipart/form-data">

  <p>商品画像:
    <input type="file" multiple="multiple" name="file[]"></p>
  
  <p>商品名  :<input type="text" name="name">
  <p>価格     :<input type="text" name="price">

  <input type="submit" value="追加">

</form>
</main>




<?php require '../footer.php'; ?>