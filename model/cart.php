<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="">
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 15px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .delete-btn {
        background-color: #ff6347;
        color: #fff;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 4px;
    }

    .delete-btn:hover {
        background-color: #cc0000;
    }

    .total-row {
        font-weight: bold;
        background-color: #4CAF50;
        color: #fff;
    }
</style>

<body>
    <?php
    function loadall_thongke()
    {
        $sql = "select * from  bill order by id desc";
        $listbill= pdo_query($sql);
        return $listbill;
    }

    function viewcart($del)
    {
        global $hinhpath;
        $tong = 0;
        $i = 0;

        $xoasp_th = ($del == 1) ? '<th>Thao tác</th>' : '';
        $xoasp_td2 = ($del == 1) ? '<td></td>' : '';

        echo '<tr>
            <th>Hình</th>
            <th>Sản Phẩm</th>
            <th>Đơn Giá</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
            ' . $xoasp_th . '
        </tr>';

        foreach ($_SESSION['mycart'] as $cart) {
            $hinh = $hinhpath . $cart[2];
            $ttien = $cart[3] * $cart[4];
            $tong += $ttien;

            $xoasp_td = ($del == 1) ? '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a></td>' : '';

            echo '<tr>
                <td><img src="' . $hinh . '" alt="" height="80px"></td>
                <td>' . $cart[1] . '</td>
                <td>' . $cart[3] . '</td>
                <td>' . $cart[4] . '</td>
                <td>' . $ttien . '</td>
                ' . $xoasp_td . '
            </tr>';

            $i += 1;
        }

        echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>' . $tong . '</td>
            ' . $xoasp_td2 . '
        </tr>';
    }

    function bill_chi_tiet($listbill)
    {
        global $hinhpath;
        $tong = 0;
        $i = 0;

        echo '<tr>
            <th>Hình</th>
            <th>Sản Phẩm</th>
            <th>Đơn Giá</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
        </tr>';

        foreach ($listbill as $cart) {
            $hinh = $hinhpath . $cart['image'];
            $tong += $cart['thanhtien'];

            echo '<tr>
                <td><img src="' . $hinh . '" alt="" height="80px"></td>
                <td>' . $cart['name'] . '</td>
                <td>' . $cart['price'] . '</td>
                <td>' . $cart['soluong'] . '</td>
                <td>' . $cart['thanhtien'] . '</td>
            </tr>';

            $i += 1;
        }

        echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>' . $tong . '</td>
        </tr>';
    }
    function bill_don_hang($listbill)
    {
        $tong = 0;
        $i = 0;

        echo '<tr>
            <th>Mã Đơn Hàng</th>
            <th>Ngày Đặt Hàng</th>
            <th>Phương Thức Thanh Toán</th>
            <th>Thành Tiền</th>
        </tr>';

        foreach ($listbill as $bill) {
            $tong += $bill['thanhtien'];
            $pttt =null;
            if($bill['bill_pttt'] == 1){
                $pttt= 'Thanh Toán Trực Tiếp';
            }else if($bill['bill_pttt']==2){
                $pttt= 'Chuyển Khoản';
            }else{
                $pttt= 'Thanh Toán Online';
            }
            echo '<tr>
                <td>DAM-' . $bill['MaDonHang'] . '</td>
                <td>' . $bill['ngaydathang'] . '</td>
                <td>' . $pttt .  '</td>
                <td>' . $bill['thanhtien'] . '</td>
            </tr>';

            $i += 1;
        }

        echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>' . $tong . '</td>
        </tr>';
    }
    function bill_chi_tiet_don_hang($id)
    {

        $tong = 0;
        $i = 0;

        echo '<tr>
            <th>Mã Đơn Hàng</th>
            <th>Sản Phẩm</th>
            <th>Đơn Giá</th>
            <th>Số Lượng</th>
            <th>Ngày Đặt Hàng</th>
            <th>Phương Thức Thanh Toán</th>
            <th>Trạng Thái</th>
            <th>Thành Tiền</th>
        </tr>';

        foreach ($id as $bill) {
            extract($bill);
            $tong += $bill['thanhtien'];
            $pttt =null;
            if($bill['bill_pttt'] == 1){
                $pttt= 'Thanh Toán Trực Tiếp';
            }else if($bill['bill_pttt']==2){
                $pttt= 'Chuyển Khoản';
            }else{
                $pttt= 'Thanh Toán Online';
            }
            $th= null;
            if ($bill['bill_status'] == 0) {
                $th = 'Đang Xử Lý';
            } else if ($bill['bill_status'] == 2) {
                $th = 'Đã Duyệt';
            } else {
                $th = 'Hủy';
            }

            echo '<tr>
                <td>DAM-' . $bill['MaDonHang'] . '</td>
                <td>' . $bill['name'] . '</td>
                <td>' . $bill['price'] . '</td>
                <td>' . $bill['soluong'] . '</td>
                <td>' . $bill['ngaydathang'] . '</td>
                <td>' . $pttt .  '</td>
                <td>' . $th . '</td>
                <td>' . $bill['thanhtien'] . '</td>
            </tr>';

            $i += 1;
        }

        echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>' . $tong . '</td>
        </tr>';
    }
    
    function thongke_don_hang($thongke)
    {
        echo '<table style"width:100%" border="1" style="">
        <tr>
            <th>Mã Đơn Hàng</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Ngày đặt</th>
            <th>Tình trạng</th>
            <th></th>
            
        </tr>';
        
    }

    function tongdonhang()
    {
        $tong = 0;

        foreach ($_SESSION['mycart'] as $cart) {
            $ttien = $cart[3] * $cart[4];
            $tong += $ttien;
        }

        return $tong;
    }

    function insert_bill($user_id,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang){
        $sql="insert into bill(user_id,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) values('$user_id','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
        return pdo_execute_return_lastInsertID($sql);
    }
    function load_bill(){
        $sql=" SELECT * FROM  bill WHERE bill.user_id =". $_SESSION['users']['id'];
        $bill = pdo_query($sql);
        return $bill;
    }
    function load_billct($id){
        $sql=" SELECT bill.id AS MaDonHang, cart.image, cart.name, cart.price, cart.soluong, bill.ngaydathang, bill.bill_pttt,bill.bill_status, cart.thanhtien 
        FROM cart
        INNER JOIN bill ON cart.id_bill = bill.id
        WHERE bill.user_id = {$_SESSION['users']['id']} AND bill.id = {$id}";
        $bill = pdo_query($sql);
        return $bill;
    }

    function load_bill_by_id($id){
        $sql=" SELECT bill.id as MaDonHang, cart.image, cart.name, cart.price, cart.soluong, bill.ngaydathang, bill.bill_pttt, cart.thanhtien FROM cart INNER JOIN bill ON cart.id_bill = bill.id WHERE bill.user_id =". $_SESSION['users']['id'] ." and bill.id = ".$id;
        $bill = pdo_query($sql);
        return $bill;
    }

    function insert_cart($idpro, $image, $name, $price, $soluong, $thanhtien, $id_bill)
    {
        $sql = "INSERT INTO cart(idpro, image, name, price, soluong, thanhtien, id_bill) VALUES ('$idpro', '$image', '$name', '$price', '$soluong', '$thanhtien', '$id_bill')";
        pdo_execute($sql);
    }

    function loadone_bill($id)
    {
        $sql = "SELECT * FROM bill WHERE id=" . $id;
        $bill = pdo_query_one($sql);
        return $bill;
    } 

    function loadall_cart($id_bill)
    {
        $sql = "SELECT * FROM cart WHERE id_bill=" . $id_bill;
        $bill = pdo_query($sql);
        return $bill;
    }

    ?>

</body>

</html>