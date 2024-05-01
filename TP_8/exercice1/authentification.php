<?php
    function verif($pseudo , $pass){
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=tp8_php","root","");
        }
        catch(PDOException $e){
            echo $e->getMessage() ; 
        }
        
        $ins = $pdo->prepare("Select * from membres where pseudo =? and motpasse=?");
        $ins->setFetchMode(PDO::FETCH_ASSOC) ;
        $ins->execute(array($pseudo,$pass)) ; 
        $tab = $ins->fetchAll() ; 
        if(count($tab)){
            return true;
        }else{
            return false ;
        }
    }
    if($_SERVER['REQUEST_METHOD']==="POST"){
        if(isset($_POST['pseudo']) && isset($_POST['pass'])){
            $pseudo = $_POST['pseudo'] ; 
            $pass = $_POST['pass'] ; 
            if(verif($pseudo,$pass)){
                session_start();
                $_SESSION['pseudo'] = $pseudo;
                header('Location: autorisation.php');
                exit;

            }else{
                echo "<script>
                    alert('Utilisateur nexiste pas! ') ; 
                    document.location.href='authentification.html' ; 
                    </script>" ; 
                exit ; 
            }
        }
    }
?>