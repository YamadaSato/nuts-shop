<?php session_start(); ?>
<?php require '../header.php'; ?>

<?php
unset($_SESSION['customer']);
$pdo=new PDO('mysql:host=localhost;dbname=hs_shop;charset=utf8', 
	'satou_hidetoshi', 'Asdf3333-');
$sql=$pdo->prepare('select * from customer where login=? and password=?');
$sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
foreach ($sql as $row) {
	$_SESSION['customer']=[
		'id'=>$row['id'], 'name'=>$row['name'], 
		'address'=>$row['address'], 'login'=>$row['login'], 
		'password'=>$row['password'],'email'=>$row['email']];
}
if (isset($_SESSION['customer'])) {
	require 'menu.php';
	echo '<br>';
	echo 'いらっしゃいませ、', $_SESSION['customer']['name'], 'さん。';
   

} else {
	require 'menu.php';
	echo '<br>';
	echo 'ログイン名またはパスワードが違います。';
	
}
?>
<?php require '../footer.php'; ?>
