<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 6 </title>
</head>
<body>
    <?php
        $tableau = array("Saturday","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday");
        echo "<ol>" ; 
        foreach($tableau as $index => $jour) {
            echo "<li>Jour $index : $jour</li>";
        }
        echo "</ol>";
    ?>
</body>
</html>