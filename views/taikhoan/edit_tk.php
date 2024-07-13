<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="cart">
        <div class="cart2">
            <div class="login-ttk">
                <div class="login-ttk1">
                    <div class="loginttk2">
                        <div class="title-login">CẬP NHẬT TÀI KHOẢN</div>
                        <div class="loginttk3">
                            <?php
                            if (isset($_SESSION['users']) && (is_array($_SESSION['users']))) {
                                extract($_SESSION['users']);
                            }
                            ?>
                            <form action="index.php?act=edit_tk" method="post">
                                <div class="box-ttk">
                                    <h2>Tên đăng nhập <br></h2>
                                    <input type="text" name="username" value="<?= $username ?>">
                                </div>
                                <div class="box-ttk">
                                    <h2>Mật Khẩu <br></h2>
                                    <input type="password" name="password" value="<?= $password ?>">
                                </div>
                                <div class="box-ttk">
                                    <h2>Email <br></h2>
                                    <input type="email" name="email" value="<?= $email ?>">
                                </div>
                                <div class="box-ttk">
                                    <h2>Address <br></h2>
                                    <input type="text" name="address" value="<?= $address ?>">
                                </div>
                                <div class="box-ttk">
                                    <h2>Phone <br></h2>
                                    <input type="number" name="phone" value="<?= $phone ?>">
                                </div>
                                <div class="ttk-button">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <a href="index.php?act=users"> <input type="submit" name="capnhat" value="Cập nhật"></a>
                                    <input type="reset" value="Nhập lại">
                                </div>
                            </form>
                            <h2 class="thongbao">
                                <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao ?>
                            </h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>