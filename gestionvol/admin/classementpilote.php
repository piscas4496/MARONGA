<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.CSS">
<?php include("../partie/header.php"); ?>
<style type="text/css">
	th,td,tr
	{
		border: 1px solid black;
	}
</style>

<body>
<form method="POST">

	
		<div class="row">
			<div>

			</div>
			<div class=" col-md-12">
				
				<div class="control-group">
					<label for="datealler">Date aller</label>
					<input type="date" name="datealler" class="form-control" required="required">
				</div>

				<div class="control-group">
					<label for="heurealler">Heure de depart</label>
					<input type="time" name="heurealler" class="form-control" required="required">
				</div> 

				<div class="control-group">
					<label for="destination">Destionation</label>
					<input type="text" name="destionation" class="form-control" required="required">
				</div> 


				
				<div class="control-group ">
					<label for="idvol">numero du vol</label>
					<select name="idvol" class="form-control" required="required">
					
						 <?php
								$req= $db->prepare("SELECT * FROM vol");
								$execute = $req->execute();
								$liste = $req->fetchAll(PDO::FETCH_ASSOC);
									foreach ($liste as $listes) {
																		
						           echo '<option >'.$listes['idvol']."</br>".'</option>'; } ?>
						       
					
					
				</select>
				</div>
								
				
				<div class="control-group ">
					<label for="genre">matricule pilote</label>
					<select name="matriculepilote" class="form-control" required="required">
				
						
						<?php
								$req= $db->prepare("SELECT * FROM pilote");
								$execute = $req->execute();
								$liste = $req->fetchAll(PDO::FETCH_ASSOC);
									foreach ($liste as $listes) {

							echo '<option >'.$listes['matriculepilote']."</br>".'</option>';} ?> 
																		
						        
					</option>
					
				</select>
				</div>
				
				
					<br><input type="submit" name="enregistrer" value="Enrregisrer le classement" class="btn btn-success">

					<div >
					
					<?php
try{

$req= $db->prepare("SELECT nom,prenom,numeroclassement,idvol,designation,datealler,heurealler,destinationvol FROM pilote,vol,classement WHERE matriculepilote=idpilote AND idvol=idvole   ");
	$execute = $req->execute();
	$liste = $req->fetchAll(PDO::FETCH_ASSOC);

		echo "<table>";
		echo "<tr>";
		echo "<th>numero classement</th>";
		echo "<th>Id vol duvol</th>";
		echo "<th>Nom duvol</th>";
		echo "<th> nom pilote</th>";
		echo "<th>prenom pilote</th>";
		echo "<th>Desitnation</th>";
		echo "<th>Date decolage</th>";
		echo "<th>heure decolage</th>";
		
		echo "<tr>";

foreach ($liste as $listes) {
	if ($listes==true ) {
	
	echo "<tr>";
	echo'<tr><td>'.$listes['numeroclassement'].'</td><td>'.$listes['idvol'].'</td><td>'.$listes['designation'].'</td><td>'.$listes['nom'].'</td><td>'.$listes['prenom'].'</td><td>'.$listes['destinationvol'].'</td><td>'.$listes['datealler'].'</td><td>'.$listes['heurealler'].'</tr>';

  echo "</tr>";
}else{
	echo'<tr><td colspan="5">Aucun element</td></tr>';	

}

}
echo "<br>";
echo'</table>';

}catch(SQLException $e){
	echo "erreur".$e->getmessage();
}
?>			


</div>
</body>
</html>

<?php

if (isset($_POST['enregistrer'])){
	 			if (isset($_POST['datealler']) AND isset($_POST['heurealler']) AND isset($_POST['destionation']) AND isset($_POST['idvol']) AND  isset($_POST['matriculepilote'])){ 

	 				   if (!empty($_POST['datealler']) AND!empty($_POST['heurealler']) AND!empty($_POST['destionation']) AND !empty($_POST['idvol']) AND !empty($_POST['matriculepilote'])){ 

	 				   	$Datealler = htmlspecialchars(trim($_POST['datealler']));
						$Heurealler =htmlspecialchars(trim($_POST['heurealler']));
						$Destination=htmlspecialchars(trim($_POST['destionation']));
						$Idvol=htmlspecialchars(trim($_POST['idvol']));
						$Matriculepilote=htmlspecialchars(trim($_POST['matriculepilote']));
						

						$req = $db->prepare('SELECT heurealler FROM classement WHERE  heurealler =?');
						$req->execute(array($Heurealler));
						$donnet = $req->fetch();
						if ($donnet ){
							echo "ces informations existent deja veilez metre d'auters";

						}else{



							$req=$db->prepare("INSERT INTO classement(datealler,heurealler,destinationvol,idvole,idpilote)VALUES(?,?,?,?,?)");
								$req->execute([	$Datealler,$Heurealler,$Destination,$Idvol,$Matriculepilote]);
						
							}

	                    }else{
	                    	echo "remplisser tous les champs ";
	                    }


	                 }else{
	                 	echo "certains champs n'existe pas c'est dommage";
	                 }

	             }	

	?>	



