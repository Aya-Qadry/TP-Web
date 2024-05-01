<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 9 </title>
</head>
<body>
    <?php
        $tableau = array(10 , 3.5 , 12 , 500) ; 
        $somme = 0 ;
        for($i = 0 ; $i<= 3 ; $i++){
            $tableau[$i] = $tableau[$i]*10 ;
            $somme += $tableau[$i] ;
        }
        foreach($tableau as $row){
            echo "$row £" ; 
            echo "<br>" ; 
        }
        echo "Somme en euros : $somme £" ;

    ?>
</body>
</html>