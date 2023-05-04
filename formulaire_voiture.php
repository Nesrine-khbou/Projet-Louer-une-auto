<?php
session_start();

if(!isset($_SESSION["admin_email"] )&& !isset($_SESSION["admin_mdp"]))
{
	header("location:authentification.php");
}
?>
<!DOCTYPE html>
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
    <main>
        <div id="space"></div>
        <form method="post" action="ajouteVoiture.php" enctype="multipart/form-data">
            <label for="immat">Immatriculation</label>
            <input type="text" name="immat" placeholder="entrer l'immatriculation..." required>
            <br>
            <label for="marque">Marque</label>
            <input type="text" name="marque" placeholder="entrer la marque..." required>
            <br>
            <label for="modele">Modele</label>
            <input type="text" name="modele" placeholder="entrer le modele..." required>
            <br>
            <label for="cylindre">Cylindre</label>
            <input type="text" name="cylindre" placeholder="entrer le nombre de cylindres..." required>
            <br>
            <label for="date_achat">Date Achat</label>
            <input type="date" name="date_achat">
            <br>
            <label for="image">Image</label>
            <input type="file" name="image" required>
            <br>

            <section>
                <button type="submit" name="ajouter">Submit</button>
            </section>
        </form>
    </main>
    
</body>
</html>