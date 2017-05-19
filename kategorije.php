
<?php

// ispis kategorija proizvoda
$query = "SELECT * FROM kategorije";
$result = $baza->query($query);


echo "| ";
while ($row = $result->fetch_array())
{
	echo "\t" . '<a href="?kategorijaid='.$row['id'].'">';
	echo $row['naziv'];
	echo '</a> | ' . "\n";
}
echo "\t" . "<br /><br /><br />" . "\n";

// ispis proizvoda ako je odabrana kategorija
if ( isset($_GET['kategorijaid']) )
{
	$query = "SELECT * FROM proizvodi WHERE id_kategorija = ".$_GET['kategorijaid'];
	$result = $baza->query($query);

	echo '<table border="1">' . "\n";
	echo "\t" . '<tr><th>slika</th><th>naziv</th><th>cijena</th></tr>' . "\n";
	while ( $row = $result->fetch_array() )
	{
		echo "\t" . '<tr>' . "\n";

		echo '<td>';
		echo '<a href="?proizvodid='.$row['id'].'">';
		echo '<img src="img/'.$row['slika'] . '" height="50" />';
		echo '</a>';
		echo '</td>';
		echo '<td>';
		echo '<a href="?proizvodid='.$row['id'].'">';
		echo $row['naziv'] . "<br />";
		echo '</a>';
		echo '</td>';
		echo '<td>';
		echo $row['cijena'] . " Kn<br />";
		echo '</td>' . "\n";

		echo "\t" . '</tr>' . "\n";
	}
	echo "</table>" . "\n";
}

?>
