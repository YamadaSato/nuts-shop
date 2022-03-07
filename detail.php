


<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'connect.php';?>





<link href="slick/slick.css" rel="stylesheet">
<link href="slick/slick-theme.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
<script src="slick/slick.min.js"></script>

<style>
.slider2{width:200px;high:auto:}

</style>









<?php
 
$sql=$pdo->prepare('SELECT * FROM product WHERE id=?');
$sql->execute([$_REQUEST['id']]);

//var_dump($sql);//配列ではない,特殊なオブジェクト 表の格好=2次元配列
foreach ($sql as $row) {  // 表から行を取り出してる
	  // $sqlは1行しか無いが,2次元の格好をしてる
		// ループは1回しかしない
	  // row '行' 列 col 
		// 3	ひまわりの種	210 
?>









<?php
 $a=$row['id'];
  $filename ="image/$a.jpg";
	
	
	
 
 if (file_exists($filename)) {
	 ?>
		
	<p>
		<img src="image/<?=$a?>.jpg">
	</p>
	<?php
	}else

	 {
		# code...
	

		$u=unserialize($row['images']); 
		var_dump($u);
		?>


		<ul class="slider2">
		<?php
		foreach ($u as $i) {
		?>
		<img src="admin/<?=$i?>" alt="" style="width:200px; height:auto" >
	
<?php
	}?></ul>


	<?php
	}?>
	

	










	<form action="cart-insert.php" method="post">
		<p>商品番号：<?= $row['id']?></p>
		<p>商品名：<?= $row['name']?></p>
		<p>価格：<?= $row['price']?></p>
		<p>個数：<select name="count">
		<?php	
			for ($i=1; $i<=10; $i++) {
				echo "<option value='$i'> $i</option>";
			} 
		?>
		</select></p>
			<!-- 隠しフィールド -->
			<input type="hidden" name="id" value="<?= $row['id']?>">
			<input type="hidden" name="name" value="<?= $row['name']?>">
			<input type="hidden" name="price" value="<?= $row['price']?>">

		<p><input type="submit" value="カートに追加"></p>
	</form>

	<p>
<?php
if (isset($_SESSION['customer'])) {
	# code...
// この商品がfavoriteテーブルにあるか調べる
	$sql =	$pdo->query(
		"SELECT count(*) FROM favorite 
		WHERE customer_id = {$_SESSION['customer']['id']}
		AND product_id = $_REQUEST[id]
		");
		$count = $sql->fetch();
		// var_dump( $count );
		if( $count["count(*)"] === 0 ){

?>		
		<a href="favorite-insert.php?id=<?= $row['id']?>">
			☆お気に入りに追加</a>
<?php }else{ ?>			
		<a href="favorite-delete.php?id=<?= $row['id']?>">
			🌟お気に入り解除</a>
	</p>

<?php
			} }// if end
	} //foreach end
 ?>







<script>

$('.slider2').slick({
   	loop: true, 
    speed: 500, 
    slidesPerView: 1, 
    spaceBetween: 0,     
    direction: 'horizontal', 
    effect: 'slide', 
  
    autoplay:true,
    autoplaySpeed:5000,
    dots:true,
  });
	</script>


<?php require 'footer.php'; ?>