<?php session_start();
 require "../header.php";
 require "menu.php";
 require '../chapter6/connect.php';

	$sql=$pdo->prepare('
		select count(*) from customer 
		where login=?');
	$sql->execute([$_REQUEST['login']]);
 //  ※同じログイン名があるかないか(重複不許可のため)

// var_dump($sql->fetch()['count(*)']);
// exit;


	//作ろうとしてる(変更しようとしてる)ログイン名がない場合
		if (isset($_SESSION['customer'])) {
	    echo 'すでにログインしています｡';
		}
		if ( $sql->fetch()['count(*)'] == 0 ) {
				// ログインしていないユーザーの登録処理
					$sql=$pdo->prepare('insert into customer values(null,?,?,?,?,?)');
					$sql->execute([
								$_REQUEST['name'],
								$_REQUEST['address'],
								$_REQUEST['email'],
								$_REQUEST['login'],
								$_REQUEST['password']
							]);
					echo 'お客様情報を登録しました。';
		}
	else {
    echo 'ログイン名がすでに使用されていますので、変更してください。';
}
?>

