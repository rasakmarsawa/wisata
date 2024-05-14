<?php
/**
 *
 */
class kategori
{
  function __construct(){}

  function insert($post){
    $sql = "insert into kategori (nama_kategori)
     values (
       '".$post['nama_kategori']."'
     )";

    $response['result'] = $GLOBALS['mysqli']->query($sql);

    return $response;
  }

  function getAll(){
   $sql = "select * from Kategori";

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
    $sql = "delete from kategori where id_kategori = '".$id."'";

    $response['result'] = $GLOBALS['mysqli']->query($sql);

    return $response;
  }
  //
  // function get($array){
  //   $sql = "select * from admin where username = '".$array['username']."' and password = MD5('".$array['password']."')";
  //
  //   $result = $GLOBALS['mysqli']->query($sql);
  //
  //   $arr = array();
  //   $i=0;
  //   while ($data = mysqli_fetch_assoc($result)) {
  //     $arr[$i]=$data;
  //     $i++;
  //   }
  //
  //   $response = array();
  //   if ($i!=0) {
  //     $response['result'] = true;
  //     $response['data'] = $arr;
  //   }else{
  //     $response['result'] = false;
  //   }
  //
  //   return $response;
  // }
  //
  function update($post){
    $sql = "update kategori set
      nama_kategori = '".$post['nama_kategori']."'
      where
      id_kategori = '".$post['id_kategori']."'";

    $response['result'] = $GLOBALS['mysqli']->query($sql);

    return $response;
  }
}

?>
