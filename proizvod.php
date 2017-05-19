<?php
// ispis detalja o odabranom proizvodu
if ( isset($_GET['proizvodid']) )
{
	$query = "SELECT p.slika, p.naziv, p.kolicina, p.cijena, pr.naziv AS proizvodjac
				FROM proizvodi p, proizvodjaci pr
				WHERE p.id = " . $_GET['proizvodid'] .
				" AND p.id_proizvodjac = pr.id";

	$result = $baza->query($query);
	$row = $result->fetch_array();

	echo '<table border="1 align-center">';
	echo '<tr>';
	echo '<td><img src="img/'.$row['slika'].'"></td>';
	echo '<td>';
	echo '<b>Naziv: </b>'.$row['naziv'].'<br />';
	echo '<b>Količina: </b>'.$row['kolicina'].'<br />';
	echo '<b>Proizvođač: </b>'.$row['proizvodjac'].'<br />';
	echo '<h2>Cijena: '.$row['cijena'].' Kn</h2><br />';
	echo '</td>';
	echo '</tr>';
	echo '</table>';

	echo '<br />';
	echo '<form method="POST" action="">';
	echo '<input type="text" name="kolicina" value="1" />';
	echo '<input type="hidden" name="proizvodnaziv" value="'.$row['naziv'].'" />';
	echo '<input type="hidden" name="cijena" value="'.$row['cijena'].'" />';
	echo '<input type="submit" name="btnDodaj" value="dodaj" />';
	echo '</form>';
}

?>
