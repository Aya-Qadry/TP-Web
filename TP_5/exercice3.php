<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 3</title>
</head>
<body>
    <h1>Facture</h1>
    <?php
       $produit1 = array(
            "nom"=>"coca" , 
            "prix"=>10,
            "valeur"=>5 , 
            "tva"=>0.1 , 
            "quantite"=>10
        ) ;
       $produit2 = array(
        "nom"=>"brosse" , 
        "prix"=>100,
        "valeur"=>50 , 
        "tva"=>0.1 , 
        "quantite"=>3
        ) ;
        $produit3 = array(
            "nom"=>"lit" , 
            "prix"=>1000,
            "valeur"=>700 , 
            "tva"=>0.3 , 
            "quantite"=>5
       ) ;
       $tableau = array($produit1,$produit2,$produit3);
       $prix_total = 0 ;
       echo "<table style='border : 1px solid black;'>" ; 
        echo "<tr><th>Nom</th><th>Prix TTC</th><th>Quantite</th></tr>";
       foreach($tableau as $row){
           $ttc = $row["prix"]*($row["tva"]+1) ; 
           echo "<tr>" ; 
           echo "<td>".$row['nom']."</td>" ;
           echo "<td>".$ttc."</td>";
           echo "<td>".$row['quantite']."</td></tr>"; 
           $prix_total += $ttc*$row["quantite"] ;
       }
       echo "<tr><td></td></tr>" ; 
       echo "<tr><td>Prix total de la facture est <b> $prix_total</b> </td></tr>" ;
       echo "</table>" ; 
    ?>
</body>
</html>