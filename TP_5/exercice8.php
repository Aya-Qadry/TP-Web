<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 8</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
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

       function afficher($tab){
        echo "<table border='1'>";
        echo "<tr><th>Clé</th><th>Valeur</th></tr>";
    
        foreach ($tab as $t) {
            foreach($t as $cle=>$valeur){
                echo "<tr>";
                echo "<td>$cle</td>";  
                echo "<td>$valeur</td>";
                echo "</tr>";
            }
           
        }
    
        echo "</table>";
       }
    afficher($tableau) ; 
    ?>
</body>
</html>