<?php
function loadll_thongke(){
    $sql = "select danhmuc.danhmuc_id as danhmuc_id, danhmuc.name_danhmuc as name_danhmuc, count(product.product_id) as countsp, min(product.price) as minprice, max(product.price) as maxprice, avg(product.price) as avgprice ";
    $sql .= "from product left join danhmuc on danhmuc.danhmuc_id = product.iddm ";
    $sql .= "group by danhmuc.danhmuc_id order by danhmuc.danhmuc_id desc";
    $listthongke = pdo_query($sql);
    return $listthongke;
}
