<?php
    session_start() ; 
    $cin = $_SESSION['cin'] ; 
    $type_user = $_SESSION['user_type'] ; 

    try{
        $pdo = new PDO("mysql:host=localhost;dbname=tp8_php","root","");
    }
    catch(PDOException $e){
        echo "Error in database connexion ".$e->getMessage() ; 
    }
        echo "<a href='login.php' id='logout'>Logout</a>" ; 

            if($type_user=="etudiant"){
                $ins1 = $pdo->prepare("select * from note_etudiant where cin=?") ;
                $ins1->setFetchMode(PDO::FETCH_ASSOC) ; 
                $ins1->execute(array($cin)) ; 
        
                $result1 = $ins1->fetchAll() ; 
                echo "<h2>Bienvenue " .$result1[0]['nom']."<br></h2>";
                echo "<table>" ;
                echo "<tr><th>Nom</th><th>CIN</th><th>note</th></tr>" ; 
                echo "<tr>" ; 
                echo "<td>".$result1[0]['nom']."</td>";
                echo "<td>".$cin."</td>";
                echo "<td>".$result1[0]['note']."</td>";
                echo "</tr>" ; 
                echo "</table>" ;

            } 
            if($type_user=="directeur"){
                $ins1 = $pdo->prepare("select * from note_etudiant where cin != ?") ;
                $ins1->setFetchMode(PDO::FETCH_ASSOC) ; 
                $ins1->execute(array($cin)) ; 
                $tab = $ins1->fetchAll() ;
                echo "<h2>Liste Etudiants</h2>";
                echo "<table>" ;
                echo "<tr><th>N° Inscription</th><th>Nom</th><th>Note</th><th>Action</th></tr>" ; 
                for($i=0 ; $i<count($tab) ; $i++){
                    echo "<tr>" ; 

                    echo "<td>".$tab[$i]['num_insc']."</td>";
                    echo "<td>".$tab[$i]['nom']."</td>";
                    if($tab[$i]['note']){
                        echo "<td>".$tab[$i]['note']."</td>";
                    }else{
                        $etud_cin = $tab[$i]['cin'];
                        echo "<form method='post' action='ajouterNote.php'>" ; 
                        echo "<td><input type='text' name='note_val'></td>" ;
                        echo "<input type='text' name ='cin_et' value=$etud_cin hidden>";
                        echo "<td><button type='submit'>Enregistrer</button></td>" ; 
                        echo "</form>" ; 

                    }
                echo "</tr>" ; 

                }
                echo "</table>"  ;
            }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="table.css">
    <style>
        #logout{
            text-decoration : none ; 
            color : blue ; 

        }
    </style>
</head>
<body>
    
</body>
</html>