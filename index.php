<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phụ Kiện LapTop</title>
</head>

<body>
    <?php
    session_start();
    ob_start();
    include "model/pdo.php";
    include "model/danhmuc.php";
    include "model/sanpham.php";
    include "model/cart.php";
    include "model/users.php";
    include "views/header.php";
    include "model/binhluan.php";
    include "global.php";

    if (!isset($_SESSION['mycart']))
        $_SESSION['mycart'] = [];

    $spnew = loadall_sanpham_home();
    $dsdm = loadall_danhmuc();
    $dstop5 = loadall_sanpham_top5();


    if (isset($_GET['act']) && $_GET['act'] != '') {
        $act = $_GET['act'];
        switch ($act) {
            case 'sanpham':
                if (!empty($_POST['kyw'])) {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = "";
                }
                if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                    $iddm = $_GET['iddm'];
                } else {
                    $iddm = 0;
                }

                $dssp = loadall_sanpham($kyw, $iddm);
                $tendm = load_ten_dm($iddm);
                include './views/sanpham.php';
                break;

            case 'chitietsanpham':
                if (isset($_GET['product_id'])) {
                    $id = $_GET['product_id'];
                    $sanpham = chi_tiet_product($_GET['product_id']);
                    if (isset($_POST['submit'])) {
                        $noidung = $_POST['noidung'];
                        $idpro = $_POST['idpro'];
                        $ngaybinhluan = date('Y-m-d H:i:s');
                        $iduser = $_SESSION['users']['id'];
                        insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
                    }
                    if (isset($_POST['delete'])) {
                        $idbinhluan = $_POST['idbinhluan'];
                        delete_bl($idbinhluan);
                    }
                    $binhluan = load_binhluan($id);
                    include "views/spct.php";
                } else {
                    include "./views/header.php";
                }
                break;
            case 'users':
                if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                    $user_name = $_POST['user_name'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    insert_users($user_name, $password, $email, $address, $phone);
                    $thongbao = "Đăng ký tài khoản thành công";
                }
                include "./views/taikhoan/users.php";
                break;
            case 'dangnhap':
                if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                    $user_name = $_POST['user_name'];
                    $password = $_POST['password'];
                    $check_user = check_user($user_name, $password);
                    if (is_array($check_user)) {
                        $_SESSION['users'] = $check_user;
                        header("location:index.php");
                    } else {
                        $thongbao = "tên tài khoản hoặc mật khẩu không đúng";
                    }
                }
                include "./views/login.php";
                break;
            case 'edit_tk':
                $thongbao = "";

                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $id = $_POST['id'];
                    $errors = array();

                    if (empty($username)) {
                        $errors[] = "Tên người dùng không được để trống";
                    }
                    if (empty($errors)) {
                        update_users($id, $username, $password, $email, $address, $phone);
                        $_SESSION['users'] = check_user($username, $password);

                        $thongbao = "Cập nhật thành công";
                    } else {
                        $thongbao = "Có lỗi xảy ra:<br>" . implode("<br>", $errors);
                    }
                }

                include "./views/taikhoan/edit_tk.php";
                break;


            case 'quenmk':
                if (isset($_POST['quenmk']) && ($_POST['quenmk'])) {
                    $email = $_POST['email'];
                    $check_email = check_email($email);
                    if (is_array($check_email)) {
                        $thongbao = "Mật khẩu của bạn là" . $check_email['password'];
                    } else {
                        $thongbao = "Email không tồn tại";
                    }
                }
                include "./views/taikhoan/quenmk.php";
                break;
            case 'logout':
                $_SESSION['users'] = null;
                header("location:index.php");
            case 'addtocart':
                if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                    $product_id = $_POST['product_id'];
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $soluong = isset($_POST['so_luong']) ? $_POST['so_luong'] : 1;
                    $ttien = $soluong * $price;
                    $spadd = [$product_id, $name, $img, $price, $soluong, $ttien];
                    array_push($_SESSION['mycart'], $spadd);
                }
                include "./views/cart/viewcart.php";
                break;
            case 'delcart':
                if (isset($_GET['idcart'])) {
                    array_slice($_SESSION['mycart'], $_GET['idcart'], 1);
                } else {
                    $_SESSION['mycart'] = [];
                }
                header('Location: http://localhost/index.php?act=viewcart');
                break;
            case 'viewcart':
                include "./views/cart/viewcart.php";
                break;
            case 'bill':
                include "./views/cart/bill.php";
                break;
            case 'billcomfirm':
                if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $pttt = $_POST['pttt'];
                    date_default_timezone_set('Asia/Saigon');
                    $ngaydathang = date('Y-m-d H:i:s ');
                    $tongdonhang = tongdonhang();
                    $user_id = $_SESSION['users']['id'];
                    $idbill = insert_bill($user_id, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                    }
                    $_SESSION['mycart'] = [];
                }
                $idbill = isset($idbill) ? $idbill : null;
                $bill = loadone_bill($idbill);
                $billct = loadall_cart($idbill);
                include "views/cart/billcomfirm.php";
                break;

            case 'gioithieu':
                include "./views/gioithieu.php";
                break;
            case 'lsmh':
                $billdh = load_bill();
                include "./views/cart/lsmh.php";
                break;
            case 'lsmhct':
                $billdhct = load_billct($_GET['id']);
                include "./views/cart/lsmhct.php";
                break;
        }
    } else {
        include './views/main.php';
    }
    include './views/footer.php';

    ?>
</body>

</html>