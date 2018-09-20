<?php $title = 'Modification'; ?>

<?php ob_start(); ?>
    <h1>Mon super blog !</h1>
    <p><a href="index.php?action=listpost">Retour à la liste des billets</a></p>
    <p><a href="index.php?action=post&amp;id=<?= $post['id']?>">Retour à la liste des commentaires</a></p>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>

    <h2>Modifier un commentaire</h2>
    <p>Vous allez modifier le commentaire :<br/>
    <em>"<?= $comment['comment']?>"</em> de <em><?=$comment['author']?></em> posté le <em><?= $comment['comment_date_fr'] ?></em>
    </p>

    

    <form action="index.php?action=update&amp;id=<?= $post['id'] ?>&amp;comid=<?= $comment['id'] ?>" method="POST">
        <div>
            <label for="author">Auteur : </label><br/>
            <input type="text" name="author" id="author">
        </div>

        <div>
            <label for="comment">Commentaires : </label><br/>
            <textarea id="comment" name="comment" rows="5" cols="20"></textarea>
        </div>
        <div>
            <input type="submit" value="Modifier">
        </div>
    </form>

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>

   
