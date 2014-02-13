<?php
session_start();
echo "Au revoir, ".$_SESSION['login']." Vous avez ete deconnecte.";
session_destroy();
?>