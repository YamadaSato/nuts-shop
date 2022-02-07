<?php session_start();?>
<?php require "../header.php";?>
<?php require "menu.php";?>
<?php require '../chapter6/connect.php';?>

<?php
// if (isset($_SESSION['customer'])) {
//   //ログインしてたら = セッションがあれば
//   $id=$_SESSION['customer']['id'];
//   $sql=$pdo->prepare('
// 			select * from customer 
// 			where id!=? 
// 			and login=?');
//   $sql->execute([$id,$_REQUEST['login']]);
//    // 該当する顧客のデータ行(必ず1行ある)
// } else {
	//ログインしてない場合
	$sql=$pdo->prepare('
		select count(*) from customer 
		where login=?');
	$sql->execute([$_REQUEST['login']]);
	// 該当する顧客のデータ行(0行か1行)
// }  ※ログイン名があるかないか

// var_dump($sql->fetch()['count(*)']);
// exit;

if ( $sql->fetch()['count(*)'] == 0 ) {
	//作ろうとしてる(変更しようとしてる)ログイン名がない場合
		if (isset($_SESSION['customer'])) {
			$id = $_SESSION['customer']['id'];

				$sql=$pdo->prepare('
				update customer set 
							 name=?, 
							 address=?,
							 login=?, 
							 password=?, 
							 email=?
				where id=?');
			// 既存顧客情報の上書き
				$sql->execute([   // ?の数だけ書く
							$_REQUEST['name'],
							$_REQUEST['address'],
							$_REQUEST['login'],
							$_REQUEST['password'],
							$_REQUEST['email'],
							$id]
						);
				//ログインセッションに値を代入		
				$_SESSION['customer']=[
					 'id'=>$id, //変わらないので入れ直さなくていい
					'name'=>$_REQUEST['name'],
					'address'=>$_REQUEST['address'],
					'login'=>$_REQUEST['login'],
					'password'=>$_REQUEST['password'],
					'email'=>$_REQUEST['email']
				];
				echo 'お客様情報を更新しました。';
				//既存ユーザの処理は終わり

		} 
} else {
    echo 'ログイン名がすでに使用されていますので、変更してください。';
}
?>

<?php require "../footer.php";?>

