

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Tour</title>
</head>
<body>

<h2>DANH SÁCH TOUR</h2>

<?php

$tours = [
    [
        "matour" => "T01",
        "tentour" => "Tour Đà Lạt",
        "diemden" => "Đà Lạt",
        "gia" => 2000000,
        "songay" => 3
    ],
    [
        "matour" => "T02",
        "tentour" => "Tour Nha Trang",
        "diemden" => "Nha Trang",
        "gia" => 2500000,
        "songay" => 4
    ],
    [
        "matour" => "T03",
        "tentour" => "Tour Phú Quốc",
        "diemden" => "Phú Quốc",
        "gia" => 3500000,
        "songay" => 5
    ],
    [
        "matour" => "T04",
        "tentour" => "Tour Đà Nẵng",
        "diemden" => "Đà Nẵng",
        "gia" => 3000000,
        "songay" => 4
    ]
];

foreach ($tours as $tour) {
    echo "Mã tour: " . $tour["matour"] . "<br>";
    echo "Tên tour: " . $tour["tentour"] . "<br>";
    echo "Điểm đến: " . $tour["diemden"] . "<br>";
    echo "Giá tour: " . number_format($tour["gia"]) . " VNĐ<br>";
    echo "Số ngày: " . $tour["songay"] . " ngày<br>";
    echo "<hr>";
}

?>

<h2>FORM ĐẶT TOUR</h2>

<form method="POST">

    Họ tên:<br>
    <input type="text" name="hoten"><br><br>

    Chọn mã tour:<br>
    <select name="matour">
        <option value="">-- Chọn tour --</option>

        <?php
        foreach ($tours as $tour) {
            echo "<option value='".$tour["matour"]."'>".$tour["matour"]."</option>";
        }
        ?>

    </select>
    <br><br>

    Số người:<br>
    <input type="number" name="songuoi"><br><br>

    <button type="submit">Đặt tour</button>

</form>

<hr>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hoten = $_POST["hoten"];
    $matour = $_POST["matour"];
    $songuoi = $_POST["songuoi"];

    $loi = "";


    if (empty($hoten)) {
        $loi .= "Họ tên không được rỗng<br>";
    }


    if (!is_numeric($songuoi) || $songuoi <= 0) {
        $loi .= "Số người phải lớn hơn 0<br>";
    }

    $tourchon = null;

    foreach ($tours as $tour) {
        if ($tour["matour"] == $matour) {
            $tourchon = $tour;
        }
    }


    if ($tourchon == null) {
        $loi .= "Mã tour không hợp lệ<br>";
    }

    if ($loi != "") {

        echo "<h3>LỖI:</h3>";
        echo $loi;

    } else {

        $tongtien = $tourchon["gia"] * $songuoi;

        echo "<h3>ĐẶT TOUR THÀNH CÔNG</h3>";
        echo "Họ tên: " . $hoten . "<br>";
        echo "Tên tour: " . $tourchon["tentour"] . "<br>";
        echo "Điểm đến: " . $tourchon["diemden"] . "<br>";
        echo "Số người: " . $songuoi . "<br>";
        echo "Tổng tiền: " . number_format($tongtien) . " VNĐ";
    }
}

?>

</body>
</html>