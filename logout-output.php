<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (isset($_SESSION['customer'])) {
	unset($_SESSION['customer']);
	echo 'ログアウトしました。';
	?>
	<meta http-equiv="refresh" content="3;url=http://satou_hidetoshi.org/nuts2-shop/index.php">
	<?php
} else {
	echo 'すでにログアウトしています。';
	?>
	<meta http-equiv="refresh" content="3;url=http://satou_hidetoshi.org/nuts2-shop/index.php">
<?php	
}
?>
<?php require 'footer.php'; ?>
