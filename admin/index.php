<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/users.php";
include "../model/binhluan.php";
include "../model/brand.php";
include "../model/cart.php";
include "../model/thongke.php";
include "header.php";
session_start();

if (!isset($_SESSION['users']) || $_SESSION['users']['role'] != 1) {
    header('Location: http://localhost/index.php');
}

if (isset($_GET['act'])) {
    $act  = $_GET['act'];

    switch ($act) {
        case 'adddm':
            $thongbao = "";

            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $tenloai = trim($_POST['tenloai']);

                if (empty($tenloai)) {
                    $thongbao = "Tên loại không được trống";
                } else {
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
            }

            include "danhmuc/add.php";
            break;

        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                xoa_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/updete.php";
            break;


        case 'updatedm':
            $thongbao = "";

            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $iddm = $_POST['iddm'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $mota = $_POST['mota'];
                $brand_id = 1;
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $errors = array();

                if (empty($name)) {
                    $errors[] = "Tên sản phẩm không được để trống";
                }

                if (!is_numeric($price) || $price <= 0) {
                    $errors[] = "Giá sản phẩm phải là số dương";
                }

                if (empty($mota)) {
                    $errors[] = "Mô tả không được để trống";
                }

                if (empty($hinh)) {
                    $errors[] = "Hình sản phẩm không được để trống";
                }

                if (empty($errors)) {
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        update_sanpham($name, $price, $hinh, $mota, $iddm, $brand_id);
                        $thongbao = "Thêm thành công";
                    } else {
                        $thongbao = "Không thể tải lên hình sản phẩm";
                    }
                } else {
                    $thongbao = "Có lỗi xảy ra:<br>" . implode("<br>", $errors);
                }
            }

            $listsanpham = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'listsp':
            if (isset($_POST['listokla']) && ($_POST['listokla'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;

        case 'addsp':
            $thongbao = "";

            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $mota = $_POST['mota'];
                $brand_id = 1;
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $errors = array();

                if (empty($name)) {
                    $errors[] = "Tên sản phẩm không được để trống";
                }

                if (!is_numeric($price) || $price <= 0) {
                    $errors[] = "Giá sản phẩm phải là số dương";
                }

                if (empty($mota)) {
                    $errors[] = "Mô tả không được để trống";
                }

                if (empty($hinh)) {
                    $errors[] = "Hình sản phẩm không được để trống";
                }

                if (empty($errors)) {
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        $iddm = isset($_POST['iddm']) ? (int)$_POST['iddm'] : 0;
                        insert_sanpham($name, $price, $hinh, $mota, $iddm, $brand_id);
                        $thongbao = "Thêm thành công";
                    } else {
                        $thongbao = "Không thể tải lên hình sản phẩm";
                    }
                } else {
                    $thongbao = "Có lỗi xảy ra:<br>" . implode("<br>", $errors);
                }
            }

            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;



        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                xoa_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;

        case 'updetesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {

                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinhsp']['name'];
                $targer_dir = "../upload/";
                $target_file = $targer_dir . basename($_FILES["hinhsp"]["name"]);
                if (move_uploaded_file($_FILES["hinhsp"]["tmp_name"], $target_file)) {
                } else {
                }
                update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;
        case 'dskh':
            $listtaikhoan = loadAll_tk();
            include "taikhoan/list.php";
            break;
        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_tk($_GET['id']);
            }
            $listtaikhoan = loadAll_tk();
            include "taikhoan/list.php";
            break;
        case 'dsbl':
            $listbl = loadAll_bl();
            include "binhluan/list.php";
            break;
        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bl($_GET['id']);
            }
            $listbl = loadAll_bl();
            include "binhluan/list.php";
            break;
        case 'qldonhang':
            $listbill = load_bill();
            include "quanly/list.php";
            break;
        case 'xoadonhang':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                xoa_sanpham($_GET['id']);
            }
            $listbilli = load_bill();
            include "quanly/list.php";
        case 'ctdh':
            $billdhct = load_billct($_GET['id']);
            include "quanly/ctdh.php";
            break;
        case 'thongke':
            $listthongke = loadll_thongke();
            include "thongke/list.php";
            break;
        case 'bieudo':
            $listthongke = loadll_thongke();
            include "thongke/bieudo.php";
            break;
        case 'editdh':
            include "sanpham/editdh.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}


include "footer.php";
