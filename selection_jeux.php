<?php

    try {

        //Connexion à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //Ce paramètre permet d'activer les erreurs des req SQL


    } catch (Execption $e) {

    //En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur :' . $e->getMessage());

    }

    //Si tout OK, on continue

    //Au lieu d'exécuter la req avec query(), on prépare la req sans sa partie variable, représenté avec un ?
    $requete = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ? AND prix <= ? ORDER BY prix');

    if (isset($_GET['possesseur']) && isset($_GET['prix_max'])) {
        //On exécute la re en appelant execute()
        $requete->execute(array($_GET['possesseur'], $_GET['prix_max']));
    }

    echo '<ul>';
    while ($donnees = $requete->fetch()) {
        echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
    }
    echo '</ul>';

    $requete->closeCursor();

?>