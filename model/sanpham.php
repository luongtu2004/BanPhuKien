<?php
    function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm, $brand_id ){
        $sql = "insert into product(name,mota,price,img,iddm,brand_id) values('$tensp','$mota','$giasp','$hinh','$iddm','$brand_id')";
        pdo_execute($sql);
    }
    
    function xoa_sanpham($product_id){
        $sql = "delete from product where product_id=".$product_id;
        pdo_execute($sql);
    }
    function loadall_sanpham_top5(){
        $sql = "select * from  product where 1 order by product_id desc limit 0,5 ";
        
        $listsanpham= pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham_home(){
        
        $sql = "select * from  product order by product_id desc limit 0,16 ";
        $listsanpham= pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham($kyw ="", $iddm= 0){
        $sql = "select * from  product where 1";
        if($kyw!=""){
            $sql.=" and name like '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" and iddm ='".$iddm."'";
        }
        $sql.=" order by product_id desc";
        $listsanpham= pdo_query($sql);
        return $listsanpham;
    }
    function load_ten_dm($iddm){
        if($iddm>0){
            $sql ="select * from danhmuc where danhmuc_id=".$iddm;
            $dm= pdo_query_one($sql);
            extract($dm);
            return $dm;
        }else{
            return "";
        }
    }   
    function loadone_sanpham($id){
        $sql ="select * from product where product_id=".$id;
        $sanpham= pdo_query_one($sql);
        return $sanpham;
    }   
    function loadone_sanpham_cungloai($id,$iddm){
        $sql ="select * from product where iddm=".$iddm." AND id <>".$id;
        $listsanpham= pdo_query($sql);
        return $listsanpham;
    }
    function update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh){
        if($hinh!="")
            $sql = "update product set iddm='".$iddm."', name='".$tensp."',  price='".$giasp."', mota='".$mota."', img='".$hinh."' where id=".$id;
        else
            $sql = "update product set iddm='".$iddm."', name='".$tensp."',  price='".$giasp."', mota='".$mota."' where id=".$id;
        pdo_execute($sql);
    }
    function chi_tiet_product($id){
        $sql = "select *from product where product_id=$id";
        $sanpham= pdo_query_one($sql);
        return $sanpham;
    }
