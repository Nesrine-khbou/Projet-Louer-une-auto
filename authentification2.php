<?php 
    include "connexion.php";
    session_start();
    if(isset($_POST["submit"])){

        $Email=$_POST["Email"];
        $mdp=$_POST["mdp"];

        $sql = " SELECT * FROM clients WHERE  Email='$Email' && mot_de_passe='$mdp' ";
        $clients=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
        $i=sizeof($clients);

        if($i > 0){
      
            if($clients[0]->type == 'Admin'){
      
               $_SESSION['admin_email'] = $clients[0]->Email;
               $_SESSION['admin_mdp'] = $clients[0]->mot_de_passe;

               header('location:index_content_admin.php');
      
            }elseif($clients[0]->type == 'client'){
      
                $_SESSION['email'] = $clients[0]->Email;
                $_SESSION['mdp'] = $clients[0]->mot_de_passe;  

               header('location:index_content_client.php');
      
            }
           
         }else{
            header('location:authentification.php'); 
        }
      
    }
?>