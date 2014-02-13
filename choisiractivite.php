<?php
session_start();
if(!empty($_GET['nomActivite'])){
  $_SESSION['nomActivite']=$_GET['nomActivite'];
  header('Location: choisirheure.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ajout d\'une activite</title>
</head>
<body>
<form method="GET" action="choisiractivite.php">
<fieldset>
<legend> Ajout </legend>
<p> Quelle activité voulez-vous ajouter ?
<br/>
<input type="radio" name="nomActivite" value="anglais"/>
<label>Anglais</label><br/>
<input type="radio" name="nomActivite" value="cafe"/>
<label>Café</label><br/>
<input type="radio" name="nomActivite" value="java"/>
<label>Java</label><br/>
<input type="radio" name="nomActivite" value="php"/>
<label>PHP</label><br/>
<input type="radio" name="nomActivite" value="python"/>
<label>Python</label><br/>
<input type="radio" name="nomActivite" value="repos"/>
<label>Repos</label><br/>
<p><input type='submit' value='choisir cette activité'/></p>
</p>
</fieldset>
</form>
<hr>

</body>
</html>