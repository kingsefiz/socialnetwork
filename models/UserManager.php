<?php
include_once "PDO.php";

function GetOneUserFromId($id)
{
  global $PDO;
  $response = $PDO->prepare("SELECT * FROM user WHERE id = :id");
  $response->execute(
    array(
      "id" => $id
    )
  );
}

function GetAllUsers()
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user ORDER BY nickname ASC");
  return $response->fetchAll();
}

function Login($username, $password)
{
  global $PDO;
  $res = $PDO->prepare("SELECT * FROM user WHERE nickname = :username AND password = :password");
  $users = $res->execute(
    array(
      "username" => $username,
      "password" => $password
    )
  );
  return $users;
  if (count($users) == 1) {
    $id = $users[0]['id'];
    return $id;
  } else {
    return -1;
  }
}

function IsNicknameFree($nickname)
{
  global $PDO;
  $response = $PDO->prepare("SELECT * FROM user WHERE nickname = :nickname ");
  $response->execute(
    array(
      "nickname" => $nickname
    )
  );
  return $response->rowCount() == 0;
}

function CreateNewUser($nickname, $password)
{
  global $PDO;
  $response = $PDO->prepare("INSERT INTO user (nickname, password) values (:nickname , :password )");
  $response->execute(
    array(
      "nickname" => $nickname,
      "password" => $password
    )
  );
  return $PDO->lastInsertId();
}
