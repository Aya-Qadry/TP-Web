<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 5</title>
</head>
<body>
    <?php
    include 'sommefunction.php' ; 
        $tableau = array(5,1,0,3);
        $somme = 0 ;
        foreach($tableau as $t) {
            $somme += $t ; 
        }
        echo "a) $somme <br>" ; 

        $somme = 0 ;
        function somme($tab,$somme){
            foreach($tab as $t){
                $somme += $t ; 
            }
            return $somme ;
        }

        echo "b) " .somme($tableau,$somme) ;
        echo "<br>" ;  

        echo "c) " .sommef($tableau) ; 

    ?>
</body>
</html>