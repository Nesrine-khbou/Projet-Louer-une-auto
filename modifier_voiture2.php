<!DOCTYPE html>
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
    <!-- <header>
        <div id="page-title">
            <a href="index.html">Louer Une Auto</a>
        </div>
        <div id="options">
            <ul>
                <li>
                    <a id="acceuil" href="index.php">
                        <p>Acceuil</p>
                    </a>
                </li>

                <li>
                    <a href="formulaire_voiture.php">
                        <p>Gestion Voitures</p>
                    </a>
                </li>
                
                <li>
                    <a href="tutorials.html">
                        <p>Gestion Clients</p>
                    </a>
                </li>
                <li>
                    <a href="quizzes.html">
                        <p>Gestions Locations</p>
                    </a>
                </li>
            </ul>
        </div>

    </header> -->

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
                        <li><a class="dropdown-item" href="formulaire_modifier_voiture.php">Modifier Voiture</a></li>
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
    <main>
        <div id="space"></div>
        <?php 
    include "connexion.php";
    //modification de voiture
    if(isset($_POST["ajouter"])){
        $immatMod=$_POST["immatMod"];
        $marqueMod=$_POST["marqueMod"];
        $modeleMod=$_POST["modeleMod"];
        $cylindreMod=$_POST["cylindreMod"];
        $dateachatMod=$_POST["dateachatMod"];

        $sql="update voiture set marque='$marqueMod' , modele='$modeleMod' , cylindre='$cylindreMod' , dateachat='$dateachatMod' where immatriculation='$immatMod'";
        $cnx->exec($sql);
        echo" <div id=\"succees\"> La voiture est modifie avec succees </div>";
        //affichage des donnees e voiture modifie
        echo " <table>
        <tr class=\"dark\">
        <th>Immatriculation</th>
        <th>Marque</th>
        <th>Modele</th>
        <th>Cylindre</th>
        <th>Date Achat</th>
        </tr>";
        echo"<tr id=\"new\">
        <th>".$immatMod."</th>
        <th>".$marqueMod."</th>
        <th>".$modeleMod."</th>
        <th>".$cylindreMod."</th>
        <th>".$dateachatMod."</th>
        </tr>";
    }
    ?>
    </main>
</body>
</html>