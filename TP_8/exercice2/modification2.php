<?php
    $nom = "";
    $prenom = "";
    $mail = "";
    $pass = "";
    $ville = "";

    if (isset($_GET['login'])) {
        $login = $_GET['login'];
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=tp8_php", "root", "");
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();  
        }

        $ins = $pdo->prepare("SELECT * FROM t_client WHERE login = ?");
        $ins->execute([$login]);
        $tab = $ins->fetchAll();

        if (count($tab) > 0) {
            $nom = $tab[0]['nom'];
            $prenom = $tab[0]['prenom'];
            $mail = $login;
            $pass = $tab[0]['password'];
            $ville = $tab[0]['ville'];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['login'];
        $pass = $_POST['pass'];
        $ville = $_POST['ville'];

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=tp8_php", "root", "");
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die(); 
        }

        $upd = $pdo->prepare("UPDATE t_client SET nom = ?, prenom = ?, password = ?, ville = ? WHERE login = ?");
        $upd->execute([$nom, $prenom, $pass, $ville, $mail]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier client</title>
    <link rel="stylesheet" href="style.css">  
</head>
<body>
    <h2>Modifier les informations du client</h2>
    <form method="post" action="modification2.php">
        <table>
            <tr>
                <td>Nom :</td>
                <td><input type="text" name="nom" value="<?php echo htmlspecialchars($nom); ?>"></td>
            </tr>
            <tr>
                <td>Prénom :</td>
                <td><input type="text" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>"></td>
            </tr>
            <tr>
                <td>Login (adresse mail) :</td>
                <td><input type="text" name="login" value="<?php echo htmlspecialchars($mail); ?>"></td>
            </tr>
            <tr>
                <td>Mot de passe :</td>
                <td><input type="text" name="pass" value="<?php echo htmlspecialchars($pass); ?>"></td>
            </tr>
            <tr>
                <td>Ville :</td>
                <td>
                    <select name="ville" id="ville">
                        <option value="Rabat" <?php if ($ville == "Rabat") echo "selected"; ?>>Rabat</option>
                        <option value="Casablanca" <?php if ($ville == "Casablanca") echo "selected"; ?>>Casablanca</option>
                        <option value="Kenitra" <?php if ($ville == "Kenitra") echo "selected"; ?>>Kenitra</option>
                        <option value="Meknes" <?php if ($ville == "Meknes") echo "selected"; ?>>Meknes</option>
                        <option value="Fes" <?php if ($ville == "Fes") echo "selected"; ?>>Fes</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><button type="submit">Modifier</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
