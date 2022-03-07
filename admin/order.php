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

main.tr,main.th,{
  
  font-size:40px;
  width:700px;
  height:300px;
  text-align:center;
  margin-left:10px;/*サイドバーとメインコンテンツの間に隙間                    をあけた*/
}
div.tr,div.td{
  font-size:40px;
  width:700px;
  height:300px;
  text-align:center;
  margin-left:10px
}


.container {
  display:flex;/*サイドバーとメインコンテンツを横並びにする                指定をした*/
}
</style>



<?php require '../header.php'; ?>

<div class="container">
<aside>
<?php require 'kanri.php'; ?>
</aside>
<main>
<table>
<td>
<th>伝票ID |</th>
<th>購入者名 |</th>
<th>日付 |</th>
<th>合計 |</th>
</td>
</main>
<?php
require 'connect.php';

$s="SELECT purchase_id ,  SUM(count * price) as syokei,a.name
FROM purchase_detail AS d
LEFT JOIN purchase AS p ON purchase_id = p.id
LEFT JOIN product as s ON product_id = s.id
LEFT Join customer  as a ON customer_id=a.id

Group by purchase_id
ORDER BY purchase_id ASC
limit 50";

$sql=$pdo->prepare($s);

$sql->execute();


?>
<div>
<?php
foreach ($sql as $key ) {
  ?>
  <tr>
		<td> <a href = "order-detail.php?id=<?=$key['purchase_id']?>"><?=$key['purchase_id']?></a> </td>
    <td><?=$key['name']?> </td>
		<td>
			<?=date('Y年m月d日',strtotime($key['date']))?>
		</td>
		
		<td><?=$key['syokei']?> </td>
		
	</tr>
  <?php
}
?>
</div>
  </table>

