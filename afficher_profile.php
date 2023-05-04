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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="shared2.css">
    <link rel="stylesheet" href="edit_profile.css">
    <script src="bootstrap.min.js"></script>
    <title>afficher profile</title>
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

    <main>
        <?php 
            include "connexion.php";
            $sql="select * from clients where Email='".($_SESSION['email'])."' and mot_de_passe='".($_SESSION['mdp'])."'";
            $client=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);

            echo "
            <center>
                <section id=\"profile\">
                    <section id=\"prof_header_sec\">
                        <ul id=\"prof_header\">
                            <li><h1>Mon Profile</h1></li>
                        </ul>
                    </section>
                    <section id=\"profile_pic\">
                        <p>Votre photo profile</p>
                        <ul id=\"edit_pic\">
                            <li><img src=\"pics/".$client[0]->imgClient."\"  width=150 height=150 ></li>
                        </ul>
                    </section>
                    <section id=\"profile_data\">
                            <ul class=\"inline_2\">
                                <li>
                                    <label for=\"lname\">Nom</label>
                                    <p class=\"data\">". $client[0]->Nom." </p>
                                </li>
                                <li>
                                    <label for=\"name\">Prenom</label>
                                    <p class=\"data\">".$client[0]->Prenom."</p>
                                </li>
                            </ul>
                            <ul class=\"inline_2\">
                                <li>
                                    <label for=\"adress\">Localite</label>
                                    <p class=\"data\">".$client[0]->localite."</p>
                                </li>
                                <li>
                                    <label for=\"codepostal\">Code Postal </label>
                                    <p class=\"data\">".$client[0]->CodePostal."</p>
                                </li>
                            </ul>
                            <ul class=\"inline_2\">
                                <li>
                                    <label for=\"email\">Email</label>
                                    <p class=\"data\">".$client[0]->Email."</p>
                                </li>
                            </ul>
                            <ul class=\"inline_2\">
                                <li>
                                    <label for=\"Telephone\">Telephone </label>
                                    <div id=\"telephone_input\">
                                    <p class=\"data\">+216</p>
                                        <p class=\"data\">".$client[0]->telephone."</p>
                                    </div>
                                </li>
                                <li>
                                    <label for=\"mot_de_passe\">Mot De Passe</label>
                                    <p class=\"data\">".$client[0]->mot_de_passe."</p>
                                </li>
                            </ul>

                        </li>
                    </ul>

                </section>
                </center>";

    ?>
    </main>
    
</body>
</html>