<?php

 include_once 'include/bootstrapLinkCss.php';
   session_start();
   session_unset();
   session_destroy();
   echo '<h1>'.'Vous venez de quitter la session...'.'</h1>';
   echo '<h2>'.'Retour vers la page LOGIN dans 3 secondes'.'</h2>';
   header('Refresh: 3; URL =login.php');
   exit;
