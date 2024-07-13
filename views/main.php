<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="main-chinh">
        <div class="main-phu">
            <div class="gioKhuyenMai1">
                <h3> Sản Phẩm</h3>
                <div class="sale-pro" id="thoiGianSale"></div>

                <script>
                    function hienThiThoiGianSale() {
                        var thoiGianBatDau = new Date("2023-12-05T10:00:00");
                        var thoiGianKetThuc = new Date(thoiGianBatDau.getTime() + 30 * 60 * 1000); // Sale for 30 minutes

                        function updateThoiGianConLai() {
                            var gioHienTai = new Date();
                            var thoiGianConLai = thoiGianKetThuc - gioHienTai;

                            if (thoiGianConLai > 0) {
                                var phut = Math.floor((thoiGianConLai / (1000 * 60)) % 60);
                                var giay = Math.floor((thoiGianConLai / 1000) % 60);

                                phut = phut < 10 ? "0" + phut : phut;
                                giay = giay < 10 ? "0" + giay : giay;

                                document.getElementById("thoiGianSale").innerText = "Thời gian còn lại: " + phut + ":" + giay + " cho đến khi kết thúc sale.";
                            } else {
                                document.getElementById("thoiGianSale").innerText = "Sale đã kết thúc.";

                                // Calculate the start time for the next sale (30 minutes later)
                                thoiGianBatDau = new Date(gioHienTai.getTime() + 30 * 60 * 1000); // 30 minutes later
                                thoiGianKetThuc = new Date(thoiGianBatDau.getTime() + 30 * 60 * 1000); // 30 minutes duration

                                // Reset the timeout for the next iteration
                                setTimeout(hienThiThoiGianSale, 1000);
                            }
                        }

                        updateThoiGianConLai();

                        // Update the time every second
                        setInterval(updateThoiGianConLai, 1000);
                    }

                    hienThiThoiGianSale();
                </script>


            </div>
            <div class="main-right">
                <div class="main-danhmuc">
                    <div class="main-content">
                        <div class="main-title">
                            <h3>Danh Mục</h3>
                        </div>
                        <ul>
                            <?php
                            foreach ($dsdm as $dm) {
                                extract($dm);
                                $linkdm = "index.php?act=sanpham&iddm=" . $danhmuc_id;
                                echo '
                                <li>
                                <a href="' . $linkdm . '">' . $name_danhmuc . '</a>
                            </li>
                                ';
                            }
                            ?>
                        </ul>
                        <div class="main-searchdm">
                            <input type="text" placeholder="Nhập Từ Khóa Tìm KIếm">
                        </div>
                    </div>
                </div>
                <div class="main-danhmuc">
                    <div class="main-content">
                        <div class="main-favorite">
                            <div class="main-title">
                                <h3>Top Yêu Thích</h3>
                            </div>
                            <?php
                            foreach ($dstop5 as $sp) {
                                extract($sp);
                                $linksp = "index.php?act=chitietsanpham&product_id=" . $product_id;
                                $img = $hinhpath . $img;
                                echo '<div class="main-favorite1">
                                <a href="' . $linksp . '"><img src="' . $img . '" alt=""></a>
                                <a href="' . $linksp . '">' . $name . '</a>
                            </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gioKhuyenMai">
                <h3> Giờ vàng deal sốc</h3>
            </div>
            <div class="main-product">
                <div class="main-row">
                    <?php
                    $i = 0;
                    foreach ($spnew as $sp) {
                        extract($sp);
                        $linksp = "index.php?act=chitietsanpham&product_id=" . $product_id;
                        $hinh = $hinhpath . $img;
                        if (($i == 2) || ($i == 5) || ($i == 8)) {
                            $mr = "";
                        } else {
                            $mr = "mr";
                        }
                        echo '<div class="boxsanpham ' . $mr . '">
                           <div class="boxsanpham1 ' . $mr . '">
                            <div class="row img"><a href="' . $linksp . '"><img src="' . $hinh . '" alt=""></a></div>
                            <p>' . $price . '</p>
                             <a href="' . $linksp . '">' . $name . '</a>
                            </div>
                            <div class="btnaddtocart">
                            <form action= "index.php?act=addtocart" method= "post">
                                <input type="hidden" name="product_id" value="' . $product_id . '">
                                <input type="hidden" name="name" value="' . $name . '">
                                <input type="hidden" name="img" value="' . $img . '">
                                <input type="hidden" name="price" value="' . $price . '">
                                <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                            </form>
                            </div>
                        </div>';
                        $i += 1;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="main-line"></div>
    </div>
    </div>
</body>

</html>