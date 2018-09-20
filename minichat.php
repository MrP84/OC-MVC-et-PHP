<?php
session_start();
?>

<!-- Je lance une session en début de page pour récupérer le pseudo sous la forme d'une variable de sessio envoyée vers minichat_post-->

<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>

    <!-- Je mets tous les styles sur cette feuille pour ne pas avoir à zipper une feuille CSS externe-->
    <style>
    body
    {
        width: 50%;
        margin-left: 25%;
    }
    form
    {
        text-align:center;
        background-color: #A7EE94;
        padding: 10px;        
    }

    #post
    {
        padding-left: 200px;
        background-color: #A7EE94;
        font-weight:bold;
    }
    label
    {
        color: white;
        font-weight: bold;
    }
    
    </style>

    <body>
    <!-- J'introduis du php dans le formulaire pour tester si la variable de session existe et je l'échappe avec htmlspecialchars. Je la place dans value sinon on ne voit pas l'auteur du message si rien n'est saisi pour pseudo -->
    <form action="minichat_post.php" method="POST">
        <p>
        <label for="pseudo">Pseudo :</label>  <input type="text" name="pseudo" id="pseudo" value=
        <?php
        if(isset($_SESSION['pseudo']))
        echo '"' . htmlspecialchars($_SESSION['pseudo']) . '"';
        
        ?>
        ></p>
        <p><label for="message">Message :</label>   <input type="text" name="message" id="message" /></p>

        <input type="submit" value="Envoyer" />
	</p>
    </form>

            <!-- Je reprends ici la correction du tp minichat auquel j'apporte la modification sur la date et l'heure-->
            <?php
            #Connexion à la base de données
            try
            {
            	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }

            #Récupération des 10 derniers messages et formatage de la date pour une lisibilité plus "française"
            $reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_envoi, "%d/%m/%Y à [%Hh:%imin:%ss]") AS date_fr FROM minichat ORDER BY ID DESC LIMIT 0, 10');

            #Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
            while ($donnees = $reponse->fetch())
            {
            	echo '<p id="info"> Le ' . htmlspecialchars($donnees['date_fr']) . '<strong> ' . htmlspecialchars($donnees['pseudo']) . '</strong> a écrit : ' ?>
                <!-- Retour à la ligne et insertion des messages dans une div pour suivre les styles et avvoir un rendu plus graphique-->

                <br/><div id="post">
                    <?php echo htmlspecialchars($donnees['message']) . '</p>'; ?>
                </div>

                <?php 
            }

            $reponse->closeCursor();

?>
    </body>
</html>