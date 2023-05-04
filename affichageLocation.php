<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION["admin_email"] )&& !isset($_SESSION["admin_mdp"]))
{
	header("location:authentification.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.min.css">

    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" href="shared.css">
    <link rel="stylesheet" href="affichage.css">

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
        <?php
            include "connexion.php";
            $sql="select * from locations";
            $locations=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);

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
            foreach ($locations as $location) {
                echo"<tr>
                <th>".$location->IdLocation."</th>
                <th>".$location->IdClient."</th>
                <th>".$location->immatriculation."</th>
                <th>".$location->DateDebut."</th>
                <th>".$location->DateFin."</th>
                <th>".$location->DateRentree."</th>

                </tr>";
            }
            echo "</table>";
        ?>
    </main>

</body>
</html>