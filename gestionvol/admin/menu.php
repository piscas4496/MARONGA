<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php include("../partie/header.php"); ?>
<body>
<!-- creation de modal -->




















	<div class=" row">
		<div id="navbarre"class=" col-md-2">
		<BR>
		
			<a href="pilote.php">PILOTE<BR></a>
			<a  href="vol.php">VOL<BR></a>
			<a  href="#">AEROPORT<BR></a>
			<a href="#">COMPTABLE</a>			
		</div>
		<div class="col-md-10">
				
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
			echo "<th> ADRESSE EMAIL</th>";
			echo "<th>PAYS</th>";
			echo "<tr>";	
				foreach ($liste as $listes) {
					if ($listes==true) {				
		  echo "<tr>";
          echo ' <tr><td>'.$listes['idclient'].'</td><td>'.$listes['nom'].'</td><td> '.$listes["postnom"].'</td><td>'.$listes["prenom"].'</td><td>'.$listes["genre"].'</td><td>'.$listes["telephone"].'</td><td>'.$listes["email"].'</td><td>'.$listes["nationnalite"].'</td>';
          ?>
   <td> <button class="btn btn-success">classer client</button> </td><td>	
     	<button class="btn btn-primary">modifier</button></td><td>	
  <a href="../fonctions/deleteclient.php?idclient=<?=$listes['idclient']?>"onClick="return(confirm('voulez vous vraiment supprimer cet element?'))" class="btn btn-danger">Suprimer</a></td><td>
    	 
 </tr>
<?php		
				}else{
					echo'<tr><td colspan="5">Aucun element</td></tr>';	
			}

		}
				echo'</table>';
	}catch(SQLException $e){
	echo "erreur".$e->getmessage();}
?>	
			
				
		</div>		
	</div>
<!-- 
		<a id="adresse" id="adresse" href="vol.php">Ajouter un vol</a>
		<a id="adresse" href="pilote.php">ajouter un pilote</a>
		<a id="adresse" href="#">ajouter agent</a>
	
		 <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
 -->
	</body>
</html>

<style >

tr{
	/*partie du tableau*/
	border:1px solid black;
	text-align: center;
	border-radius: 5px;	
}	
/*bare de navigation */
#navbarre{
	padding-top: 5%;
  background-color: #343A40;
  color: white;
  font-color:white;
}

	
</style>