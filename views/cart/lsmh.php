<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử Mua Hàng</title>
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <div class="cart">
        <div class="cart2">
    <div class="row mb">
        <div class="boxtrai mr">
            <?php
            if (isset($billdh) && (is_array($billdh))) {
                extract($billdh);
            }
            ?>
            <div class="row mb">
                <div class="boxtitle-lsmh">Lich Sử Mua Hàng
                    <div class="row_lsmh">
                        <table>
                            <tr>
                                <th>Mã Đơn Hàng</th>
                                <th>Ngày Đặt Hàng</th>
                                <th>Phương Thức Thanh Toán</th>
                                <th>Thành Tiền</th>
                            </tr>
                            <?php

                            foreach ($billdh as $bill) {
                                extract($bill);
                                if ($bill_pttt == 1) {
                                    $pttt = 'Thanh Toán Trực Tiếp';
                                } else if ($bill_pttt == 2) {
                                    $pttt = 'Thanh Toán Online';
                                } else {
                                    $pttt = 'Thanh Toán VNPAY';
                                }

                                $linkdhct = "index.php?act=lsmhct&id=" . $id;
                                echo '
                                <tr>
                                <td> <a href="' . $linkdhct . '">' . $id . '</a> </td>
                                <td> ' . $ngaydathang . '</td>
                                <td> 
                                    ' . $pttt . ' 
                                </td>
                                <td> ' . $total . '</td>
                                </tr>
                                ';
                            }
                            ?>

                        </table>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>