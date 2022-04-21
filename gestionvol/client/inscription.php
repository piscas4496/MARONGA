<?php include("../parties/header.php"); ?>


<?php
$errors="";
try{
if (isset($_POST['envoyer'])) {
	if (isset($_POST['nom']) AND isset($_POST['postnom']) AND isset($_POST['prenom']) AND isset($_POST['genre']) AND isset($_POST['age']) AND isset($_POST['telephone']) AND isset($_POST['email']) AND isset($_POST['nationalite']) AND isset($_POST['password'])) {

		if (!empty($_POST['nom']) AND !empty($_POST['postnom']) AND !empty($_POST['prenom']) AND !empty($_POST['genre']) AND !empty($_POST['age']) AND!empty($_POST['telephone']) AND !empty($_POST['email']) AND !empty($_POST['nationalite']) AND !empty($_POST['password'])) {

			$Nom = htmlspecialchars(trim(strtoupper($_POST['nom'])));
			$Postnom =htmlspecialchars(trim(strtoupper($_POST['postnom'])));
			$Prenom =htmlspecialchars(trim($_POST['prenom']));
			$Genre =htmlspecialchars(trim($_POST['genre']));
			$Age =htmlspecialchars(trim($_POST['age']));
			$Telephone =htmlspecialchars(trim($_POST['telephone']));
			$Email= htmlspecialchars(strtolower($_POST['email']));
			$Nationalite =htmlspecialchars(trim($_POST['nationalite']));
			$Password = sha1($_POST['password']);

			if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {

            $req = $db->prepare('SELECT email FROM client WHERE email=?');
			$req->execute(array($Email));
			$donnees = $req->fetch();

			$req = $db->prepare('SELECT telephone FROM client WHERE telephone =?');
			$req->execute(array($Telephone));
			$donnet = $req->fetch();
						if ($donnet OR $donnees  ){
 	// Si une adresse email existe  c'est qu'un membre possède déjà le pseudo.
							echo "votre adresse et le numero de telephone existent deja viellez changer ton adresse";
		}else{
			$req=$db->prepare("INSERT INTO client(nom,postnom,prenom,genre,datenais,telephone,email,nationnalite,passwordcl)VALUES(?,?,?,?,?,?,?,?,?)");
			$req->execute([$Nom,$Postnom,$Prenom,$Genre,$Age,$Telephone,$Email,$Nationalite,$Password]);

			$errors="bravo vous evez reserver une place au esein de la CAA";
			}
			}else{
				$errors="votre email doit etre correct!";
			}
			}else{
		 	 $errors= "certains champs sont encore vides viellez remplir svp";
		 	     }
		}else{
		 	 $errors="tous les champs doivent exister";
	 		 }
 }


}catch(EXCEPTION $e){
			 $errors= "echec:".$e->getmessage();
		}
?>







<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
 

<body>
	
		<form method="POST">
			<div class="row">
				<div class="jumbotron col-md-5">
				<marquee>	
			    <img src="../images/volalemand.JPG" style="width:500px;height:500px;">
				</marquee>	
				</div>
				<div class="jumbotron col-md-4">
					<div class="control-group">
						<label for="nom">Nom</label>
						<input type="text" name="nom" class="form-control">
					</div>

					<div class="control-group">
						<label for="postnom">Postnom</label>
						<input type="text" name="postnom" class="form-control">
					</div> 

					<div class="control-group">
						<label for="prenom">Prenom</label>
						<input type="text" name="prenom" class="form-control">
					</div>

					<div class="control-group ">
						<label for="genre">Genre</label>
						<select name="genre" class="form-control">
						<option value="femme">Feminin</option>
						<option value="homme">Masculin</option>
					</select>
					</div>
					<div class="control-group">
						<label for="age">Annee de naissance</label>
				    	<select name="age" class="form-control" >
				    	<option value="2000">annee</option><br>	
				    	<?php for($i=1920; $i <2021; $i++) { 
				    		echo '<option>'.$i.'<br></option>';
				    	 } ?>
				    	
				    </br>
				    	</select>
					</div>

					
					<div class="control-group">
						<label for="telephone">Numero telephone</label>
				    	<input type="text" name="telephone" class="form-control">
					</div>
					</div>
					<div class="jumbotron col-md-3">
					<div class="control-group">
						<label for="email">Adresse Email</label>
				    	<input type="text" name="email" class="form-control">					
					</div>

					<div class="control-group">
						<label for="nationalite">Pays</label>
						<input type="text" name="nationalite" class="form-control">
					</div>
					
					<div class="control-group">
						<label for="password">Mot de passe</label>
				   		<input type="password" name="password" class="form-control">
					</div>												
					<br>
					<input type="submit" name="envoyer" value="Reserver une place" class="btn btn-success"><br><br>
					<?php if (isset($errors)) {
					echo $errors;
				} ?>
				
				</div>
				
		  </div>
		  
	  </form>
	<!--traiment de formulaire en php -->
</body>
</html>




