
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

$errorMessage = '';

//Test de l'envoi du formulaire
if(!empty($_POST))
{
   //Les identifiants sont transmis ?
   if(!empty($_POST['login']) && !empty($_POST['password']))
   {
     $sql="SELECT * FROM participant where login=:login and password=:password";
     $stmt=$connexion->prepare($sql);
     $stmt->bindParam(':login',$_POST['login']);
     $stmt->bindParam(':password',$_POST['password']);
     $stmt->execute();
     if($stmt->rowCount()!=1)
       {
         echo "Probl&#232;me d'authentification";
       }
     else // OK
     {
       //On ouvre la session
       session_start();
       //On enregistre le login en session
       $_SESSION['login'] = $_POST['login'] ;
       $_SESSION['password'] = $_POST['password'] ;
       header('Location: choisirjour.php');
       }
   }

}
else
   {
     $errorMessage = 'Veuillez inscrire vos identifiants svp !';
   }
?>


<!DOCTYPE HTML>
<html lang="fr">
  <head>
    <title> Formulaire d\'authentification </title>
  </head>

<?php
   if(!empty($errorMessage))
   {
      echo $errorMessage;
   }
?>

  <body>
    <form action="authBD.php" method="post">
      <fieldset>
        <legend> Identifiez-vous </legend>

        <p>
          <label for="login"> Login :</label>
          <input type="text" name="login" value="" />
        </p>
        <p>
          <label for="password"> Password :</label>
          <input type="password" name="password" value="" />
          <input type="submit" value="Se logguer" />
        </p>
      </fieldset>
    </form>
  </body> 
