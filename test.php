<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">

<script src="bootstrap.min.js"></script>
<link rel="stylesheet" href="shared.css">
<link rel="stylesheet" href="affichageVoitures.css">
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
                        <li><a class="dropdown-item" href="test.php">Modifier Voitures</a></li>
                        <li><a class="dropdown-item" href="#">Supprimer voiture</a></li>

                    </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestion clients
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Afficher clients </a></li>
                            <li><a class="dropdown-item" href="#">Inserer client</a></li>
                            <li><a class="dropdown-item" href="#">Modifier clients</a></li>
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
</tr>";
echo"<tr id=\"new\">
<th>".$voitures[$i-1]->immatriculation."</th>
<th>".$voitures[$i-1]->marque."</th>
<th>".$voitures[$i-1]->modele."</th>
<th>".$voitures[$i-1]->cylindre."</th>
<th>".$voitures[$i-1]->dateachat."</th>
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
        </tr>";
        $x+=1;
    }
}
echo "</table>";

?>
</body>
</html>