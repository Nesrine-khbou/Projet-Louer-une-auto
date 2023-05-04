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
    //ajout de voiture
    if(isset($_POST["ajouter"])){
        $immat=$_POST["immat"];
        $marque=$_POST["marque"];
        $modele=$_POST["modele"];
        $cylindre=$_POST["cylindre"];
        $date_achat=$_POST["date_achat"];

        if($_FILES['image']['error']>0)
            echo "une erreur s'est produite";
        else{
            //renommer le fichier
            $name=$_FILES['image']['name'];
            $new_name=time().$name;
            while(file_exists("pics/".$new_name))
            $new_name=time().$name;
    
            copy($_FILES['image']['tmp_name'],"pics/".$new_name);
        

            $sql="insert into voiture(immatriculation,marque,modele,cylindre,dateachat,nomImage) values('$immat','$marque','$modele','$cylindre','$date_achat','$new_name')";
            $cnx->exec($sql);
            echo" <div id=\"succees\"> La voiture est ajoutee avec succees </div>";
            //affichage de liste de voitures apres ajout
            $sql="select * from voiture";
            $voitures=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
            $i=sizeof($voitures);

            echo "<h1>Liste Des Voitures</h1>";
            echo " <table>
            <tr class=\"dark\">
            <th>Immatriculation</th>
            <th>Marque</th>
            <th>Modele</th>
            <th>Cylindre</th>
            <th>Date Achat</th>
            <th>Image</th>
            </tr>";
            echo"<tr id=\"new\">
            <th>".$voitures[$i-1]->immatriculation."</th>
            <th>".$voitures[$i-1]->marque."</th>
            <th>".$voitures[$i-1]->modele."</th>
            <th>".$voitures[$i-1]->cylindre."</th>
            <th>".$voitures[$i-1]->dateachat."</th>
            <th> <img src=\"pics/".$voitures[$i-1]->nomImage."\"  width=200 height=150> </th>
            </tr>";
            $x=0;
            foreach ($voitures as $voiture) {
                if($x != $i-1){
                    echo"<tr>
                    <th>".$voiture->immatriculation."</th>
                    <th>".$voiture->marque."</th>
                    <th>".$voiture->modele."</th>
                    <th>".$voiture->cylindre."</th>
                    <th>".$voiture->dateachat."</th>
                    <th> <img src=\"pics/".$voiture->nomImage."\"  width=200 height=150 > </th>
                    </tr>";
                    $x+=1;
                }
            }
            echo "</table>";
        }
    }
    ?>
</body>
</html>