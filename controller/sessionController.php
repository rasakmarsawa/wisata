<?php
require 'connection.php';

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location:index.php');
}

/**
 *
 */
class session
{

  function __construct(){

  }

  function checkSession($filename){
    $list = array("login","index","detail","search");
    if (!isset($_SESSION['username'])&&!in_array($filename,$list)) {
        header('Location:login.php');
    }
  }

  function createSession($data){
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama_admin'] = $data['nama_admin'];
    header('Location:home.php');
  }

  function checkUserLogin(){
    if (isset($_SESSION['username'])){
      header('Location:home.php');
    }
  }

  function emptyCheck($arr,$exception){
    $check = true;
    foreach ($arr as $key => $value) {
      if ($value=='' && !in_array($key,$exception)) {
        $check = false;
      }
    }
    return $check;
  }

  function getPage(){
    $page = 1;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    return $page;
  }
}

?>
