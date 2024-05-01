<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (empty($_POST['nom'])) {
        echo "<script>alert('Entrez le nom !');
            document.location.href = 'formulaire.html' ;
        </script>";
    }
    if (empty($_POST["login"])) {
        echo "<script>alert('Entrez le login !');
            document.location.href = 'formulaire.html' ;
        </script>";
    }
    if (empty($_POST["pass"])) {
        echo "<script>alert('Entrez le mot de passe !');
            document.location.href = 'formulaire.html' ;
        </script>";
    }

    if(isset($_POST['pass']) && isset($_POST['pass2'])){
        $pass1 = $_POST['pass'] ; 
        $pass2 = $_POST['pass2'] ; 
        if($pass1!=$pass2){
            echo "<script> alert('les mots de passe ne sont pas identiques !');
                document.location.href='formulaire.html' ; 
            </script>" ;
        }
    }

    $nom = $_POST['nom'] ; 
    $prenom = $_POST['prenom'] ; 
    $login = $_POST['login'] ; 
    $password = $_POST['pass'] ; 
    $ville = $_POST['ville'] ; 
    
    echo "<div>" ; 
    echo "<span id='welcome'>Bienvenu ".$nom." ".$prenom."! </span><br><br>" ;
    echo "<span>Ville : ".$ville."</span><br><br>" ;              
    echo "<span>Login : ".$login."</span><br><br>" ;              
    echo "</div>" ; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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