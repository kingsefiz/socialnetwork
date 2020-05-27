<?php

$action = $_GET["action"] ?? "display";

switch ($action) {

  case 'register':
    include "../models/UserManager.php";
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
      $errorMsg = NULL;
      if (!IsNicknameFree($_POST['username'])) {
        $errorMsg = "Nickname already used.";
      } else if ($_POST['password'] != $_POST['passwordRetype']) {
        $errorMsg = "Passwords are not the same.";
      } else if (strlen(trim($_POST['password'])) < 8) {
        $errorMsg = "Your password should have at least 8 characters.";
      } else if (strlen(trim($_POST['username'])) < 4) {
        $errorMsg = "Your nickame should have at least 4 characters.";
      }
      if ($errorMsg) {
        include "../views/RegisterForm.php";
      } else {
        $userId = CreateNewUser($_POST['username'], $_POST['password']);
        $_SESSION['userId'] = $userId;
        header('Location: ?action=display');
      }
    } else {
      include "../views/RegisterForm.php";
    }
    break;
    break;

  case 'logout':
    session_destroy();
    header("location: ?action=display");
    break;

  case 'login':
    include "../models/UserManager.php";
    $tryToAuth = isset($_POST['username']) && isset($_POST['password']); // User is trying to authenticate
    if ($tryToAuth) { // If the user sent a username and a password you have to check if the user exists in DB
      $userId = Login($_POST['username'], $_POST['password']); // A call the Login method with user's credentials
      if ($userId > 0) { // If user exists in DB
        $_SESSION['userId'] = $userId;
        $_SESSION['nickname'] = $_POST['username'];
        header("location: ?action=display"); // Redirect to DisplayPosts.php
      } else {
        echo "Mauvais mot de passe ou pseudo";
        include "../views/LoginForm.php"; // Redirect to LoginForm.php
      }
    } else {
      include "../views/LoginForm.php";
    }
    break;

  case 'newMsg':
    include "../models/PostManager.php";
    if (isset($_SESSION['userId']) && isset($_POST['msg'])) {
      CreateNewPost($_SESSION['userId'], $_POST['msg']);
    }
    header('Location: ?action=display');
    break;
    break;

  case 'newComment':
    // code...
    break;

  case 'display':
  default:
    include "../models/PostManager.php";

    $posts = GetAllPosts();

    if (isset($_GET["search"])) {
      $search = $_GET["search"];
      $posts = SearchInPosts($search);
    }

    include "../models/CommentManager.php";
    $comments = array();

    foreach ($posts as $onePost) {
      $idPost = $onePost['id'];
      $comments[$idPost] = GetAllCommentsFromPostId($idPost);
    }

    include "../views/DisplayPosts.php";
    break;
}
