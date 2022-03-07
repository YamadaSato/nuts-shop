<?php session_start(); ?>
<?php require 'header.php'; ?>

<?php
unset($_SESSION['customer']);
require 'connect.php';
$sql=$pdo->prepare('Select * from customer where login=? ');
$sql->execute([$_REQUEST['login']]);
//, $_REQUEST['password']

foreach ($sql as $row) {
	//$rowは行データ loginで選択したので1行しか無い
	if (password_verify($_REQUEST['password'],
	$row['password'])){
	//↑DBのフィールド名 $y$p...ハッシュ値 
	//turueならセッションに入れる                                      

	$_SESSION['customer']=[
		'id'=>$row['id'], 
		'name'=>$row['name'], 
		'address'=>$row['address'],
		 'login'=>$row['login'], 
		'email'=>$row['email']];
}
}
if (isset($_SESSION['customer'])) {
	require 'menu.php';
	echo '<br>';
	echo 'いらっしゃいませ、', $_SESSION['customer']['name'], 'さん。';
	?>
	<meta http-equiv="refresh" content="1;url=http://satou_hidetoshi.org/nuts-shop/index2.php">
   
<?php	 

} else {
	require 'menu.php';
	echo '<br>';
	echo 'ログイン名またはパスワードが違います。';
	?>
	<meta http-equiv="refresh" content="3;url=http://satou_hidetoshi.org/nuts-shop/index2.php>
	<?php
}
?>
<?php require 'footer.php'; ?>
