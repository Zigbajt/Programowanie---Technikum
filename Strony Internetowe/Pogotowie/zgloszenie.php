<?php
	$z=$_POST['z'];
	$d=$_POST['d'];
	$a=$_POST['a'];
	
	if(isset($_POST['submit'])){
		$p=mysqli_connect("localhost","root","","ratownictwo")
		or die ("brak połączenia");
		$dodawanie="INSERT INTO `zgloszenia`(`id`, `ratownicy_id`, `dyspozytorzy_id`, `adres`, `pilne`, `czas_zgloszenia`) VALUES (null,'$z','$d','$a',0,Now());";
		mysqli_query($p,$dodawanie)
		or die ("błąd");
		
	}
	mysqli_close($p)
?>