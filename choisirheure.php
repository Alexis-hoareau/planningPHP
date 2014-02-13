<?php

require_once('connect.php');

$dns="mysql:dbname=".BASE.";host=".SERVER;
try{
  $connexion=new PDO($dns,USER,PASSWD);
}
catch(PDOException $e){
  printf("Echec de la connexion : %s\n", $e->getMessage());
  exit();
}


session_start();
if(!empty($_GET['heure'])){
  $_SESSION['heure']=$_GET['heure'];
  header('Location: ajouter.php');
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ajout d\'une activite</title>
</head>
<body>
<form method="GET" action="choisirheure.php">
<fieldset>
<legend> Ajout </legend>
<p> A quelle heure voulez-vous placer cette activité ?
<br/>
<input type="radio" name="heure" value="9"/>
<label>de 9 à 10 h</label><br/>
<input type="radio" name="heure" value="10"/>
<label>de 10 à 11 h</label><br/>
<input type="radio" name="heure" value="11"/>
<label>de 11 à 12 h</label><br/>
<input type="radio" name="heure" value="14"/>
<label>de 14 à 15 h</label><br/>
<input type="radio" name="heure" value="15"/>
<label>de 15 à 16 h</label><br/>
<input type="radio" name="heure" value="16"/>
<label>de 16 à 17 h</label><br/>
<input type="radio" name="heure" value="17"/>
<label>de 17 à 18 h</label><br/>
<input type="radio" name="heure" value="18"/>
<label>de 18 à 19 h</label><br/>
<input type="radio" name="heure" value="19"/>
<label>de 19 à 20 h</label><br/>
<input type="radio" name="heure" value="20"/>
<label>de 20 à 21 h</label><br/>
<input type="radio" name="heure" value="21"/>
<label>de 21 à 22 h</label><br/>
<p><input type='submit' value='choir cette heure'></p>
</p>
</fieldset>
<hr>

</body>
</html>