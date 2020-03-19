<?php

session_start();
   session_unset();
   session_destroy();

   echo 'Vous venez de quitter la session...';
   echo 'Retour vers la page LOGIN dans 5 secondes';
   header('Refresh: 5; URL = ../login.php');
   exit;
