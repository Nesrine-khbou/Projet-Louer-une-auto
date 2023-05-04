<?php


    session_start();
    //unset($_SESSION['admin_email']);
    //unset($_SESSION['admin_mdp']);
    session_destroy() ;
    header('location:authentification.php');
    exit;
  
    
  

?>