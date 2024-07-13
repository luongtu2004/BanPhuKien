<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Người Dùng</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="cart">
        <div class="cart2">
            <div class="login">
                <div class="login-1">
                    <div class="login-2">
                        <div class="title-login">ĐĂNG KÝ THÀNH VIÊN</div>
                        <div class="login-users">
                            <form action="../index.php?act=users" method="post">
                                <div class="users-1">
                                    Tên đăng nhập: <br>
                                    <input type="text" name="user_name">
                                </div>
                                <div class="users-1">
                                    Mật Khẩu <br>
                                    <input type="password" name="password">
                                </div>
                                <div class="users-1">
                                    Email <br>
                                    <input type="email" name="email">
                                </div>
                                <div class="users-1">
                                    Address <br>
                                    <input type="text" name="address">
                                </div>
                                <div class="users-1">
                                    Phone <br>
                                    <input type="number" name="phone">
                                </div>
                                <div class="users-button">
                                    <a href="../index.php?act=users"> <input type="submit" name="dangky" value="Đăng Ký"></a>
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
    </div>
</body>

</html>