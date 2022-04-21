	<?php 
//session_start();
 include("../parties/header.php");
  $error="";
  if (isset($_POST['connexion'])) {
 	 if (isset($_POST['email']) AND isset($_POST['password'])) {
 	 	if(!empty($_POST['email']) AND !empty($_POST['password'])) { 


 	 		$Email= htmlspecialchars(trim($_POST['email']));
           	$Password =htmlspecialchars($_POST['password']);
           
             
 	 	  		$req=$db->prepare("SELECT email,passwordcl FROM client WHERE email=?");
           			$req->execute(array($Email) );
           			
					 		$data= $req->fetch();
					 		if ($req->rowcount()>=1) {
					 			header('location:../client/profil.php');
					 		//$_SESSION['passwordadmin'] =$Password;

					 			echo "connexion effectuez";
		               			}else{
 	 								$error="login ou mot de passe incorect!";
 	 					     		} 
																	
						}else{
							 $error= "vous devez rempli les champs svp!";
				     		 }	
      		
      	 		}else{
      				$error = "certains champs n'existent pas ";
      				 }
	        }
	 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<!-- <link rel="stylesheet" type="text/css" href="syle.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css"> -->
<body>
<div class="container" align="center"  > 
	<form id="formul"  method="POST" class="jumbotron">
		
			<img id="imagedesign" src="../images/portraipilote.JPG" ><br>
				<div class="control-group">
				  	<label>Email</label>
		           	<input type="text" name="email"  class="form-control">
				</div>
				<div class="control-group">
					<label>mot de passe</label><br>
		       		 <input type="password" name="password" class="form-control"><br>
			   </div>
				<input type="submit" name="connexion" value="Se connecter" class="btn btn-primary">	

				<?php
 			if (isset($error)) { echo'<div class="callout callout-info" style="color:red;">'.$error.'</div>'; } ?>		
			 </div>
	

</form>
	</div>
<body>
</html>

<style>
#formul{
		border: 2px solid blue;
		border-radius: 10px;
		width: 300px; 
		height: 500px; 
	   position:center;
	   margin-top: 100px;
	}
	
#imagedesign{
 	 width:150px;
	 height: 150px; 
	 border-radius:50%;
    }

    </style>