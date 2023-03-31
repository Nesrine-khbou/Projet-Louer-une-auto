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
    //ajout de client
    if(isset($_POST["ajouter"])){
        $idClient=$_POST["idClient"];
        $nom=$_POST["nom"];
        $prenom=$_POST["prenom"];
        $codePostal=$_POST["codePostal"];
        $localite=$_POST["localite"];
        $telephone=$_POST["telephone"];
        $email=$_POST["email"];


        $sql="insert into clients(idClient,nom,prenom,codePostal,localite,telephone,email) values('$idClient','$nom','$prenom','$codePostal','$localite','$telephone','$email')";
        $cnx->exec($sql);
        echo" <div id=\"succees\"> Le client est ajoutee avec succees </div>";
        //affichage de liste de clients apres ajout
        $sql="select * from clients";
        $clients=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
        $i=sizeof($clients);

        echo "<h1>Liste Des clients</h1>";
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
        echo"<tr id=\"new\">
        <th>".$clients[$i-1]->IdClient."</th>
        <th>".$clients[$i-1]->Nom."</th>
        <th>".$clients[$i-1]->Prenom."</th>
        <th>".$clients[$i-1]->CodePostal."</th>
        <th>".$clients[$i-1]->localite."</th>
        <th>".$clients[$i-1]->telephone."</th>
        <th>".$clients[$i-1]->Email."</th>

        </tr>";
        $x=0;
        foreach ($clients as $client) {
            if($x != $i-1){
                echo"<tr>
                <th>".$client->IdClient."</th>
                <th>".$client->Nom."</th>
                <th>".$client->Prenom."</th>
                <th>".$client->CodePostal."</th>
                <th>".$client->localite."</th>
                <th>".$client->telephone."</th>
                <th>".$client->Email."</th>
                </tr>";
                $x+=1;
            }
        }
        echo "</table>";
    }
    ?>
</body>
</html>