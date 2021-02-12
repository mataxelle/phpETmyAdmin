<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'ajout de jeux vidéo</title>
</head>
<body>

    <h1>Formulaire d'ajout de jeux vidéo</h1>

    <form method="POST" action="jeux_video_post.php">
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
                <input type="number" name="nbre_joueurs_max" id="nbre_joueurs_max" required>
            </label>
        </p>
        <p>
            <label for="commentaires">Commentaire :
                <input type="text" name="commentaires" id="commentaires" required>
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

        //Reponse contient les données de la bdd
        $reponse = $bdd->query('SELECT * FROM jeux_video ORDER BY ID DESC');

        while ($donnees = $reponse->fetch()) {

    ?>

        <p><strong>Jeu</strong> : 
        <?php echo htmlspecialchars($donnees['nom']); ?><br />
        Le possesseur de ce jeu est : 
        <?php echo htmlspecialchars($donnees['possesseur']); ?>, et il le vend à <?php echo htmlspecialchars($donnees['prix']); ?> euros !<br />
        Ce jeu fonctionne sur <?php echo htmlspecialchars($donnees['console']); ?> et on peut y jouer à <?php echo htmlspecialchars($donnees['nbre_joueurs_max']); ?> au maximum<br />
        <?php echo htmlspecialchars($donnees['possesseur']); ?> a laissé ces commentaires sur <?php echo htmlspecialchars($donnees['nom']); ?> : <em><?php echo htmlspecialchars($donnees['commentaires']); ?></em>
        </p>
    <?php
        }

        $reponse->closeCursor(); // Termine le traitement de la requête

    ?>    
    
</body>
</html>