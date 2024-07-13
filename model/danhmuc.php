<?php
    function insert_danhmuc($tenloai){
        $sql = "insert into danhmuc(name_danhmuc) values('$tenloai')";
        pdo_execute($sql);
    }

    function xoa_danhmuc($danhmuc_id){
        $sql = "delete from danhmuc where danhmuc_id=".$danhmuc_id;
        pdo_execute($sql);
    }


    function loadall_danhmuc(){
        $sql = "select * from  danhmuc order by danhmuc_id desc";
        $listdanhmuc= pdo_query($sql);
        return $listdanhmuc;
    }

    function loadone_danhmuc($danhmuc_id){
        $sql ="select * from danhmuc where danhmuc_id=".$danhmuc_id;
        $dm= pdo_query_one($sql);
        return $dm;
    }

    function update_danhmuc($tenloai, $danhmuc_id){
        $sql = "update danhmuc set name_danhmuc='".$tenloai."' where danhmuc_id=".$danhmuc_id;
        pdo_execute($sql);
    }

    