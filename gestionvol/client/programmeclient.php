<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<?php include("../partie/header.php"); ?>
<body>
<?php
	$req= $db->prepare("SELECT idclient,nom,postnom,genre,prenom,telephone,email,designation,datealler,heurealler FROM reservation,vol, classement,classementclient WHERE idvol=idvole AND numeroclassement=idclassement AND idclient=idcl");
	$execute = $req->execute();
	$liste = $req->fetchAll(PDO::FETCH_ASSOC);

		echo "<table>";
		echo "<tr>";
		echo "<th>Numero client</th>";
		echo "<th>Nom</th>";
		echo "<th>Pstnom</th>";
		echo "<th>Prenom</th>";
		echo "<th>Genre</th>";
		echo "<th>Numero telephone</th>";
		echo "<th>Email</th>";
		echo "<th>Nom Du vol</th>";
		echo "<th>Desitnation</th>";
		echo "<th>Date de decolage</th>";
		echo "<th>Heure de decolage</th>";
		echo "<th>date decolage</th>";
		
		echo "<tr>";

foreach ($liste as $listes) {
	if ($listes==true ) {
	
	echo "<tr>";
	echo '<tr><td>'.$listes["idclient"].'</td><td>'
	.$listes["nom"].'</td><td>'
	.$listes["postnom"].'</td><td>'
	.$listes["prenom"].'</td><td>'
	.$listes["genre"].'</td><td>'
	.$listes["telephone"].'</td><td>'
	.$listes["email"].'</td><td>'
	.$listes["designation"].'</td><td>'
	.$listes["destination"].'</td><td>'
	.$listes["prenom"].'</td><td>'
	.$listes["datealler"].'</td><td>'
	.$listes["heurealler"].'</tr><br>';
}}

?>
</body>
</html>