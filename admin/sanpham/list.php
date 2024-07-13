<div class="row">
    <div class="row formtetel mb">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>

    <form action="index.php?act=listsp" method="POST">
        <input type="text" name="kyw">
        <select name="iddm">
            <option value="0" selected>Tất Cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="' . $danhmuc_id . '">"' . $name_danhmuc . '"</option>';
            }
            ?>
        </select>
        <input type="submit" name="listokla" value="Thêm sản phẩm vào">
    </form>
    <div class="row frmcontent">

        <div class="row mb10 frmdanhsachloai">

            <table>
                <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>HÌNH ẢNH</th>
                    <th>MÔ TẢ</th>
                    <th>GIÁ</th>
                    <th>IDDM</th>
                    <th>BRANDID</th>
                    <th></th>
                </tr>
                <?php
                foreach ($listsanpham as $sanpham) {
                    extract($sanpham);
                    $suasp = "index.php?act=suasp&id=" . $product_id;
                    $xoasp = "index.php?act=xoasp&id=" . $product_id;
                    $hinhpath = "../upload/" . $img;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $hinh = "Chưa có hình";
                    }
                    echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $product_id . '</td>
                                <td>' . $name . '</td>
                                <td>' . $hinh . '</td>
                                <td>' . $mota . '</td>
                                <td>' . $price . '</td>
                                <td>' . $iddm . '</td>
                                <td>' . $brand_id . '</td>
                                <td>
                                    <a href="' . $suasp . '"> <input type="button" value="SỬA"></a>  
                                    <a href="'.$xoasp.'" onclick="return confirm('."'Bạn có muốn xóa không?'".');"><input type="button" value="XÓA" ></a> 
                                </td>
                            </tr>';
                            
                }
                ?>
            </table>
        </div>
        <div class="row mb10">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=addsp"  ><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>
<script>
function myFunction() {
  confirm("Bạn có muốn xóa không !");
}
</script>