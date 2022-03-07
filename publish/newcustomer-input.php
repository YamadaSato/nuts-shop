<?php 
 session_start(); 
 require 'header.php'; 
 require 'menu.php'; 
?>

<form action="newcustomer-output.php" method="post">
<table>
<tr><td>お名前(*)</td><td>
<input type="text" name="name"  required>
</td></tr>
<tr><td>郵便番号(*)</td><td>
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
<form class="h-adr">
  <span class="p-country-name" style="display:none;">Japan</span>
  <input type="text" class="p-postal-code" size="10" maxlength="8"></td></tr>
  
<tr><td>ご住所(*)</td><td>
<input type="text" class="p-region p-locality p-street-address p-extended-address" required>
</td></tr>
</form>
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

<?php require 'footer.php'; ?>
<style>
input[type="number"]::-webkit-outer-spin-button, 
input[type="number"]::-webkit-inner-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
} 
</style>
