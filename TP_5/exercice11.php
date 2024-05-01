<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 11</title>
</head>
<body>
    <form action="" id="form" method="post">
        <table>
            <ol type="1">
                <tr>
                    <td><li>Nom</li></td>
                    <td>
                        <input type="text" name="nom">
                    </td>
                </tr>
                <tr>
                    <td><li>Prenom</li></td>
                    <td><input type="text" name="prenom"></td>
                </tr>
                <tr>
                    <td><li>Mail</li></td>
                    <td><input type="text" name="mail"></td>
                </tr>
            </ol>
            <tr>
                <td><button type="submit">Envoyer</button></td>
            </tr>
        </table>
    </form>
    <?php
        $fichier = fopen("information.txt" , "a+") ; 

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $nom = $_POST["nom"] ; 
            $prenom = $_POST["prenom"] ; 
            $mail = $_POST["mail"] ; 
            fputs($fichier , "$nom| $prenom| $mail \n") ; 
        }
        fclose($fichier) ; 
        
        
    ?>
  
</body>
</html>
