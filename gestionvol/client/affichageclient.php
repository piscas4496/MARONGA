<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php include("connexiondb.php");?>
<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.CSS">
<style type="text/css">
	tr,th,td{

		border: 1px solid black;
	}

</style>
<body>
	<?php
try{

$req= $db->prepare("SELECT * FROM reservation");
$execute = $req->execute();
$liste = $req->fetchAll(PDO::FETCH_ASSOC);

		echo "<table>";
		echo "<tr>";
		echo "<th>MATICULE</th>";
		echo "<th>NOM</th>";
		echo "<th>POSTNOM</th>";
		echo "<th>PRENOM</th>";
		echo "<th>GENRE</th>";
		echo "<th>TELEHPONE</th>";
		echo "<th>EMAIL</th>";
		echo "<th>PAYS</th>";
		echo "<tr>";
foreach ($liste as $listes) {
	if ($listes==true) {$i++;

		
		
	echo "<tr>";
	echo'<tr><td>'.$listes['idclient'].'</td><td>'.$listes['nom'].'</td><td>'.$listes['postnom'].'</td><td>'.$listes['prenom'].'</td><td>'.$listes['genre'].'</td><td>'.$listes['telephone'].'</td><td>'.$listes['email'].'</td><td>'.$listes['nationnalite'].'</td>'.'</tr><br>';



	echo "</tr>";
}else{
	echo'<tr><td colspan="5">Aucun element</td></tr>';	

}
}
echo'</table>';

}catch(SQLException $e){
	echo "erreur".$e->getmessage();
}
?>		


    
</body>
</html>