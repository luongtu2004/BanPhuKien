<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPCT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<style>
    .container-spct {
        width: 90%;
        margin: 20px auto;
        padding: 10px;
        border: 1px solid black;
        background-color: white;
        border-radius: 10px;
    }

    .tendg_sp {
        display: flex-;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .icon{
        margin: 10px 0;
    }
    th,
    td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .formpro {
        margin-top: 10px;
    }

    input[type="number"],
    input[type="text"],
    input[type="submit"] {
        padding: 8px;
        margin-right: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .boxtitle {
        font-size: 20px;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .container-binhluan table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .container-binhluan th,
    .container-binhluan td {
        border: 1px solid black;
        padding: 12px;
        text-align: left;
    }

    .container-binhluan th {
        background-color: #333333;
    }

    .box-search-spct {
        margin-top: 20px;
    }

    .botton-binhluan input[type="text"] {
        width: 70%;
    }

    .botton-binhluan input[type="submit"] {
        width: 20%;
        background-color: #4caf50;
        color: white;
        cursor: pointer;
    }

    .botton-binhluan input[type="submit"]:hover {
        background-color: #45a049;
    }

    .thongbao {
        font-size: 16px;
        color: #FF0000;
        margin-top: 20px;
    }
</style>

<body>
    <div class="container-spct">

        <?php


        $_SESSION['trang_chi_tiet_gio_hang'] = "co";
        $link_anh = $hinhpath . $sanpham['img'];

        echo "<table>";
        echo "<tr>";
        echo "<td width='300px' align='left' >";
        echo "<img src='$link_anh' width='220px' >";
        echo "</td>";
        echo "<td valign='top' >";
        echo "<div>";
        echo "<a href='#'>";
        echo $sanpham['name'];
        echo "</a>";
        echo "</div>";
        echo "<br>";
        echo "<br>";
        $price = $sanpham['price'];
        $price = number_format($price, 0, ",", ".");
        echo $price;
        echo " đ";
        echo "<br>";
        echo "<br>";
        ?>
        <form class="formpro" action="index.php?act=addtocart" method="post">
            <input type="hidden" name="product_id" value="<?php echo $sanpham['product_id'] ?>">
            <input type="hidden" name="name" value="<?php echo $sanpham['name'] ?>">
            <input type="hidden" name="img" value="<?php echo $sanpham['img'] ?>">
            <input type='number' name='so_luong' value='1' style='width:50px' min="0">
            <input type="hidden" name="price" value="<?php echo $sanpham['price'] ?>">
            <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
            <div class="tendg_sp">
                <div class="icon">
                    <i class="fa-solid fa-star" style="color: yellow;"></i>
                    <i class="fa-solid fa-star"style="color: yellow;"></i>
                    <i class="fa-solid fa-star"style="color: yellow;"></i>
                    <i class="fa-solid fa-star"style="color: yellow;"></i>
                    <i class="fa-solid fa-star"style="color: yellow;"></i>
                    <a href="#" style="color: #FF9800;">1 Đánh giá</a>
                    <span>|</span>
                    <a href="#" style="color: #03A9F4;">87 Đã bán</a>
                </div>
            </div>
        </form>
        <?php
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2' >";
        echo "<br>";
        echo "<br>";
        echo "<div >";

        echo "<h1>Giới thiệu sản phẩm</h1>";
        echo "</div>";
        echo $sanpham['mota'];
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "</table>";
        ?>
        <?php
        if (isset($_SESSION['users']['id'])) {
        ?>
            <div class="boxtitle">BÌNH LUẬN</div>
            <div class="row-spct">
                <div class="container-tong">
                    <div class="container-binhluan">
                        <table>
                            <tr>
                                <th>Người DÙng</th>
                                <th>Nội Dung</th>
                                <th>Date</th>
                                <th>Hành động</th>
                            </tr>
                            <?php foreach ($binhluan as $value) : ?>
                                <?php extract($value) ?>
                                <tr>
                                    <td>
                                        <?= $username ?>
                                    </td>
                                    <td>
                                        <?= $noidung ?>
                                    </td>
                                    <td>
                                        <?= $ngaybinhluan ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($_SESSION['users']['id'] == $userId) { ?>
                                            <form action="" method="post">
                                                <input type="hidden" name="idbinhluan" value="<?= $idbinhluan ?>">
                                                <input type="submit" name="delete" value="Xóa Bình Luận">
                                            </form>
                                        <?php }
                                        ?>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="box-search-spct">
                        <form action="" method="post">
                            <input type="hidden" name="idpro" value="<?= $id ?>">
                            <div class="botton-binhluan">
                                <input type="text" name="noidung" placeholder="Viết bình luận">
                                <input type="submit" name="submit" value="Gửi bình luận">
                                <!-- <input type="submit" name="delete" value="Xóa Bình Luận"> -->
                            </div>
                        </form>
                    </div>
                </div>
            <?php } else { ?>
                <div class="boxtitle">BÌNH LUẬN</div>
                <div class="row-spct">
                    <?php
                    $thongbao = "Đăng nhập để bình luận";
                    ?>
                    <div class="thongbao">
                        <?= $thongbao ?>
                    </div>
                </div>
            <?php } ?>
            </div>
    </div>
</body>

</html>