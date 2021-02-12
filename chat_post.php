<?php
    try {

        //Connexion à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    } catch (Exception $e) {

        die('Erreur :' . $e->getMessage());

    }

    $req = $bdd->prepare('INSERT INTO minichat (pseudo, messages) VALUES (?, ?)');

    $req->execute(array($_POST['pseudo'], $_POST['messages']));

    header('Location: chat.php');
?>