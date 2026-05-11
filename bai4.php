<?php
$username = "";
$email = "";
$success = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];


    if (empty($username)) {
        $errors[] = "Tên đăng nhập không được để trống.";
    } elseif (strlen($username) < 4) {
        $errors[] = "Tên đăng nhập phải có ít nhất 4 ký tự.";
    }

    if (empty($email)) {
        $errors[] = "Email không được để trống.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email không hợp lệ.";
    }


    if (empty($password)) {
        $errors[] = "Mật khẩu không được để trống.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Mật khẩu phải có ít nhất 6 ký tự.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Xác nhận mật khẩu không khớp.";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
        $success = "Đăng ký thành công!<br>";
        $success .= "Tên đăng nhập: " . htmlspecialchars($username) . "<br>";
        $success .= "Email: " . htmlspecialchars($email) . "<br>";
        $success .= "Mật khẩu đã được mã hóa:<br>" . $hashed_password;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký tài khoản</title>
    <style>
        body {
            font-family: Arial;
            width: 500px;
            margin: 30px auto;
        }
        form {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin: 6px 0 12px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
        .success {
            color: green;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid green;
            background: #f0fff0;
        }
    </style>
</head>
<body>

<h2>Đăng ký tài khoản</h2>

<?php if (!empty($errors)): ?>
    <div class="error">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="success">
        <?= $success ?>
    </div>
<?php endif; ?>

<form method="post" action="">
    <label>Tên đăng nhập:</label>
    <input type="text" name="username"
           value="<?= htmlspecialchars($username) ?>">

    <label>Email:</label>
    <input type="email" name="email"
           value="<?= htmlspecialchars($email) ?>">

    <label>Mật khẩu:</label>
    <input type="password" name="password">

    <label>Xác nhận mật khẩu:</label>
    <input type="password" name="confirm_password">

    <button type="submit">Đăng ký</button>
</form>

</body>
</html>