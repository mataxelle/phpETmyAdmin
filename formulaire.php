<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de jeux vidéo</title>
</head>
<body>

    <h1>Formulaire jeux vidéo</h1>

    <form method="POST" action="jeux_video.php">
        <p>
            <label for="nom">Nom du jeu :
                <input type="text" name="nom" id="nom" required>
            </label>
        </p>
        <p>
            <label for="possesseur">Possesseur :
                <input type="text" name="possesseur" id="possesseur" required>
            </label>
        </p>
        <p>
            <label for="console">Console :
                <input type="text" name="console" id="console" required>
            </label>
        </p>
        <p>
            <label for="prix">Prix :
                <input type="number" name="prix" id="prix" required>
            </label>
        </p>
        <p>
            <label for="nbre_joueurs_max">Nombre de joueur :
                <input type="number" name="nbre_Joueurs_max" id="nbre_joueurs_max" required>
            </label>
        </p>
        <p>
            <label for="commentaires">Commentaire :
                <input type="text" name="commentaires" required>
            </label>
        </p>
        <p>
            <input type="submit" value="Enregistrer">
        </p>
    </form>

    <?php
        
        try {

            //Connexion à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
        } catch (Exception $e) {
    
        die('Erreur :' . $e->getMessage());
    
        }

        $req = $bdd->prepare('INSERT INTO jeux_video (nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
            VALUE(?, ?, ?, ?, ?, ?)');

        /*$req->execute(array(
            $_POST['nom'],
            $_POST['possesseur'],
            $_POST['console'],
            $_POST['prix'],
            $_POST['nbre_joueurs_max'],
            $_POST['commentaires']
        ));

        $req->closeCursor();*/

    ?>
    
</body>
</html>