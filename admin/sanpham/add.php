<div class="row">
    <div class="title-admin">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">

            <div class="row mb1">
                <label for="">Mã Loại</label>
                <input type="text" name="product_id" disabled placeholder="auto number">
            </div>
            <div class="row mb10">
                <label for="">Tên Sản Phẩm</label><br>
                <input type="text" name="name">
            </div>

            <div class="row mb10">
                <label for="">Hình Ảnh</label><br>
                <input type="file" name="hinh">
            </div>

            <div class="row mb10">
                <label for="">Mô Tả</label><br>
                <textarea name="mota" cols="30" rows="10"></textarea>
            </div>

            <div class="row mb10">
                <label for="">Giá</label><br>
                <input type="number" name="price">
            </div>
            <div class="row mb10">
                    Danh mục <br>
                    <select name="iddm">
                        <option value="">-----Chọn danh mục-----</option>
                        <?php foreach($listdanhmuc as $danhmuc):?>
                            <?php extract($danhmuc)?>
                            <option value="<?=$danhmuc_id?>"><?= $name_danhmuc ?></option>
                       <?php endforeach ?>
                    </select>
                </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="THÊM MỚI">
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