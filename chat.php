<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Chat entre membres !</title>
</head>
<body>

    <form action="chat_post.php" method="POST">
        <p><label for="pseudo">Pseudo :
            <input type="text" name="pseudo" id="pseudo" required>
        </label></p>
        <p><label for="messages">Message :
            <input type="text" name="messages" id="messages" required>
        </label></p>
        <p><input type="submit" value="Envoyer"></p>
    </form>



    <?php

        try {

            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        } catch (Exception $e) {

            die('Erreur :' . $e->getMessage());

        }

        $reponse = $bdd->query('SELECT * FROM minichat ORDER BY ID DESC LIMIT 0, 10 ');

        while($donnees = $reponse->fetch()) {
            echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['messages']) . '</p>';
        }

        $reponse->closeCursor();
    ?>
    
</body>
</html>