<?php

session_start();




if (session_destroy()) {
    echo 'Session détruite !';
  } else {
    echo 'Erreur : impossible de détruire la session !';
  }


$message = "Deconnexion reussie Redirection en cours";
echo "<script type='text/javascript'>alert('$message');</script>";
echo "<meta http-equiv='refresh' content='0;URL=../index.php'>";

?>