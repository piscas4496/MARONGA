<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.CSS">
<?php include("../parties/header.php"); ?>
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
			<div class="jumbotron col-md-6">
				
				


				
				<div class="control-group ">
					<label for="idvol">numero du client</label>
					<select name="idclient" class="form-control" required="required">
					
						 <?php
								$req= $db->prepare("SELECT * FROM reservation");
								$execute = $req->execute();
								$liste = $req->fetchAll(PDO::FETCH_ASSOC);
									foreach ($liste as $listes) {
																		
						           echo '<option >'.$listes['idclient']."</br>".'</option>'; } ?>
						       
					
					
				</select>
				</div>
								
				
				<div class="control-group ">
					<label for="genre">numero vol</label>
					<select name="numeroclassement" class="form-control" required="required">
				
						
						<?php
								$req= $db->prepare("SELECT * FROM classement");
								$execute = $req->execute();
								$liste = $req->fetchAll(PDO::FETCH_ASSOC);
									foreach ($liste as $listes) {

							echo '<option >'.$listes['numeroclassement']."</br>".'</option>';} ?> 
																		
						        
					</option>
					
				</select>
				<input type="submit" name="enregistrer" value="Enrregisrer le ">
						<label for="villedepart">Ville de depart</label>
				    	<input type="text" name="villedepart" class="form-control">
					</div>
					<div class="control-group">
						<label for="destination">Detination</label>
						<input type="text" name="destination" class="form-control">
					</div class="control-group">lassement" class="btn btn-success">
						<div>
						<label for="villedepart">Ville de depart</label>
				    	<input type="text" name="villedepart" class="form-control">
					</div>
					<div class="control-group">
						<label for="destination">Detination</label>
						<input type="text" name="destination" class="form-control">
					</div class="control-group">
				</div>
				</br>
				

					<div >
					
					<?php
try{

$req= $db->prepare("SELECT nom,prenom,numeroclassement,idvol,designation,datealler,heurealler FROM pilote,vol, classement WHERE idvol=idvole AND matriculepilote=idpilote ");
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
		echo "<th>date decolage</th>";
		
		echo "<tr>";

foreach ($liste as $listes) {
	if ($listes==true ) {
	
	echo "<tr>";
	echo'<tr><td>'.$listes['numeroclassement'].'</td><td>'.$listes['idvol'].'</td><td>'.$listes['designation'].'</td><td>'.$listes['nom'].'</td><td>'.$listes['prenom'].'</td><td>'.$listes['datealler'].'</td><td>'.$listes['heurealler'].'</tr><br>';



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
	</div>
</body>
</html>

<?php

if (isset($_POST['enregistrer'])){
	 			if (isset($_POST['idclient']) AND isset($_POST['numeroclassement'])){ 

	 				   if (!empty($_POST['idclient']) AND !empty($_POST['numeroclassement'])){ 

							$Idclient=htmlspecialchars(trim($_POST['idclient']));
							$Numeroclassement=htmlspecialchars(trim($_POST['numeroclassement']));
						
						
							$req=$db->prepare("INSERT INTO classementclient(idclient,idclassement)VALUES(?,?)");
						$req->execute([	$Idclient,$Numeroclassement]);
						
	                    }else{
	                    	echo "remplisser tous les champs ";
	                    }


	                 }else{
	                 	echo "certains champs n'existe pas c'est dommage";
	                 }

	             }	

	?>	



