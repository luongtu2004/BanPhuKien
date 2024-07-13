<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <div class="row-billconfirm">

        <div class="row-billconfirm2">
            <div class="box-billconfirm">
                <div class="box-billconfirm2">
                    <div class="boxtitle-bill">CẢM ƠN</div>
                    <div class="boxtitle-bill2">
                        <marquee behavior="" direction="" style="width: 30%;">Cảm Ơn Quý Khách Đã Đặt Hàng!</marquee>
                    </div>
                </div>
                <?php
                if (isset($bill) && (is_array($bill))) {
                    extract($bill);
                }
                ?>
                <div class="row-billconfirm2">
                    <div class="boxtitle-bill2">THÔNG TIN ĐƠN HÀNG</div>
                    <div class="boxcontent-billconfirm">
                    <?php if ($bill_pttt == 1) {
                                    $pttt = 'Thanh Toán Trực Tiếp';
                                } else if ($bill_pttt == 2) {
                                    $pttt = 'Chuyển Khoản';
                                } else {
                                    $pttt = 'Thanh Toán Online';
                                } ?>
                        <ul>
                            <li>Mã đơn hàng: DAM-<?= $bill['id']; ?></h2>
                            <li>Ngày đặt hàng: <?= $bill['ngaydathang']; ?></li>
                            <li>Tổng đơn hàng: <?= $bill['total']; ?></li>
                            <li>Phương thức thanh toán: <?= $pttt ?></li>
                        </ul>
                    </div>
                </div>
                <div class="row-billconfirm2">
                    <div class="boxtitle-bill2">THÔNG TIN ĐẶT HÀNG</div>
                    <div class="boxcontent-billconfirm2">

                        <table>
                            <tr>
                                <td>Người đặt hàng</td>
                                <td><?= $bill['bill_name']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= $bill['bill_email']; ?></td>
                            </tr>
                            <tr>
                                <td>Điện thoại</td>
                                <td><?= $bill['bill_tel']; ?></td>
                            </tr>
                        </table>

                    </div>
                </div>
                <div class="row-billconfirm2">

                    <div class="boxtitle-bill2">CHI TIẾT GIỎ HÀNG</div>
                    <div class="car-billconfirm">
                        <table>
                            <?php
                            bill_chi_tiet($billct);
                            ?>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>