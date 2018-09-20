<?php $title = 'Mon Blog'; ?>

<?php ob_start(); ?> <!-- Retient dans une variable tout le contenu qui suit -->
    <h1>Mon super blog !</h1>
    <p>Derniers billets du blog :</p>


		<?php
		while ($data = $posts->fetch())
		{
		?>
			<div class="news">
			    <h3> 
			        <?= htmlspecialchars($data['title']) ?>
			        <em>le <?= $data['creation_date_fr'] ?></em>
			    </h3>
			    
			    <p>
				    <?= nl2br(htmlspecialchars($data['content'])); ?>
				    
				    <br />
				    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
			    </p>
			</div>

		<?php
		} // Fin de la boucle des billets
		$posts->closeCursor();
		?>

		<?php $content = ob_get_clean(); ?> <!-- Récupère tout le contenu géré depuis ob_start() -->

		<?php require('template.php'); ?>
