<?php 
 session_start(); 
 require '../header.php'; 
 require 'menu.php'; 
?>

<form action="newcustomer-output.php" method="post">
<table>
<tr><td>お名前(*)</td><td>
<input type="text" name="name"  required>
</td></tr>
<tr><td>ご住所(*)</td><td>
<input type="text" name="address"  required>
</td></tr>
<tr><td>ログイン名(*)</td><td>
<input type="text" name="login" required>
</td></tr>
<tr><td>パスワード(*)</td><td>
<input type="password" name="password" 
	required>
</td></tr>
<tr><td>メールアドレス</td><td>
<input type="text" name="email" 
	>
</td></tr>
</table>
<input type="submit" value="確定">
</form>

<?php require '../footer.php'; ?>