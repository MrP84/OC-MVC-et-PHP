<?php $title = 'Erreur !'; ?>

<?php ob_start(); ?>
	<h1>Mon super blog !</h1>
    

    <div class="error">
    	<?= $errorMessage; ?>
    </div>

    <p><a href="index.php">Retour à la liste des billets</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

