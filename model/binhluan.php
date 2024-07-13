<?php 
function load_binhluan($idsp){
 $sql="SELECT binhluan.iduser as userId,binhluan.id as idbinhluan,binhluan.noidung,binhluan.ngaybinhluan,users.username as username
  FROM `binhluan`
 LEFT JOIN users ON binhluan.iduser = users.id
 WHERE idpro = $idsp";  
   $bl = pdo_query($sql);
   return $bl;
}
function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
  $sql = "insert into binhluan(noidung,iduser,idpro,ngaybinhluan) values ('$noidung','$iduser','$idpro','$ngaybinhluan')";
  pdo_execute($sql);
}
function loadAll_bl(){
  $sql ="select * from binhluan order by id";
  $listbl = pdo_query($sql);
  return $listbl;
}
function delete_bl($id){
  $sql = "delete from binhluan where id =".$id;
  pdo_execute($sql);
}
?>