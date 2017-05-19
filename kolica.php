<?php
if(isset($_POST['empty_cart']))
{
$_SESSION=array();
unset($_SESSION['narudzba']);
session_destroy();
}
// ispis sadržaja kolica
if ( isset($_SESSION['narudzba']) )
{
	$ukupnaCijena = 0;
	
	echo '<h3>Sadržaj kolica:</h3>';
	echo '<table border="1">';
	foreach ( $_SESSION['narudzba'] as $proizvodID => $narudzba)
	{
		echo '<tr>';
		echo '<td>'.$narudzba['naziv'].'</td>';
		echo '<td>'.$narudzba['cijena'].' Kn</td>';
		echo '<td>'.$narudzba['kolicina'].'</td>';
		echo '<td>'.$narudzba['kolicina']*$narudzba['cijena'].' Kn</td>';
		echo '</tr>';
		$ukupnaCijena += $narudzba['kolicina']*$narudzba['cijena'];
	}
	echo '<tr><td colspan="4"><h3>Ukupno: '.$ukupnaCijena.' Kn</h3></td></tr>';
	echo '</table>';
}

?>
<form action="" method="post">
<input type="submit" name="empty_cart" value="Isprazni košaricu">
</form>
