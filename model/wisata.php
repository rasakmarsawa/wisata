<?php
/**
 *
 */
class wisata
{
  function __construct(){}

  function insert($post){
    $sql = "insert into wisata (nama_wisata, deskripsi, alamat, map, id_kategori, username, imgtype)
     values (
       '".$post['nama_wisata']."',
       '".$post['deskripsi']."',
       '".$post['alamat']."',
       '".$post['map']."',
       '".$post['id_kategori']."',
       '".$post['username']."',
       '".$post['imgtype']."'
     )";

    $response['result'] = $GLOBALS['mysqli']->query($sql);

    return $response;
  }

  function getLastId(){
    $sql = "select * from wisata where id_wisata = (select max(id_wisata) from wisata)";
    $result = $GLOBALS['mysqli']->query($sql);

    if (mysqli_num_rows($result)==1) {
      $data = mysqli_fetch_assoc($result);
    }else{
      $data = null;
    }

    return $data;
  }

  function getAll(){
   $sql = "
   select id_wisata, nama_wisata, nama_kategori, nama_admin, created_on, imgtype, highlight
   from wisata
   left join kategori on wisata.id_kategori = kategori.id_kategori
   left join admin on wisata.username = admin.username";

   $result = $GLOBALS['mysqli']->query($sql);

   $arr = array();
   $i=0;
   while ($data = mysqli_fetch_assoc($result)) {
     $arr[$i]=$data;
     $i++;
   }

   $response = array();
   if ($i!=0) {
     $response['result'] = true;
     $response['data'] = $arr;
   }else{
     $response['result'] = false;
   }

   return $response;
  }

  function delete($id){
    $sql = "delete from wisata where id_wisata = '".$id."'";

    $response['result'] = $GLOBALS['mysqli']->query($sql);

    return $response;
  }

  function getPageItem($pagenum,$id_kategori){
   $rowstart = ($pagenum-1)*4;

   $sql = "select id_wisata, nama_wisata, imgtype, created_on from wisata";
   if ($id_kategori!=0) {
     $sql .= " where id_kategori = ".$id_kategori;
   }

   $sql .= " order by created_on desc limit ".$rowstart.",4";

   $result = $GLOBALS['mysqli']->query($sql);

   $arr = array();
   $i=0;
   while ($data = mysqli_fetch_assoc($result)) {
     $arr[$i]=$data;
     $i++;
   }

   $response = array();
   if ($i!=0) {
     $response['result'] = true;
     $response['data'] = $arr;
   }else{
     $response['result'] = false;
   }

   return $response;
  }

  function get($id,$detailed){
    $sql = "select wisata.* ";

    if ($detailed==1) {
      $sql .= ",kategori.nama_kategori,admin.nama_admin ";
    }

    $sql .= "from wisata ";

    if ($detailed==1) {
      $sql .= "
      left join kategori on kategori.id_kategori = wisata.id_kategori
      left join admin on admin.username = wisata.username ";
    }

    $sql .= "where id_wisata = ".$id;

    $result = $GLOBALS['mysqli']->query($sql);

    $arr = array();
    $i=0;
    while ($data = mysqli_fetch_assoc($result)) {
      $arr[$i]=$data;
      $i++;
    }

    $response = array();
    if ($i!=0) {
      $response['result'] = true;
      $response['data'] = $arr;
    }else{
      $response['result'] = false;
    }

    return $response;
  }

  function getHighlight(){
    $sql = "select id_wisata, nama_wisata, imgtype, created_on from wisata where highlight = 1";

    $result = $GLOBALS['mysqli']->query($sql);

    $arr = array();
    $i=0;
    while ($data = mysqli_fetch_assoc($result)) {
      $arr[$i]=$data;
      $i++;
    }

    $response = array();
    if ($i!=0) {
      $response['result'] = true;
      $response['data'] = $arr;
    }else{
      $response['result'] = false;
    }

    return $response;
  }

  function count($id_kategori){
    $sql = "select count(id_wisata) as count from wisata";

    if ($id_kategori!=0) {
      $sql .= " where id_kategori = ".$id_kategori;
    }

    $result = $GLOBALS['mysqli']->query($sql);

    $arr = array();
    $i=0;
    while ($data = mysqli_fetch_assoc($result)) {
      $arr[$i]=$data;
      $i++;
    }

    $response = array();
    if ($i!=0) {
      $response['result'] = true;
      $response['data'] = $arr;
    }else{
      $response['result'] = false;
    }

    return $response;
  }

  function update($post){
    $sql = "update wisata set
      nama_wisata = '".$post['nama_wisata']."',
      deskripsi = '".$post['deskripsi']."',
      alamat = '".$post['alamat']."',
      id_kategori = '".$post['id_kategori']."'
      where
      id_wisata = '".$post['id_wisata']."'";
    $response['result'] = $GLOBALS['mysqli']->query($sql);

    return $response;
  }

  function highlight($id){
    $sql = "update wisata set highlight = 0";
    $GLOBALS['mysqli']->query($sql);

    $sql = "update wisata set highlight = 1 where id_wisata = ".$id;
    $response['result'] = $GLOBALS['mysqli']->query($sql);


    return $response;
  }
}

?>
