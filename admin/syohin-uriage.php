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

<div class="container">
<aside>
<?php require 'kanri.php'; ?>
</aside>

<?php

require 'connect.php';
	$sql = "SELECT product_id, COUNT(count) as co , price , name , count(count) * price as shokei

	FROM `purchase_detail` AS d
	LEFT JOIN purchase AS p ON purchase_id = p.id
	LEFT JOIN product as s ON product_id = s.id
	Group by product_id
	Order by shokei DESC
	Limit 50
	";

  //サニタイズする
$id= htmlspecialchars($_GET['id'],ENT_QUOTES);
	$sql_product = $pdo->prepare( $sql );
                //バインド機構は余計な記号を排除する
                //数字とそれ以外でINTかSTRが変わる
	$sql_product->bindValue(1, $id, PDO::PARAM_INT);
	$sql_product->execute();
	//$sql->query($s);
	
?>

<main>
	<table id= "sort_table">
	
		<tr>
			<th>商品番号</th><th>商品名</th><th>個数</th><th>価格</th><th>小計</th>
		</tr>

<?php	
	foreach ($sql_product as $row) {
?>
<tr>
<td><?=$row['product_id']?></td>
<td><?=$row['name']?></td>
<td><?=$row['co']?></td>
<td><?=$row['price']?></td>
<td><?=number_format($row['shokei'])?></td>
</tr>

<?php
$gokei +=$row['shokei']; } ?>

<tr>
  <td>合計売上  ¥<?=number_format($gokei)?>-</td></tr>
	
  </table>  
	
	</main>
		


	<script>
let column_no = 0; //今回クリックされた列番号
let column_no_prev = 0; //前回クリックされた列番号
window.addEventListener('load', function () {
	document.querySelectorAll('#sort_table th').forEach(elm => {
		elm.onclick = function () {
			column_no = this.cellIndex; //クリックされた列番号
			let table = this.parentNode.parentNode.parentNode;
			let sortType = 0; //0:数値 1:文字
			let sortArray = new Array; //クリックした列のデータを全て格納する配列
			for (let r = 1; r < table.rows.length; r++) {
				//行番号と値を配列に格納
				let column = new Object;
				column.row = table.rows[r];
				column.value = table.rows[r].cells[column_no].textContent;
				sortArray.push(column);
				//数値判定
				if (isNaN(Number(column.value))) {
					sortType = 1; //値が数値変換できなかった場合は文字列ソート
				}
			}
			if (sortType == 0) { //数値ソート
				if (column_no_prev == column_no) { //同じ列が2回クリックされた場合は降順ソート
					sortArray.sort(compareNumberDesc);
				} else {
					sortArray.sort(compareNumber);
				}
			} else { //文字列ソート
				if (column_no_prev == column_no) { //同じ列が2回クリックされた場合は降順ソート
					sortArray.sort(compareStringDesc);
				} else {
					sortArray.sort(compareString);
				}
			}
			//ソート後のTRオブジェクトを順番にtbodyへ追加（移動）
			let tbody = this.parentNode.parentNode;
			for (let i = 0; i < sortArray.length; i++) {
				tbody.appendChild(sortArray[i].row);
			}
			//昇順／降順ソート切り替えのために列番号を保存
			if (column_no_prev == column_no) {
				column_no_prev = -1; //降順ソート
			} else {
				column_no_prev = column_no;
			}
		};
	});
});
//数値ソート（昇順）
function compareNumber(a, b)
{
	return a.value - b.value;
}
//数値ソート（降順）
function compareNumberDesc(a, b)
{
	return b.value - a.value;
}
//文字列ソート（昇順）
function compareString(a, b) {
	if (a.value < b.value) {
		return -1;
	} else {
		return 1;
	}
	return 0;
}
//文字列ソート（降順）
function compareStringDesc(a, b) {
	if (a.value > b.value) {
		return -1;
	} else {
		return 1;
	}
	return 0;
}
</script>
		
git branch add-mail./admin/syohin-uriage.php