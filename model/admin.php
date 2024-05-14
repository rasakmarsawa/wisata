<?php
/**
 *
 */
class admin
{
  function __construct(){}

  // function insert($post){
  //   $sql = "insert into barang (id_Jenis_barang, id_barang, nama_barang)
  //    values (
  //      '".$post['id_jenis_barang']."',
  //      0,
  //      '".$post['nama_barang']."'
  //    )";
  //
  //   $response['result'] = $GLOBALS['mysqli']->query($sql);
  //
  //   return $response;
  // }
  //
  // function selectAll(){
  //  $sql = "
  //   select * from barang
  //     inner join jenis_barang on barang.id_jenis_barang = jenis_barang.id_jenis_barang
  //   order by jenis_barang.nama_jenis_barang asc
  //  ";
  //
  //  $result = $GLOBALS['mysqli']->query($sql);
  //
  //  $arr = array();
  //  $i=0;
  //  while ($data = mysqli_fetch_assoc($result)) {
  //    $arr[$i]=$data;
  //    $i++;
  //  }
  //
  //  $response = array();
  //  if ($i!=0) {
  //    $response['result'] = true;
  //    $response['data'] = $arr;
  //  }else{
  //    $response['result'] = false;
  //  }
  //
  //  return $response;
  // }
  //
  // function delete($get){
  //   $sql = "delete from barang where id_jenis_barang = '".$get['catid']."' and id_barang = '".$get['id']."'";
  //
  //   $response['result'] = $GLOBALS['mysqli']->query($sql);
  //
  //   return $response;
  // }
  //
  function get($post){
    $sql = "select * from admin where username = '".$post['username']."' and password = MD5('".$post['password']."')";

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
  //
  // function update($post){
  //   $sql = "update barang set
  //     nama_barang = '".$post['nama_barang']."'
  //     where
  //     id_jenis_barang = '".$post['id_jenis_barang']."' and
  //     id_barang = '".$post['id_barang']."'";
  //
  //   $response['result'] = $GLOBALS['mysqli']->query($sql);
  //
  //   return $response;
  // }
}

?>
