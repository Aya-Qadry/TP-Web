<?php
    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: authentification.html');
        exit;
    }

    echo "<b>Bienvenue ".$_SESSION['pseudo']." sur la page autorisee !</b>";
?>
