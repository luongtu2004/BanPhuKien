
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <link rel="stylesheet" href="../css/style.css">
    <?php
    if (isset($_SESSION['users'])) {
        extract($_SESSION['users']);
    ?>
        <div class="login">
            <div class="title-login">TÀI KHOẢN</div>
            <div class="form-login">
                Xin chào <br>
                <?= $username ?> &nbsp;|&nbsp;<a href="../index.php?act=logout">Đăng xuất</a>
                <?php
                if (isset($role) && $role == 1) {
                    echo '<li> <a href="../admin/index.php">Đăng nhập admin</a> </li>';
                }
                ?>
                <div class="row mb">
                    <li>
                        <a href="index.php?act=edit_tk">Cập nhật thông tin tài khoản</a>
                        <a href="index.php?act=lsmh">Lịch sử mua hàng</a>
                    </li>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
    <div class="cart">
    <div class="cart2">
        <div class="login">
            <div class="title-login">TÀI KHOẢN</div>
            <div class="form-login">
                <form action="index.php?act=dangnhap" method="post">
                    <div class="login-1">
                        Tên đăng nhập <br>
                        <input type="text" name="user_name"><br>
                    </div>
                    <div class="login-2">
                        Mật khẩu <br>
                        <input type="password" name="password"> <br>
                    </div>
                    <div class="login-3">
                        <input type="checkbox" name=""> Ghi nhớ tài khoản? <br>
                    </div>
                    <div class="login-4">
                        <a href="index.php"><input type="submit" name="dangnhap" value="Đăng nhập"><br></a>
                    </div>
                    <h2 class="login-thongbao">
                        <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao ?>
                    </h2>
                </form>
                <li>
                    <a href="../index.php?act=quenmk">Quên mật khẩu</a>
                </li>
                <li>
                    <a href="../index.php?act=users">Đăng kí thành viên</a>
                </li>
            </div>
        </div>
        </div>  
        </div>
    <?php } ?>
</body>

</html>