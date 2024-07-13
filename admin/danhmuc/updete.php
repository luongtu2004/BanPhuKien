<?php
if (is_array($dm)) {
    extract($dm);
}
?>

<div class="row">
    <div class="row formtetel">
        <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=updetedm" method="post">
            <div class="row mb10">
                <label for="">Mã Loại</label><br>
                <input type="text" name="maloai" disabled>
            </div>
            <div class="row mb10">
                <label for="">Tên Loại</label><br>
                <input type="text" name="tenloai" value="<?php if (isset($name_danhmuc) && ($name_danhmuc != "")) echo $name_danhmuc ?>" ;>
            </div>
            <div class="row mb10">
                <input type="hidden" name="danhmuc_id" value="<?php if (isset($danhmuc_id) && ($danhmuc_id > 0)) echo $danhmuc_id ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != ""))
                echo $thongbao;
            ?>
        </form>
    </div>
</div>
</div>
