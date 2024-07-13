<div class="row">
    <div class="title-admin">
        <H1>Quản Lý Đơn Hàng</H1>
    </div>
    <div class="row frmcontent">

        <div class="row mb10 frmdsloai">
            <table>
                <tr>
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>TÊN NGƯỜI MUA</th>
                    <th>ĐỊA CHỈ</th>
                    <th>SỐ ĐIỆN THOẠI</th>
                    <th>EMAIL</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                    <th>TỔNG TIỀN</th>
                    <th>Chức Năng</th>
                </tr>
                <?php
                foreach ($listbill as $qldonhang) {
                    extract($qldonhang);
                    $ctdh = "index.php?act=ctdh&id=" . $id; 
                    

                        echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $bill_name . '</td>
                            <td>' . $bill_address . '</td>
                            <td>' . $bill_tel . '</td>
                            <td>' . $bill_email . '</td>
                            <td>' . $ngaydathang . '</td>
                            <td>' . $total . '</td>
                            <td>
                            <a href="' . $ctdh . '"> <input type="button" value="XEM CHI TIẾT"></a> 
                            <a href=" index.php?act=editdh&id= '.$id .'"> <input type="button" value="DUYỆT ĐƠN HÀNG"></a> 
                        </td>
                        </tr>';
                }

                ?>
            </table>
        </div>
    </div>
</div>