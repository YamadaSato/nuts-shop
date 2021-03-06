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


<?php 
session_start();
require '../header.php'; 
require 'connect.php'; ?>
<div class="container">
<aside>
<?php require 'kanri.php'; ?>
</aside>
<main>
<?php
// アップしたファイルが有れば
//複数アップのループ処理をここに追加
$count = count($_FILES["file"]["name"]);

for($i = 0; $i < $count; $i++){
	if (is_uploaded_file($_FILES['file']['tmp_name'][$i] )) {

		if (!file_exists('upload')) mkdir('upload');// なければフォルダを作る

		// ファイル形式の精査
		$mime = mime_content_type($_FILES['file']['tmp_name'][$i]);
		
		if($mime == 'image/jpeg'){  // jpg イメージなら
			 
					//移動先のパス
					$file = 'upload/'.basename($_FILES['file']['name'][$i]);

					if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $file)) {
						echo $file, 'のアップロードに成功しました。';
						echo '<p><img src="', $file, '"></p>';
							$upfiles[] = $file; //ファイルパスの配列を作成
							$upfile = serialize($upfiles); // 配列をシリアライズ

					} else {
						echo 'アップロードに失敗しました。';
					}
				
			}else{
				echo "アップできるファイルはjpgのみ｡";
			}
	} else {
		echo 'ファイルを選択してください。';
	}
}
//ここまでペースト

$sql=$pdo->prepare(
	"INSERT into product values(null, ?, ? ,?)"
);

if ($sql->execute([ 
			$_REQUEST['name'],
			$_REQUEST['price'],
			$upfile
		])){
	echo '追加に成功しました。';
} else {
	echo '追加に失敗しました。';
}
?>
</main>
<?php require '../footer.php'; ?>