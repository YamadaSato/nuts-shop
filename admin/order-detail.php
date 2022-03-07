<main>

<?php
require 'connect.php';
	$sql = "SELECT purchase_id ,product_id, name
	, count ,price,count * price AS shokei 
	FROM `purchase_detail` AS d
	LEFT JOIN purchase AS p ON purchase_id = p.id
	LEFT JOIN product as s ON product_id = s.id
	WHERE purchase_id = ?";

  //サニタイズする
$id= htmlspecialchars($_GET['id'],ENT_QUOTES);
	$sql_purchase = $pdo->prepare( $sql );
                //バインド機構は余計な記号を排除する
                //数字とそれ以外でINTかSTRが変わる
	$sql_purchase->bindValue(1, $id, PDO::PARAM_INT);
	$sql_purchase->execute();
	//$sql->query($s);
	
?>
<h2>注文詳細</h2>
	<table>
		<tr>
			<th>注文番号</th><th>商品名</th><th>価格</th><th>個数</th><th>小計</th>
		</tr>

<?php	
	foreach ($sql_purchase as $row) {
?>
<tr>
<td><?=$row['product_id']?></td>
<td><?=$row['name']?></td>
<td><?=$row['count']?></td>
<td><?=$row['price']?></td>
<td><?=$row['shokei']?></td>
</tr>

<?php
$gokei +=$row['shokei']; } ?>

<tr>
  <td>合計  <?=$gokei?></td></tr>

  </table>  
		
		</table>
	</main>
</div>