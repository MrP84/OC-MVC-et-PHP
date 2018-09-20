<?php $title = 'Mon Blog'; ?>

<?php ob_start(); ?>
    <h1>Mon super blog !</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>

    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>

    <h2>Commentaires</h2>

<div id="addForm">
    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="POST">
        <div>
            <label for="author">Auteur : </label><br/>
            <input type="text" name="author" id="author">
        </div>

        <div>
            <label for="comment">Commentaires : </label><br/>
            <textarea id="comment" name="comment" rows="5" cols="20"></textarea>
        </div>
        <div>
            <input type="submit" value="Envoyer">
        </div>
    </form>
</div>

<div class="coms">
    <?php
    while ($comment = $comments->fetch())
    {
    ?>
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> (<a href="index.php?action=change&amp;id=<?= $post['id'] ?>&amp;comid=<?= $comment['id'] ?>">modifier</a>)</p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    
    <?php
    }
    ?>
</div>
    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>

   