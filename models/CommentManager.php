<?php
include_once "PDO.php";

function GetOneCommentFromId($id)
{
  global $PDO;
  $response = $PDO->prepare("SELECT * FROM comment WHERE id = :id");
  return $response->execute(
    array(
      "id" => $id
    )
  );
  return $response->fetchAll();
}

function GetAllComments()
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM comment ORDER BY created_at ASC");
  return $response->fetchAll();
}

function GetAllCommentsFromUserId($userId)
{
  global $PDO;
  $response = $PDO->prepare(
    "SELECT comment.*, user.nickname FROM comment LEFT JOIN user on (comment.user_id = user.id) WHERE comment.user_id = :userId ORDER BY comment.created_at ASC"
  );
  $response->execute(
    array(
      "userId" => $userId
    )
  );
  return $response->fetchAll();
}

function GetAllCommentsFromPostId($postId)
{
  global $PDO;
  $response = $PDO->prepare("SELECT user.nickname, comment.created_at, comment.content FROM user LEFT JOIN comment ON comment.user_id = user.id WHERE comment.post_id = :postId");
  $response->execute(
    array(
      "postId" => $postId
    )
  );
  return $response->fetchAll();
}

function CreateNewComment($userId, $postId, $comment)
{
  global $PDO;
  $insert = $PDO->prepare("INSERT INTO comment(user_id, post_id, content) values (:userId, :postId, :comment)");
  $insert->execute(
    array(
      "userId" => $userId,
      "postId" => $postId,
      "comment" => $comment
    )
  );
}
