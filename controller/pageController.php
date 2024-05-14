<?php
require 'controller/sessionController.php';
require 'controller/imageUpload.php';
require 'model/admin.php';
require 'model/kategori.php';
require 'model/wisata.php';

$session = new session();
$imgup = new imageUpload();
$admin = new admin();
$kategori = new kategori();
$wisata = new wisata();

//get file name
if (empty($_SERVER['QUERY_STRING'])) {
  $filename = basename($_SERVER['REQUEST_URI'],'.php');
}else{
  $filename = basename($_SERVER['REQUEST_URI'], '.php?' . $_SERVER['QUERY_STRING']);
}

//checkSession
$session->checkSession($filename);

switch ($filename) {
  case 'login':
    $session->checkUserLogin();

    if (isset($_POST['submit'])) {
      $response = $admin->get($_POST);
      if($response['result']==1){
        $session->createSession($response['data'][0]);
      }
    }
    break;

  case 'home':

    break;

  case 'kategori':
    $data = array();
    $response = $kategori->getAll();
    if($response['result']==1){
      $data = $response['data'];
    }

    if(isset($_POST['submit'])){
      switch ($_POST['submit']) {
        case 'Buat':
          if ($session->emptyCheck($_POST,array('submit'))) {
            $response = $kategori->insert($_POST);
            if ($response['result']==true) {
              header('Location:kategori.php?success');
            }else{
              header('Location:kategori.php?fail');
            }
          }else{
            header('Location:?emptycheckfail');
          }
          break;

        case 'Hapus':
          $response = $kategori->delete(explode("-",$_POST['dataiddelete'])[0]);
          if ($response['result']==true) {
            header('Location:kategori.php?deletesuccess');
          }else{
            header('Location:kategori.php?deletefail');
          }
          break;

        case 'Ubah':
          $_POST['id_kategori'] = explode("-",$_POST['dataidupdate'])[0];
          if ($session->emptyCheck($_POST,array('submit'))) {
            $response = $kategori->update($_POST);
            if ($response['result']==true) {
              header('Location:kategori.php?updatesuccess');
            }else{
              header('Location:kategori.php?updatefail');
            }
          }else{
            header('Location:?emptycheckfail');
          }
          break;

        default:
          // code...
          break;
      }
    }
    break;

  case 'wisata':
    $data = array();
    $response = $wisata->getAll();
    if($response['result']==1){
      $data = $response['data'];
    }

    if (isset($_POST['submit'])) {
      if ($_POST['submit']=="Hapus") {
        $id_wisata = explode("-",$_POST['dataiddelete'])[0];
        $filename = $id_wisata.'.'.$_POST['typedelete'];

        $response = $wisata->delete($id_wisata);
        $imgup->delete($filename);

        if ($response['result']==true) {
          header('Location:wisata.php?deletesuccess');
        }else{
          header('Location:wisata.php?deletefail');
        }
      }
    }

    if (isset($_GET['starid'])) {
      $result = $wisata->highlight($_GET['starid']);
      if ($result) {
        header('Location:wisata.php?starsuccess');
      }else{
        header('Location:wisata.php?starfail');
      }
    }
    break;

  case 'wisataCreate':
      $data = array();
      $response = $kategori->getAll();
      if($response['result']==1){
        $data = $response['data'];
      }

      if (isset($_POST['submit'])) {
        $result = $imgup->checkImage($_FILES);
        if ($result['status']==1) {
          if ($session->emptyCheck($_POST,array('submit'))) {
            $_POST['map'] = explode(htmlentities('"'),htmlentities($_POST['map']))[1];
            $_POST['imgtype'] = $result['type'];
            $_POST['username'] = $_SESSION['username'];
            // print_r($_POST);
            $result2 = $wisata->insert($_POST);
            if ($result2) {
              $lastid = $wisata->getLastId();
              $imgup->upload($_FILES, "uploads/".$lastid['id_wisata'].".".$result['type']);
              header('Location:wisata.php?createsuccess');
            }else{
              header('Location:?fail');
            }
          }else {
            header('Location:?emptycheckfail');
          }
        }else{
          header('Location:?emptyimagefail');
        }
      }
      break;

    case 'wisataUpdate':
      $data = array();
      $response = $wisata->get($_GET['id'],0);
      if($response['result']==1){
        $data = $response['data'][0];
      }

      $data2 = array();
      $response = $kategori->getAll();
      if($response['result']==1){
        $data2 = $response['data'];
      }

      if (isset($_POST['submit'])) {
        if ($session->emptyCheck($_POST,array('submit'))) {
          print_r($_POST);
          $_POST['id_wisata'] = $_GET['id'];
          $result = $wisata->update($_POST);
          if ($result) {
            header('Location:wisata.php?updatesuccess');
          }else{
            header('Location:?id='.$_GET['id'].'&&fail');
          }
        }else {
          header('Location:?id='.$_GET['id'].'&&emptycheckfail');
        }
      }
      break;

    case 'detail':
      if (isset($_GET['id'])) {
        $data = array();
        $image = NULL;
        $response = $wisata->get($_GET['id'],1);
        if($response['result']==1){
          $data = $response['data'][0];
          $image = 'uploads/'.$data['id_wisata'].'.'.$data['imgtype'];
        }

        $data2 = array();
        $response = $kategori->getAll();
        if($response['result']==1){
          $data2 = $response['data'];
          $len = count($data2);
          if ($len%2 == 1) {
            $len++;
          }

          $listkategori1 = array_slice($data2, 0, $len / 2);
          $listkategori2 = array_slice($data2, $len / 2);
        }
      }else{
        header('Location:index.php');
      }
      break;

    case 'index':
      $data = array();
      $response = $wisata->getHighlight();
      if($response['result']==1){
        $data = $response['data'][0];
      }

      $data2 = array();
      $pagenum = $session->getPage();
      $response = $wisata->getPageItem($pagenum,0);
      if($response['result']==1){
        $data2 = $response['data'];

        $data21 = array_slice($data2, 0, 2);
        $data22 = array_slice($data2, 2);
      }

      $data3 = array();
      $response = $kategori->getAll();
      if($response['result']==1){
        $data3 = $response['data'];
        $len = count($data3);
        if ($len%2 == 1) {
          $len++;
        }

        $listkategori1 = array_slice($data3, 0, $len / 2);
        $listkategori2 = array_slice($data3, $len / 2);
      }

      $count = 0;
      $maxpage = 1;
      $response = $wisata->count(0);
      if ($response['result']==1) {
        $count = $response['data'][0]['count'];
        $maxpage = ceil($count/4);
      }
      break;

      case 'search':
        $data21 = array();
        $data22 = array();

        $data = array();
        $response = $wisata->getHighlight();
        if($response['result']==1){
          $data = $response['data'][0];
        }

        $data2 = array();
        $pagenum = $session->getPage();
        $response = $wisata->getPageItem($pagenum,$_GET['category']);
        if($response['result']==1){
          $data2 = $response['data'];

          $data21 = array_slice($data2, 0, 2);
          $data22 = array_slice($data2, 2);
        }

        $data3 = array();
        $response = $kategori->getAll();
        if($response['result']==1){
          $data3 = $response['data'];
          $len = count($data3);
          if ($len%2 == 1) {
            $len++;
          }

          $listkategori1 = array_slice($data3, 0, $len / 2);
          $listkategori2 = array_slice($data3, $len / 2);
        }

        $count = 0;
        $maxpage = 1;
        $response = $wisata->count($_GET['category']);
        if ($response['result']==1) {
          $count = $response['data'][0]['count'];
          $maxpage = ceil($count/4);
        }
        break;

    default:

      break;

}
?>
