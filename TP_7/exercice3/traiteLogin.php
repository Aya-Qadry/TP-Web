<?php
    if(isset($_POST['login'])&&isset($_POST['pass'])){
        $login = $_POST['login'] ;
        $password = $_POST['pass'] ; 

        try{
            $pdo = new PDO("mysql:host=localhost;dbname=tp7_php","root","");
        }
        catch(PDOException $e){
            echo "Error in database connexion ".$e->getMessage() ; 
        }

        $ins = $pdo->prepare("select * from personne where login=? and mot_de_passe=?") ;
        $ins->setFetchMode(PDO::FETCH_ASSOC) ; 
        $ins->execute(array($login,$password)) ; 

        $result = $ins->fetchAll() ; 
        if($result){
            session_start() ; 
            $numero = session_id() ; 
            echo "<div>" ; 
            echo "<span id='welcome'>Bienvenu ".$result[0]['nom']." ".$result[0]['prenom']."! </span><br><br>" ;
            echo "<span>Identifiant : ".$result[0]['id_personne']."</span><br><br>" ; 
            echo "<span>Ville : ".$result[0]['ville']."</span><br><br>" ;  
            echo "<span>Login : ".$result[0]['login']."</span><br><br>" ;  
            echo "<span>Numero de votre session : ".$numero."</span><br><br>" ;  
            echo "<button id='logout'onclick='logout()'>Se deconnecter</button>";    
            echo "</div>" ; 
            echo "<script> function logout() {
                document.location.href='login.html' ; 
            }</script>" ; 
        }
        else{
            header('Location: login.html') ; 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement des donnees </title>
    <style>
        div{
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;

        }
        span{
            /* padding : 10px ;  */
            margin-bottom : 15px;
        }
        #welcome{
            font-weight :bold ; 
        }
        button{
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    
</body>
</html>