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
    <link rel="stylesheet" href="formulaire.css">
    <script src="bootstrap.min.js"></script>
    <title>Louer Une Auto</title>
</head>
<body>
    <main>

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

        <div id="space"></div>
        <form method="post" action="ajouteLocationClient.php">
            <label for="IdLocation">Id Location</label>
            <input type="text" name="IdLocation" placeholder="entrer l'id de location..." required>
            <br> 
            <label for="immat">Immatriculation</label>
            <input type="text" name="immat" placeholder="entrer l'immatriculation..." required>
            <br>
            <label for="date_debut">Date De Debut</label>
            <input type="date" name="date_debut" placeholder="entrer la date de debut..." required>
            <br>
            <label for="date_fin">Date De Fin</label>
            <input type="date" name="date_fin" placeholder="entrer la date de fin..." required>
            <br>
            <label for="date_rentree">Date De Rentree</label>
            <input type="date" name="date_rentree" placeholder="entrer la date de rentree..." required>
            <br>


            <section>
                <button type="submit" name="ajouter">Submit</button>
            </section>
        </form>
    </main>
</body>
</html>