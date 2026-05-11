
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form Đặt Tour</title>
</head>
<body>

    <h2>FORM ĐẶT TOUR</h2>

    <form method="POST">
        <label>Họ tên:</label><br>
        <input type="text" name="hoten"><br><br>

        <label>Điểm đến:</label><br>
        <input type="text" name="diemden"><br><br>

        <label>Số người:</label><br>
        <input type="number" name="songuoi"><br><br>

        <button type="submit">Đặt tour</button>
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hoten = $_POST["hoten"];
        $diemden = $_POST["diemden"];
        $songuoi = $_POST["songuoi"];

        echo "<h3>THÔNG TIN ĐẶT TOUR</h3>";
        echo "Họ tên khách hàng: " . $hoten . "<br>";
        echo "Điểm đến: " . $diemden . "<br>";
        echo "Số người: " . $songuoi . "<br>";
    }
    ?>

</body>
</html>