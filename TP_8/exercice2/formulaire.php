<?php
    if($_SERVER['REQUEST_METHOD']==="POST"){
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=tp8_php","root","");
        }
        catch(PDOException $e){
            echo $e->getMessage() ;
        }

        $nom = $_POST['nom'] ; 
        $prenom = $_POST['prenom'] ; 
        $login = $_POST['login'] ; 
        $pass = $_POST['pass'] ; 
        $ville = $_POST['ville'] ; 

        $ins = $pdo->prepare("insert into t_client(nom,prenom,login,password,ville) values(?,?,?,?,?)");
        $ins->execute(array($nom,$prenom,$login,$pass,$ville)) ; 

        echo "<script>
                    alert('compte cree avec succes ! ') ; 
                    document.location.href='formulaire.html' ; 
                    exit ; 
                    </script>" ; 
    }
?>