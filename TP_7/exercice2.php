<?php
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=tp7_php", "root", "");
    }
    catch(PDOException $e){
        echo "Erreur de connexion" .$e->getMessage() ; 
    }

    $ins = $pdo -> prepare ("select * from personne ");
    $ins->setFetchMode(PDO::FETCH_ASSOC) ;
    $ins->execute() ; 
    $tab = $ins->fetchAll() ; 

    echo "<table border='1px solid black' >" ; 
    echo "<tr><th>Identifiant</th><th>Nom</th><th>Prenom</th><th>Login</th><th>Mot de passe</th><th>Ville</th></tr>" ; 
    
    for($i = 0 ; $i<count($tab) ; $i++ ){
        echo "<tr>" ; 
        echo "<td>".$tab[$i]["id_personne"]."</td>" ; 
        echo "<td>".$tab[$i]['nom']."</td>" ; 
        echo "<td>".$tab[$i]['prenom']."</td>" ; 
        echo "<td>".$tab[$i]['login']."</td>" ; 
        echo "<td>".$tab[$i]['mot_de_passe']."</td>" ; 
        echo "<td>".$tab[$i]['ville']."</td>" ; 
        echo "</tr>" ;
    }

    echo "</table>" ;
?>