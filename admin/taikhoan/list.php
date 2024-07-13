<div class="boxtitle-quanly">
    <h2>DANH SÁCH KHÁCH HÀNG</h2>
</div>
<div class="row formtl">
    <div class="row mb1 formdslh">
        <table>
            <tr>
                <th></th>
                <th>MÃ KHÁCH HÀNG</th>
                <th>TÊN ĐĂNG NHẬP</th>
                <th>MẬT KHẨU</th>
                <th>EMAIL</th>
                <th>ĐỊA CHỈ</th>
                </th>
                <th>SỐ ĐIỆN THOẠI</th>
                <th>VAI TRÒ</th>
                <th colspan="2"></th>
            </tr>
            <?php
            foreach ($listtaikhoan as $taikhoan) {
                extract($taikhoan);
                $xoatk = "index.php?act=xoatk&id=" . $id;
                if ($role == 0) {
                    $role = "khách hàng";
                } else {
                    $role = "admin";
                }
                echo
                '<tr>
                        <td><input type="checkbox"></td>
                        <td>' . $id . '</td>
                        <td>' . $username . '</td>
                        <td>' . $password . '</td>
                        <td>' . $email . '</td>
                        <td>' . $address . '</td>
                        <td>' . $phone . '</td>
                        <td>' . $role . '</td>
                        <td>
                            <a href="' . $xoatk . '"><input type="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"></a>
                        </td>
                    </tr>';
            }
            ?>
        </table>
    </div>
    <div class="row mb">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Bỏ chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
    </div>
</div>