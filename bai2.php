

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kiểm Tra Form Đặt Tour</title>
</head>
<body>

<h2>FORM ĐẶT TOUR</h2>

<form method="POST">

    Họ tên:<br>
    <input type="text" name="hoten"><br><br>

    Số điện thoại:<br>
    <input type="text" name="sdt"><br><br>

    Email:<br>
    <input type="text" name="email"><br><br>

    Điểm đến:<br>
    <select name="diemden">
        <option value="">-- Chọn điểm đến --</option>
        <option value="Đà Lạt">Đà Lạt</option>
        <option value="Nha Trang">Nha Trang</option>
        <option value="Phú Quốc">Phú Quốc</option>
    </select>
    <br><br>

    Số người:<br>
    <input type="text" name="songuoi"><br><br>

    <button type="submit">Đặt tour</button>

</form>

<hr>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hoten = $_POST["hoten"];
    $sdt = $_POST["sdt"];
    $email = $_POST["email"];
    $diemden = $_POST["diemden"];
    $songuoi = $_POST["songuoi"];

    $loi = "";

    if (empty($hoten)) {
        $loi .= "Họ tên không được rỗng<br>";
    }

    if (empty($sdt)) {
        $loi .= "Số điện thoại không được rỗng<br>";
    }

    if (empty($email)) {
        $loi .= "Email không được rỗng<br>";
    }

    if (empty($diemden)) {
        $loi .= "Phải chọn điểm đến<br>";
    }

    if (!is_numeric($songuoi) || $songuoi <= 0) {
        $loi .= "Số người phải là số và lớn hơn 0<br>";
    }

    if ($loi != "") {
        echo "<h3>LỖI:</h3>";
        echo $loi;
    } else {
        echo "<h3>Đặt tour thành công</h3>";
    }
}

?>

</body>
</html>