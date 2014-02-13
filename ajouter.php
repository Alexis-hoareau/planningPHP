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
$sql="SELECT heure FROM participe where login=:login and jour=:jour and heure=:heure";
$stmt=$connexion->prepare($sql);
$stmt->bindParam(':login',$_SESSION['login']);
$stmt->bindParam(':jour',$_SESSION['jour']);
$stmt->bindParam(':heure',$_SESSION['heure']);
$stmt->execute();

if($stmt->rowCount()==0)
  {
    $sql="INSERT INTO participe (login, nomActivite, jour, heure) VALUES(:login,:nomActivite,:jour,:heure)";
    $stmt=$connexion->prepare($sql);
    $stmt->bindParam(':login',$_SESSION['login']);
    $stmt->bindParam(':jour',$_SESSION['jour']);
    $stmt->bindParam(':heure',$_SESSION['heure']);
    $stmt->bindParam(':nomActivite',$_SESSION['nomActivite']);
    $stmt->execute();

    echo "Votre activité a bien été ajoutée !";
  }
else echo "Vous avez déjà une activité à cette heure ! <br/>";

?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title> Ajout</title>
</head>

<body>
<form action="affiche.php" method="POST">
<p><input type='submit' value='revenir au menu'></p>
</form>

<form action="deconnect.php" method="POST">
<p><input type='submit' value='deconnexion'></p>
</form>
</body>
</html>