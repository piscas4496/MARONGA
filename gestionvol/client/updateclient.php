<?php include("../config/connexiondb.php");?>
<?php


if(isset($_GET['idclient']) AND !empty($_GET['idclient'])){
	$getid=$_GET['idclient'];
$requete=$db->prepare("SELECT * FROM reservation WHERE idclient=?");
$requete->execute(array($getid));
if ($requete->rowCount()==1) {
	
	 
	$req = $db->prepare("DELETE FROM reservation WHERE idclient=?");
	 $req->execute(array($getid));
	 echo '<div class="alert alert-info">'.'voulez vous suprimer?';
	 header("Location: ../formulaires/menu.php");
}else{
	echo "client non retrouver";
}

}else{
	echo "id non trouver";
}