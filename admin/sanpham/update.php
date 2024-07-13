<?php
if(is_array($sanpham)){
    extract($sanpham);
 }
 $hinhpath = "../uploads/".$img;
 if(is_file($hinhpath)){
     $upanh = "<img src='".$hinhpath."'height ='50px'>";
 }
?>

<div class="row">
    <div class="row formtetel">
        <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=update" method="post" enctype="multipart/form-data">
            <div class="row mb10">
            <label for="">Danh Mục</label><br>
                <select name="iddm">
                    <option value="0" selected>Tất Cả</option>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        if ($iddm == $danhmuc['danhmuc_id']) $s = "selected";
                        else $s = "";
                        echo '<option value="' . $danhmuc['danhmuc_id'] . '"' . $s . '>' . $danhmuc['name_danhmuc'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="row mb10">
                <label for="">Tên Sản Phẩm</label><br>
                <input type="text" name="name" value="<?= $name ?>">
            </div>

            <div class="row mb10">
                <label for="">Giá</label><br>
                <input type="text" name="price" value="<?= $price ?>">
            </div>

            <div class="row mb10">
                <label for="">Hình Ảnh</label><br>
                <input type="file" name="hinh">
                <?= $hinhpath ?>
            </div>

            <div class="row mb10">
                <label for="">Mô Tả</label><br>
                <textarea name="mota" cols="30" rows="10"><?= $mota ?></textarea>
            </div>

            <div class="row mb10">
                <?php
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    echo '<input type="hidden" name="idsp" value="' . $id . '">';
                }
                ?>
                <input type="hidden" name="id" value="<?= $product_id ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != ""))
                echo $thongbao;
            ?>
        </form>
    </div>
</div>
</div>