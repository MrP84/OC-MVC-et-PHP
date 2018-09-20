<?php

namespace MrP\Blog\Model;

require_once('models/Manager.php');

class CommentManager extends Manager
{
	
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh %imn %ss") AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));

		return $comments;
	}

	public function getComment($comId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh %imn %ss") AS comment_date_fr FROM comments WHERE id = ? ');
		$req->execute(array($comId));
		$comment = $req->fetch();

		return $comment;
	}

	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();

		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $author,$comment));

		return $affectedLines;
	}
	public function changeComment($author, $comment, $comId)
	{
		$db = $this->dbConnect();
			
		$comments = $db->prepare('UPDATE comments SET author = ?, comment = ?, comment_date = NOW() WHERE id = ?');
		$affectedLines = $comments->execute(array($author,$comment, $comId));

		return $affectedLines;
	}


}