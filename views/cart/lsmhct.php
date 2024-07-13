    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chi Tiết Lịch Sử Đơn Hàng</title>
        <link rel="stylesheet" href="/css/style.css">

    </head>

    <body>
        <div class="row mb">
            <div class="boxtrai mr">
                <?php
                if (isset($billdhct) && (is_array($billdhct))) {
                    extract($billdhct);
                }
                ?>
                <div class="row mb">
                    <div class="boxtitle-lsmh">Chi Tiết Lịch Sử Đơn Hàng
                    <div class="row boxcontent cart">
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