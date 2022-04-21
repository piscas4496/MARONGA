<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php include("../parties/header.php"); ?>
<body>
	
		<form method="POST">
			<div class="row">
				<div class="col-md-8">
				
			    <img src="../images/volalemand.JPG" style="width:1000px;height:500px;">
				
				</div>
				<div class="jumbotron col-md-4">

					<div class="control-group">
						<label for="text">id client</label>
						<input type="number" name="idclient" class="form-control">
					</div>

					<div class="control-group">
						<label for="dateres">Date Reservation</label>
						<input type="date" name="dateres" class="form-control">
					</div>

					<div>
						<label for="villedepart">Ville de depart</label>
				    	<input type="text" name="villedepart" class="form-control">
					</div>
					<div class="control-group">
						<label for="destination">Detination</label>
						<input type="text" name="destination" class="form-control">
					</div class="control-group">
					<div class="control-group">
						<label for="bagage"> Bagages</label>
				   		<input type="text" name="bagage" class="form-control">
					</div>												
					<br>
					<input type="submit" name="envoyer" value="Reserver une place" class="btn btn-success">
				</div>
				
		  </div>
	  </form>
	<!--traiment de formulaire en php -->
</body>
</html>


<?php

//try{
if (isset($_POST['envoyer'])) {
	if (isset($_POST['idclient']) 
		  AND isset($_POST['dateres']) AND 
		   isset($_POST['villedepart']) 
		   AND isset($_POST['destination'])
		    AND isset($_POST['bagage'])) {

		if (!empty($_POST['idclient'])
		    AND !empty($_POST['dateres']) 
		    AND  !empty($_POST['villedepart']) 
		    AND !empty($_POST['destination'])
		     AND !empty($_POST['bagage'])) {

			$Ideclient = htmlspecialchars(trim(strtoupper($_POST['idclient'])));
			$Dateres = htmlspecialchars(trim($_POST['dateres']));
			$Villedepart =htmlspecialchars(trim($_POST['villedepart']));
			$Destination = htmlspecialchars(trim($_POST['destination']));
			$Bagages =htmlspecialchars(trim($_POST['bagage']));

            $req = $db->prepare('SELECT dateres FROM reservation WHERE dateres =?');
			$req->execute(array($Dateres));
			$donnees = $req->fetch();

						if ($donnees  ){
 	// Si une date existe  c'est qu'un membre .
							echo "votre adresse et le numero de telephone existent deja viellez changer ton adresse";
		}else{
			$req=$db->prepare("INSERT INTO reservation(idclient,dateres,villedepart,destination,bagages)VALUES(?,?,?,?,?)");
			$req->execute([$Ideclient,$Dateres,$Villedepart,$Destination,$Bagages]);

			echo "bravo vous evez reserver une place au esein de la CAA";
			}
			}else{
		 	 echo "certains champs sont encore vides viellez remplir svp";
		 	     }
		}else{
		 	 echo "tous les champs doivent exister";
	 		 }
 }


//}catch(EXCEPTION $e){
		//	echo"echec:".$e->getmessage();
		//}
?>