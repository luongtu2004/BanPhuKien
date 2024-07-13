<?php
function loadall_brand()
{
    $sql = "select * from  brands order by brand_id desc";
    $listbrand = pdo_query($sql);
    return $listbrand;
}
