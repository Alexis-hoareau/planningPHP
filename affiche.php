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
if(!empty($_SESSION['login'])){
  echo "Bienvenue ici ".$_SESSION['login']."<br/>";
  echo "Votre SID est ".session_id()."<br/>";

  $sql="SELECT nomActivite,heure FROM participe where login=:login and jour=:jour";
  $stmt=$connexion->prepare($sql);
  $stmt->bindParam(':login',$_SESSION['login']);
  $stmt->bindParam(':jour',$_SESSION['jour']);
  $stmt->execute();
  if($stmt->rowCount()>0)
    {
      echo "Liste des activités : <br/>";
      while($act = $stmt->fetch()){
	?><option value="Planning"> <?php
	echo $act['nomActivite']." : ".$act['heure']." heure<br/>";
	?></option><?php
      }
    }
}

else header('Location: authBD.php');
?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title> Votre liste d\'activités</title>
</head>

<body>
<form action="choisiractivite.php" method="POST">
<p><input type='submit' value='ajouter une activite'></p>
</form>

<form action="choisirjour.php" method="POST">
<p><input type='submit' value='choisir un autre jour'></p>
</form>

<form action="deconnect.php" method="POST">
<p><input type='submit' value='deconnexion'></p>
</form>


</body>
</html>