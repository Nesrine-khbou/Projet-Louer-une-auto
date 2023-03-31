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
            <a class="navbar-brand" href="index.php">Louer Une Auto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Acceuil</a>
                    </li>
                    

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Gestion Voitures
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="affichageVoitures.php">Afficher voitures </a></li>
                        <li><a class="dropdown-item" href="formulaire_voiture.php">Inserer voiture</a></li>
                        <li><a class="dropdown-item" href="formulaire_modifier_voiture.php">Modifier Voitures</a></li>
                        <li><a class="dropdown-item" href="#">Supprimer voiture</a></li>

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
                            <li><a class="dropdown-item" href="#">Supprimer client</a></li>

                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestion Locations
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Afficher Locations </a></li>
                            <li><a class="dropdown-item" href="#">Inserer Location</a></li>
                            <li><a class="dropdown-item" href="#">Modifier Locations</a></li>
                            <li><a class="dropdown-item" href="#">Supprimer Location</a></li>

                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </nav> 
 <?php 
    include "connexion.php";
    if(isset($_POST["ajouter"])){
        $marque=$_POST["marque"];
        $modele=$_POST["modele"];
        $sql="select c.IdClient,c.Nom,c.Prenom,c.CodePostal,c.localite,c.telephone,c.Email from clients c, locations l,voiture v
              where c.IdClient = l.IdClient and v.immatriculation=l.immatriculation and marque='$marque' and modele='$modele'";
        $clients=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
        echo "<h1>Liste Des Clients qui ont loue la voiture de marque $marque et de modele $modele</h1>";
        echo " <table>
        <tr class=\"dark\">
        <th>IdClient</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Code Postal</th>
        <th>Localite</th>
        <th>Telephone</th>
        <th>Email</th>
        </tr>";
        foreach ($clients as $client) {
            echo"<tr>
            <th>".$client->IdClient."</th>
            <th>".$client->Nom."</th>
            <th>".$client->Prenom."</th>
            <th>".$client->CodePostal."</th>
            <th>".$client->localite."</th>
            <th>".$client->telephone."</th>
            <th>".$client->Email."</th>

            </tr>";
        }
        echo "</table>";

    }
    ?>
</body>
</html>