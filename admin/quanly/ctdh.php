<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chi Tiết Đơn Hàng</title>
        <link rel="stylesheet" href="/css/styleadmin.css">

    </head>

    <body>
        <div class="row-quanly">
            <div class="box-quanly">
                <?php
                if (isset($billdhct) && (is_array($billdhct))) {
                    extract($billdhct);
                }
                ?>
                <div class="row-quanky">
                    <div class="boxtitle-quanly"> <h2>Chi Tiết Đơn Hàng</h2>
                    <div class="boxcart-quanly">
                        <table>
                            <?php
                            bill_chi_tiet_don_hang($billdhct);
                            ?>
                        </table>
                    </div>
                    <br>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>