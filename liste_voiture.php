<?php
    include "connexion.php";
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
    <th>Image</th>
    </tr>";
    foreach ($voitures as $voiture) {
        echo"<tr>
        <th>".$voiture->immatriculation."</th>
        <th>".$voiture->marque."</th>
        <th>".$voiture->modele."</th>
        <th>".$voiture->cylindre."</th>
        <th>".$voiture->dateachat."</th>
        <th> <img src=\"pics/".$voiture->nomImage."\"  width=200 height=150 > </th>
        </tr>";
    }
    echo "</table>";
?>