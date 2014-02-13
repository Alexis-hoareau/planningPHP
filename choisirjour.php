<?php
if(!empty($_POST['jour'])){
  session_start();
  $_SESSION['jour'] = date("Y-m-d", strtotime($_POST['jour']));
  header('Location: affiche.php');
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>choisirjour</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$jour=$( "#datepicker" ).datepicker();
});
</script>
</head>

<body>
<form action="choisirjour.php" method="post">
<legend> Choisissez un jour </legend>
<p>Date: <input type="text" id="datepicker" name="jour"></p>
<p><input type="submit" value="valider" /></p>
</form>
</body>
</html>
