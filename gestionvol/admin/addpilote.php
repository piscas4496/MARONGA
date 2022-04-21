<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php include("connexiondb.php");?>
<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.CSS">
<?php include("../partie/header.php"); ?>
</head>
<body>
	<form method="POST">
	<div class=" row">
	<!--<button class="btn btn-primary" data-toggle="modal" data-target="#mypilote" >Modal</button>	
		
			<div id="affichage" class="  col-md-10">
				<div id="mypilote" class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
						
					<div class="modal-body">-->
					
			
			<div class=" jumbotron col-md-4">
				
				<div class="control-group">
					<label for="nom">Nom</label>
					<input type="text" name="nom" class="form-control" required="required">
				</div>

				<div class="control-group">
					<label for="postnom">Postnom</label>
					<input type="text" name="postnom" class="form-control" required="required">
				</div> 

				<div class="control-group">
					<label for="prenom">Prenom</label>
					<input type="text" name="prenom" class="form-control" required="required">
				</div>

				

				<div class="control-group ">
					<label for="genre">Genre</label>
					<select name="genre" class="form-control" required="required">
					<option value="femme">Feminin</option>
					<option value="homme">Masculin</option>
				</select>
				</div>

				

				<div class="control-group">
					<label for="telephone">mobile</label>
				    <input type="text" name="telephone" class="form-control" required="required">
				</div>
			    </div>
			    <br>
			    <div class="col-md-4">
				<div class="control-group">
					<label for="email">Adresse Electronoque</label>
				    <input type="text" name="email" class="form-control" required="required">
				<br>
				</div>		
				<div class="control-group">
					<label for="nationalite">Pays</label>
					<input type="text" name="nationalite" class="form-control" required="required">

				</div>

				<div class="control-group">
					<label for="password">Mot de passe</label>
					<input type="password" name="password" class="form-control" required="required">

				</div>

				<div class="control-group">
					<label for="passwordconf">Cnfirmer le Mot de passe </label>
					<input type="passwordconf" name="passwordconf" class="form-control" required="required">
				</div>
				<input type="submit" name="envoyer" value="Ajouter un pilote" class="btn btn-success">
				</div>	
			</form>
				<div class="jumbotron col-md-4">
					<img src="../images/portraipilote.JPG" style=" width:330px;height:250px;">
					<img src="../images/portraipilote.JPG" style="width:330px;height:250px;">
					
					</div>
				</div>
				</div>
				
			</div>
		</div>








	
	<!--traiment de formulaire en php -->
</body>
</html>


<?php

try{
if (isset($_POST['envoyer'])) {
	if (isset($_POST['nom']) AND isset($_POST['postnom']) AND isset($_POST['prenom']) AND isset($_POST['genre'])  AND isset($_POST['telephone']) AND isset($_POST['email']) AND isset($_POST['nationalite']) AND isset($_POST['password']) AND  isset($_POST['passwordconf'])) {

		if (!empty($_POST['nom']) AND !empty($_POST['postnom']) AND !empty($_POST['prenom']) AND !empty($_POST['genre']) AND!empty($_POST['telephone']) AND !empty($_POST['email']) AND !empty($_POST['nationalite']) AND !empty($_POST['password']) AND  !empty($_POST['passwordconf'])) {

			$Nom = htmlspecialchars(trim($_POST['nom']));
			$Postnom =htmlspecialchars(trim($_POST['postnom']));
			$Prenom =htmlspecialchars(trim($_POST['prenom']));
			$Genre =htmlspecialchars(trim($_POST['genre']));
			$Telephone =htmlspecialchars(trim($_POST['telephone']));
			$Email= htmlspecialchars(strtolower($_POST['email']));
			$Nationalite =htmlspecialchars(trim($_POST['nationalite']));	
			$Password =htmlspecialchars(trim($_POST['password']));
			$Passwordconf = htmlspecialchars(trim($_POST['passwordconf']));
             
             if ($password==$Passwordconf) {
             	
    		
	  $req=$db->prepare("INSERT INTO pilote(nom,postnom,prenom,genre,mobile,email,nationnalite,passwordpilote)VALUES(?,?,?,?,?,?,?,?)");
		 $req->execute([$Nom,$Postnom,$Prenom,$Genre,$Telephone,$Email,$Nationalite,$Password]);

			echo "<allert allert-info bravo vous evez reserver une place au esein de la CAA";
		
		 }else {
		 	echo "les deux mots de passe sont differents";
		 }
		
	}else{
		echo "certains champs sont encore vides viellez remplir svp";
	}

}else{
	echo "tous les champs doivent exister";
}

}


}catch(EXCEPTION $e){
			echo"echec:".$e->getmessage();
		}


?>