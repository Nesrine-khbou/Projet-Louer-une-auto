<?php
session_start();

if(!isset($_SESSION["email"] )&& !isset($_SESSION["mdp"]))
{
	header("location:authentification.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">

<script src="bootstrap.min.js"></script>
<link rel="stylesheet" href="shared.css">
<link rel="stylesheet" href="affichage.css">
    <title>Ajouter voiture</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index_content_admin.php">Louer Une Auto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index_content_admin.php">Acceuil</a>
                    </li>
                    

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Gestion Voitures
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="affichageVoitures.php">Afficher voitures </a></li>
                        <li><a class="dropdown-item" href="formulaire_voiture.php">Inserer voiture</a></li>
                        <li><a class="dropdown-item" href="formulaire_modifier_voiture.php">Modifier Voiture</a></li>
                        <li><a class="dropdown-item" href="formulaire_supprimer_voiture.php">Supprimer voiture</a></li>

                    </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestion clients
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="affichageClient.php">Afficher clients </a></li>
                            <li><a class="dropdown-item" href="formulaire_client.php">Inserer client</a></li>
                            <li><a class="dropdown-item" href="formulaire_modifier_client.php">Modifier clients</a></li>
                            <li><a class="dropdown-item" href="formulaire_supprimer_client.php">Supprimer client</a></li>

                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestion Locations
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="affichageLocation.php">Afficher Locations </a></li>
                            <li><a class="dropdown-item" href="formulaireLocation.php">Inserer Location</a></li>
                            <li><a class="dropdown-item" href="formulaire_rechercheClientLocation.php">Recherche de clients</a></li>
                            <li><a class="dropdown-item" href="formulaire_rechercheVoitureLocation.php">Recherche de voitures</a></li>

                        </ul>
                    </li>
                    <li class="nav-item" id="logout">
                        <a class="nav-link active" aria-current="page" href="logOut.php" >Log Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
 <?php 
    include "connexion.php";
    if(isset($_POST["ajouter"])){
        $IdLocation=$_POST["IdLocation"];
        $immat=$_POST["immat"];
        $date_debut=$_POST["date_debut"];
        $date_fin=$_POST["date_fin"];
        $date_rentree=$_POST["date_rentree"];
        $sql0="select IdClient from clients where Email='".($_SESSION['email'])."' and mot_de_passe='".($_SESSION['mdp'])."'";

        $client=$cnx->query($sql0)->fetchAll(PDO::FETCH_OBJ);
        $IdClient=$client[0]->IdClient;

        // Vérifier si la voiture est déjà louée pour la période sélectionnée  
        $sql1 = "select * from locations where immatriculation = $immat AND (DateDebut>= '$date_debut' and DateFin <= '$date_fin')";
        $locations1=$cnx->query($sql1)->fetchAll(PDO::FETCH_OBJ);
        if(sizeof($locations1)>0){
            echo" <div id=\"succees\"> Désolé, cette voiture n'est pas disponible pour la période sélectionnée. Veuillez choisir une autre voiture ou une autre période </div>";
        }
        else {
            $sql="insert into locations(IdLocation,IdClient,immatriculation,DateDebut,DateFin,DateRentree) values('$IdLocation','$IdClient','$immat','$date_debut','$date_fin','$date_rentree')";
            $cnx->exec($sql);
            echo" <div id=\"succees\"> La location est ajoutee avec succees </div>";

            $sql="select * from locations";
            $locations=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
            $i=sizeof($locations);

            echo "<h1>Liste Des Locations</h1>";
            echo " <table>
            <tr class=\"dark\">
            <th>IdLocation</th>
            <th>IdClient</th>
            <th>immatriculation</th>
            <th>DateDebut</th>
            <th>DateFin</th>
            <th>DateRentree</th>
            </tr>";
            echo"<tr id=\"new\">
            <th>".$locations[$i-1]->IdLocation."</th>
            <th>".$locations[$i-1]->IdClient."</th>
            <th>".$locations[$i-1]->immatriculation."</th>
            <th>".$locations[$i-1]->DateDebut."</th>
            <th>".$locations[$i-1]->DateFin."</th>
            <th>".$locations[$i-1]->DateRentree."</th>

            </tr>";
            echo "</table>";
        }
    }
    ?>
</body>
</html>