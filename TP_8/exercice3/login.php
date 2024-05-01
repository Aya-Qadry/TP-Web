<?php
    session_start() ; 
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        if(isset($_POST['cin'])&&isset($_POST['pass'])){
            $cin = $_POST['cin'] ;
            $password = $_POST['pass'] ; 
            if($cin && $password){
                try{
                    $pdo = new PDO("mysql:host=localhost;dbname=tp8_php","root","");
                }
                catch(PDOException $e){
                    echo "Error in database connexion ".$e->getMessage() ; 
                }
        
                $ins = $pdo->prepare("select * from t_utilisateur where cin=? and pwd=?") ;
                $ins->setFetchMode(PDO::FETCH_ASSOC) ; 
                $ins->execute(array($cin,$password)) ; 
        
                $result = $ins->fetchAll() ; 
                if($result){
                    $type_user = $result[0]['type_utilisateur'] ; 
                    $_SESSION['user_type'] = $type_user ; 
                    $_SESSION['cin'] = $cin ; 
                    header("location:homepage.php") ; 
                }
            }else{
                echo "<script>" ; 
                echo "alert('Entrez les valeurs ! ')" ; 
                echo "</script>" ; 
            }   
    
        }
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Connexion à votre compte </h2>
    <table>
        <form action="" method="post">
            <tr>
                <td>Cin</td>
                <td><input type="text" name="cin" id=""></td>
            </tr>
            <tr>
                <td>Mot de passe</td>
                <td><input type="password" name="pass" id=""></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Se connecter</button></td>
            </tr>
        </form>
    </table>
</body>
</body>
</html>