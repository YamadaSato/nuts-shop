<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
require 'connect.php';
$purchase_id=1;

foreach ($pdo->query('select max(id) from purchase') as $row) {
	$purchase_id=$row['max(id)']+1;
	
}

$date=date("Y/m/d H:i:s");
try {
	//code...

$pdo->beginTransaction();



$sql=$pdo->prepare('insert into purchase values(?,?,null)');

if ($sql->execute([$purchase_id, $_SESSION['customer']['id']])) {
	foreach ($_SESSION['product'] as $product_id=>$product) {
		$sql=$pdo->prepare('insert into purchase_detail values(?,?,?)');
		$sql->execute([$purchase_id, $product_id, $product['count']]);
	}

	
	$pdo->commit();
	

	unset($_SESSION['product']);
	echo '購入手続きが完了しました。ありがとうございます。';
} 	
} catch(PDOException $e) {
echo $e->getmassage();
$pdo->rollBack();
}
?>
<?php require '../footer.php'; ?>








