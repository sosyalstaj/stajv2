<?php
	$sonuc="";
	if(@$_POST["giris"])
	{
		$email =@$_POST["email"];
		$parola =@$_POST["parola"];
		
		$sonuc=girisYap($email,$parola);
	}
?>
<div id="content-login">
	<div><h2>Giriş Yap</h2></div>
	<div><?php echo $sonuc;?></div>
	<form method="post">
		<div><input type="text" class="giris" name="email" placeholder="E-mail" required/></div>
		<div><input type="password" class="giris" name="parola" placeholder="parola" required/></div>
		<div><input type="checkbox" name="beni_hatirla" id="hatirla"/>Beni hatırla.
		<input type="submit" name="giris" value="Giriş" id="btngiris"/></div>
	</form>
</div>