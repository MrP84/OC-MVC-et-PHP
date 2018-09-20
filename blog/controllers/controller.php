<?php
require_once('models/PostManager.php');
require_once('models/CommentManager.php');

function listPosts()
{
	$postManager = new \MrP\Blog\Model\PostManager();
	$posts = $postManager->getPosts();
	require ('views/listPostsView.php');
}

function post()
{
	$postManager = new \MrP\Blog\Model\PostManager();
	$commentManager = new \MrP\Blog\Model\CommentManager();
	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	require('views/postView.php');
}


function addComment($postId, $author, $comment)
{
	$commentManager = new \MrP\Blog\Model\CommentManager();

	$affectedLines = $commentManager->postComment($postId, $author, $comment);

	if ($affectedLines === false)
	{
		throw new Exception('Impossible d\'ajouter le commentaire !');
	}
	else
	{
		header('Location: index.php?action=post&id=' . $postId);
	}
}

function writeComment($comId)
{
	$postManager = new \MrP\Blog\Model\PostManager();
	$commentManager = new \MrP\Blog\Model\CommentManager();
	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	$comment = $commentManager->getComment($_GET['comid']);
	require('views/modifView.php');
}

function updateComment($postId, $comId, $author, $comment)
{
	$commentManager = new \MrP\Blog\Model\CommentManager();

	$affectedLines = $commentManager->changeComment($author, $comment, $comId);

	if ($affectedLines === false)
	{
		throw new Exception('Impossible de modifier le commentaire !');
	}
	else
	{
		header('Location: index.php?action=post&id=' . $postId);
	}
}



