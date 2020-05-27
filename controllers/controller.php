<?php

$action = $_GET["action"] ?? "display";

switch ($action) {

  case 'register':
    include "../views/RegisterForm.php";
    break;

  case 'logout':
    session_destroy();
    header("location: ?action=display");
    break;

  case 'login':
    if ($tryToAuth) { // If the user sent a username and a password you have to check if the user exists in DB
      $userId = Login($_POST['username'], $_POST['password']); // A call to the Login method with user's credentials
      if ($userId > 0) { // If user exists in DB
        $_SESSION['userId'] = $userId;
        $_SESSION['nickname'] = $_POST['username'];
        header("location: ?action=display"); // Redirect to DisplayPosts.php
      } else {
        echo "Mauvais pseudo ou mot de passe";
        include "../views/LoginForm.php"; // Redirect to LoginForm.php
      }
    } else {
      include "../views/LoginForm.php";
    }
    break;

  case 'newMsg':

    break;

  case 'newComment':
    // code...
    break;

  case 'display':
  default:
    include "../models/PostManager.php";

    $posts = GetAllPosts();

    include "../models/CommentManager.php";
    $comments = array();

    if (isset($_GET["search"])) {
      $search = $_GET["search"];
      $posts = GetAllPostsWithComments($search);
    }

    foreach ($posts as $onePost) {
      $idPost = $onePost['id'];
      $comments[$idPost] = GetAllCommentsFromPostId($idPost);
    }

    include "../views/DisplayPosts.php";
    break;
}
