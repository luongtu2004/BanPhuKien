<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bill-cart</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="cart">
        <div class="cart2">
            <div class="cart3">

                <div class="title-cart">Thông tin giỏ hàng</div>
                <div class="row boxcontent cart">
                    <table>
                        <?php viewcart(0); ?>
                    </table>
                </div>
            </div>
            <form action="index.php?act=billcomfirm" method="post">
                <div class="cart-bill">
                    <div class="cart3">
                        <div class="title-cart">Thông tin đặt hàng</div>
                        <div class="cart-form">

                            <table>

                                <?php
                                if (isset($_SESSION['users'])) {
                                    $name = $_SESSION['users']['username'];
                                    $address = $_SESSION['users']['address'];
                                    $email = $_SESSION['users']['email'];
                                    $tel = $_SESSION['users']['phone'];
                                } else {
                                    $name = "";
                                    $address = "";
                                    $email = "";
                                    $tel = "";
                                }
                                ?>

                                <tr>
                                    <td>Người đặt hàng</td>
                                    <td><input type="text" name="name" value="<?= $name ?>"></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td><input type="text" name="address" value="<?= $address ?>"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" name="email" value="<?= $email ?>"></td>
                                </tr>
                                <tr>
                                    <td>Điện thoại</td>
                                    <td><input type="text" name="tel" value="<?= $tel ?>"></td>
                                </tr>


                            </table>
                        </div>
                    </div>
                    <div class="cart3">
                        <div class="cart-form">
                            <table>

                                <tr>
                                    <td><input type="radio" name="pttt" checked value="1">Trả tiền khi nhận hàng</td>
                                    <td><input type="radio" name="vnpay" value="2">Chuyển khoản ngân hàng</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="box-cart">
                    <input type="submit" value="Đồng ý đặt hàng" name="dongydathang">
                </div>

            </form>
        </div>

    </div>
</body>

</html>