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
        <?php
            include "connexion.php";
            //affichage des donnees de client a modifier
            if(isset($_POST["ajouter"])){
                $id_a_modifier=$_POST["id_a_modifier"];
                $sql="select * from clients where IdClient=$id_a_modifier";
                $client=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
                echo 
                "<form  method=\"post\" action=\"modifier_client2.php\" enctype=\"multipart/form-data\">
                
                    <label for=\"idMod\">Id Client</label>
                    <input type=\"text\" name=\"idMod\" value=".$client[0]->IdClient." required>

                    <label for=\"nomMod\">Nom</label>
                    <input type=\"text\" name=\"nomMod\" value=".$client[0]->Nom." required>
                    
                    <label for=\"prenomMod\">Prenom</label>
                    <input type=\"text\" name=\"prenomMod\" value=".$client[0]->Prenom." required>

                    <label for=\"codepostalMod\">Code Postal</label>
                    <input type=\"text\" name=\"codepostalMod\" value=".$client[0]->CodePostal." required>

                    <label for=\"localiteMod\">Localitet</label>
                    <input type=\"text\" name=\"localiteMod\" value=".$client[0]->localite." required>

                    <label for=\"telMod\">Telephone</label>
                    <input type=\"text\" name=\"telMod\" value=".$client[0]->telephone." required>

                    <label for=\"emailMod\">Email</label>
                    <input type=\"text\" name=\"emailMod\" value=".$client[0]->Email." required>

                    <label for=\"image\">Image</label>
                    <input type=\"file\" name=\"image\" required>

                    <label for=\"mdpMod\">Mot de Passe</label>
                    <input type=\"text\" name=\"mdpMod\" value=".$client[0]->mot_de_passe." required>

                    <section>
                    <button type=\"submit\" name=\"ajouter\">Submit</button>
                </section>
                </form>";
            }
        ?>
    </main>
    </body>
</html>