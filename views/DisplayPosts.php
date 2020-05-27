<!DOCTYPE html>
<html lang="en">

<head>
  <title>Foxy Network</title>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../assets/images/icons/icon.png">
  <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>

<body>

  <header class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">
      <img src="../assets/images/icons/icon.png" width=" 30" height="30" class="d-inline-block align-top" alt="">
      Foxy Social Network
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
      <ul class="navbar-nav">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label=" Search">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
        <?php
        if (isset($_SESSION['userId'])) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="?action=logout" role="button">Logout</a>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="?action=login" role="button">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?action=register" role="button">Sign Up</a>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="display-4">KEEP CALM & LOVE FOXES</h1>
        <blockquote class="blockquote text-center">
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <footer class="blockquote-footer">Maybe someone famous from <cite>Internet</cite></footer>
        </blockquote>
      </div>
    </div>
    <div class="row">
      <div class="col"><?php
                        if (isset($_SESSION['userId'])) {
                        ?>
          <div class="row newMsg">
            <div class="col">
              <form class="input-group" method="POST" action="?action=newMsg">
                <input name="msg" class="form-control" placeholder="Add a message" type="text">
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        <?php
                        }
        ?>
        <?php
        if (isset($posts)) {
          foreach ($posts as $onePost) {
        ?>
            <div class="row">
              <div class="col">
                <div class="panel panel-white post panel-shadow">
                  <div class="post-heading">
                    <div class="pull-left image">
                      <img src="img/avatars/default.png" class="rounded-circle img-thumbnail avatar" alt="<?= $onePost['user_id']; ?>">
                    </div>
                    <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] == $onePost['user_id']) { ?>

                      <div class="btn-group pull-right">
                        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          🖊
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="?action=updatePost&msg=<?= $onePost['id'] ?> ">Modifier le post</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="?action=deletePost&msg=<?= $onePost['id'] ?> ">Supprimer le post</a>
                        </div>
                      </div>
                    <?php } ?>

                    <div class="pull-left meta">
                      <div class="title h5">
                        <a href="#"><b><?= $onePost['nickname']; ?></b></a>
                      </div>
                      <h6 class="text-muted time"><?= $onePost['created_at']; ?></h6>
                    </div>
                  </div>
                  <div class="post-description">
                    <p><?= $onePost['content']; ?></p>
                  </div>
                  <div class="post-footer">
                    <?php
                    if (isset($_SESSION['userId'])) {
                    ?>
                      <div class="input-group">
                        <form class="input-group" method="POST" action="?action=newComment">
                          <input name="postId" type="hidden" value="<?= $onePost['id'] ?>">
                          <input name="comment" class="form-control" placeholder="Add a comment" type="text">
                          <span class="input-group-text">
                            <a href="#" onclick="$(this).closest('form').submit()"><i class="fa fa-edit"></i></a>
                          </span>
                        </form>
                      </div>
                    <?php
                    }
                    ?>
                    <ul class="comments-list">
                      <?php
                      $postId = $onePost['id'];
                      if (isset($comments[$postId])) {
                        foreach ($comments[$postId] as $comment) {
                      ?>
                          <li class="comment">
                            <a class="pull-left" href="#">
                              <img class="avatar" src="img/avatars/default.png">
                            </a>
                            <div class="comment-body">
                              <div class="comment-heading">
                                <h4 class="user"><?= $comment['nickname']; ?></h4>
                                <h5 class="time"><?= $comment['created_at']; ?></h5>
                              </div>
                              <p><?= $comment['content']; ?></p>
                            </div>
                          </li>
                      <?php
                        }
                      }
                      ?>
                    </ul>
                  </div>
                </div>
            <?php
          }
        }
            ?>
              </div>
            </div>
      </div>
    </div>
  </div>
</body>

</html>