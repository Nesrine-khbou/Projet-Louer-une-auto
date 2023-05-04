<?php
session_start();


if(!isset($_SESSION["email"] )&& !isset($_SESSION["mdp"]))
{
	header("location:authentification.php");
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="shared.css">
    <link rel="stylesheet" href="affichage.css">
    <script src="bootstrap.min.js"></script>
    <title>Louer Une Auto</title>
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index_content_client.php">Louer Une Auto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index_content_client.php">Acceuil</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="afficher_profile.php">Afficher profile </a></li>
                            <li><a class="dropdown-item" href="edit_profile.php">Modifier profile</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Activités 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="recherche_voiture_l_client.php">Afficher les voitures loués </a></li>
                            <li><a class="dropdown-item" href="recherche_locations_client.php">Afficher les locations effectués </a></li>
                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestion Locations
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="affichageVoituresClient.php">Consulter la liste des voitures </a></li>
                            <li><a class="dropdown-item" href="formulaireLocationClient.php">Effectuer une location</a></li>
                        </ul>
                    </li>
                    <li class="nav-item" id="logout">
                        <a class="nav-link active" aria-current="page" href="logOut.php">Log Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <?php 
    include "connexion.php";
        $sql="select v.immatriculation,v.marque,v.modele,v.cylindre,v.dateachat from clients c, locations l,voiture v
              where c.IdClient = l.IdClient and v.immatriculation=l.immatriculation and  Email='".($_SESSION['email'])."' and mot_de_passe='".($_SESSION['mdp'])."'";
        $voitures=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
        echo "<h1>Liste Des Voitures loue  </h1>";
        echo " <table>
        <tr class=\"dark\">
        <th>Immatriculation</th>
        <th>Marque</th>
        <th>Modele</th>
        <th>Cylindre</th>
        <th>Date Achat</th>
        </tr>";
        foreach ($voitures as $voiture) {
            echo"<tr>
            <th>".$voiture->immatriculation."</th>
            <th>".$voiture->marque."</th>
            <th>".$voiture->modele."</th>
            <th>".$voiture->cylindre."</th>
            <th>".$voiture->dateachat."</th>
            </tr>";
        }
        echo "</table>";

    ?>
    </body>
</html>