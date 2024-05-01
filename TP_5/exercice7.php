<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 7</title>
</head>
<body>
    <?php
        $tableau = array() ; 
        for($i = 1 ; $i<=10 ; $i++ ){
            for($j = 1 ; $j<=10 ; $j++){
                $tableau[$i][$j] = $i*$j ;
            }
        } 
        for($i = 1 ; $i<=10 ; $i++ ){
            echo '  ';
            for($j = 1 ; $j<=10 ; $j++){
                echo $tableau[$i][$j].'    ' ;
            }
            echo '<br>' ; 
        } 

        echo "<br><br>" ; 
            $tableau = array();
            for ($i = 1; $i <= 10; $i++) {
                for ($j = 1; $j <= 10; $j++) {
                    $tableau[$i][$j] = $i * $j;
                }
            }

            echo '<table border="1">';
            echo '<tr><td></td>';
            for ($j = 1; $j <= 10; $j++) {
                echo '<td>' . $j . '</td>';
            }
            echo '</tr>';

            for ($i = 1; $i <= 10; $i++) {
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                for ($j = 1; $j <= 10; $j++) {
                    echo '<td>' . $tableau[$i][$j] . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';

    ?>
</body>
</html>