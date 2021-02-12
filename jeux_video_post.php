
<?php

    try {

        //Connexion à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    } catch (Exception $e) {

        die('Erreur :' . $e->getMessage());

    }

    $req = $bdd->prepare('INSERT INTO jeux_video (nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES (?, ?, ?, ?, ?, ?)');

    $req->execute(array(
        $_POST['nom'],
        $_POST['possesseur'],
        $_POST['console'],
        $_POST['prix'],
        $_POST['nbre_joueurs_max'],
        $_POST['commentaires']
    ));

    header('Location: formulaire.php');
?>