<?php
try{
$db= new PDO("mysql:host=localhost;dbname=gestionvol","root","");
}catch(PDOEXCEPTION $e){ 
echo "echec:".$e->getmessage();
}

?>