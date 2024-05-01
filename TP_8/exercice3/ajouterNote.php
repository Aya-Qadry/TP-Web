<?php
session_start() ; 
if(isset($_POST['cin_et']) && isset($_POST['note_val'])){
    $cin = $_POST['cin_et']; 
    $note = $_POST['note_val']; 
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=tp8_php", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Error in database connection: " . $e->getMessage();
        die();  
    }

    $ins = $pdo->prepare("UPDATE note_etudiant SET note=? WHERE cin=?");
    $ins->execute([$note, $cin]);
    header("location:homepage.php");
}
?>
