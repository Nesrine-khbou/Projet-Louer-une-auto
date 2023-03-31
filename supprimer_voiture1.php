<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.min.css">

    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" href="shared.css">
    <link rel="stylesheet" href="formulaire.css">
    <link rel="stylesheet" href="affichage.css">

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
    <main>
        <div id="space"></div>
        <?php 
            include "connexion.php";
            if(isset($_POST["supprimer"])){
                $_SESSION['immat_a_supp']=$_POST["immat_a_supp"];
                $sql="select immatriculation,marque,modele,cylindre,dateachat from voiture where immatriculation=".$_SESSION["immat_a_supp"];
                $voiture=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
                echo " <table>
                    <tr class=\"dark\">
                    <th>Immatriculation</th>
                    <th>Marque</th>
                    <th>Modele</th>
                    <th>Cylindre</th>
                    <th>Date Achat</th>
                    </tr>

                    <tr>
                    <th>".$voiture[0]->immatriculation."</th>
                    <th>".$voiture[0]->marque."</th>
                    <th>".$voiture[0]->modele."</th>
                    <th>".$voiture[0]->cylindre."</th>
                    <th>".$voiture[0]->dateachat."</th>
                    </tr>
                </table>
                
                <form method=\"post\" action=\"supprimer_voiture1.php\">
                <label for=\"a\">Vous voulez vraiment supprimer cette voiture?</label>
                <section>
                 <center><button type=\"submit\" name=\"submit\">Submit</button> </center>
                </section>
                </form>";



            }
            
            if(isset($_POST["submit"])){
                $sql = "delete from voiture where immatriculation=".$_SESSION["immat_a_supp"];
                $stmt= $cnx->prepare($sql);
                $stmt->execute();

                echo" <div id=\"succees\"> La voiture est supprime avec succees </div>";

                $sql="select * from voiture";
                $voitures=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
    
                echo "<h1>Liste Des Voitures</h1>";
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

        
            }

        ?>
    </main>

</body>
</html>