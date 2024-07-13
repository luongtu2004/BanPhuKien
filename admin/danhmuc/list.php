<div class="row">
    <div class="row formtetel">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row frmcontent">
        <div class="row mb10 frmdanhsachloai">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th colspan="2"></th>
                </tr>
                <?php
                foreach ($listdanhmuc as $dm) {
                    extract($dm);
                    $suadm = "index.php?act=suadm&id=" . $danhmuc_id;
                    $xoadm = "index.php?act=xoadm&id=" . $danhmuc_id;
                    echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $danhmuc_id . '</td>
                                <td>' . $name_danhmuc . '</td>
                                <td><a href="' . $suadm . '"> <input type="button" value="SỬA"></a>  
                                <a href="' . $xoadm . '" onclick="return confirm('."'Bạn có muốn xóa không?'".');"> <input type="button" value="XÓA"></a> </td>
                            </tr>';
                }
                ?>
            </table>
        </div>
        <div class="row mb10">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>