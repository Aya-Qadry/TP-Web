<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 10</title>
</head>
<body>
    <?php
        $fichier = fopen("information.txt" , "r+") ; 
        while($row=fgets($fichier)){
            $column = explode("|",$row); 
            if (count($column) === 4) {
                list($prenom, $nom, $adresse, $ville) = $column;
        
                echo "Prénom: $prenom <br>";
                echo "Nom: $nom <br>";
                echo "Adresse: $adresse <br>";
                echo "Ville: $ville <br>";
                echo "<br>";
            }

            // $i = 0 ; 
            // while($i<3){
            //     echo "Prenom : $column[$i] <br>";
            //     $i++ ; 
            //     echo "Nom : $column[$i] <br>" ; 
            //     $i++ ; 
            //     echo "Adresse : $column[$i] <br>" ; 
            //     $i++ ; 
            //     echo"Ville : $column[$i] <br>" ; 
            //     echo"<br> "; 
            // }
            // $i = 0 ;          
        }
        fclose($fichier);
    ?>
</body>
</html>