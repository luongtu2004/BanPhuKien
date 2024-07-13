<?php
if (is_array($tk)) {
    extract($tk);
}
?>
<div class="boxleft mr">
    <div class="row mb">
        <div class="boxtitle">UPDATE TÀI KHOẢN</div>
        <div class="row formtl">
            <form action="index.php?act=updatekh" method="post">
                <div class="row mb1">
                    Tên đăng nhập: <br>
                    <input type="text" name="user_name" value="<?= $user_name ?>">
                </div>
                <div class="row mb1">
                    Mật Khẩu <br>
                    <input type="password" name="password" value="<?= $password ?>">
                </div>
                <div class="row mb1">
                    Email <br>
                    <input type="email" name="email" value="<?= $email ?>">
                </div>
                <div class="row mb1">
                    Address <br>
                    <input type="text" name="address" value="<?= $address ?>">
                </div>
                <div class="row mb1">
                    Phone <br>
                    <input type="number" name="phone" value="<?= $phone ?>">
                </div>
                <div class="row mb">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="submit" name="capnhat" value="Cập nhật">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=dskh"><input type="button" value="Danh sách"></a>

                </div>
                <h2 class="thongbao">
                    <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao ?>
                </h2>
            </form>
        </div>

    </div>
</div>