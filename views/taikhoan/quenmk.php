<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên Mật Khẩu</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="cart">
        <div class="cart2">
            <div class="forgot-password">
                <div class="forgot-password-form">
                    <div class="">
                        <h2>QUÊN MẬT KHẨU</h2>
                    </div>
                    <br>
                    <div class="form-header">
                        <form action="index.php?act=quenmk" method="post">
                            <div class="form-group2">
                                Email
                                <input type="email" name="email">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="submit" name="quenmk" value="Quên mật khẩu"></a>
                                <input type="reset" value="Nhập lại">
                            </div>
                            <h2 class="thongbao">
                                <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao ?>
                            </h2>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</body>

</html>