<?php
session_start();
include("connect.php");

if (!isset($_SESSION['ID_user'])) {
    echo "<script>alert('กรุณาเข้าสู่ระบบ'); window.location='login.php';</script>";
    exit();
}

$ID_user = $_SESSION['ID_user'];

// ดึงข้อมูลผู้ใช้
$user_q = mysqli_query($conn, "SELECT * FROM user WHERE ID_user = '$ID_user'");
$user = mysqli_fetch_assoc($user_q);

// ดึงที่อยู่ของผู้ใช้
$address_q = mysqli_query($conn, "SELECT * FROM address WHERE User_ID_user = '$ID_user'");

// ดึงคำสั่งซื้อย้อนหลัง
$order_q = mysqli_query($conn, "SELECT * FROM order WHERE User_ID_user = '$ID_user' ORDER BY Order_date DESC");

// แก้ไขข้อมูลส่วนตัว
if (isset($_POST['update_profile'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $tel = $_POST['Phone_number'];
    mysqli_query($conn, "UPDATE user SET username ='$name', Email='$email', Phone_number='$tel' WHERE ID_user='$ID_user'");
    echo "<script>alert('อัปเดตข้อมูลเรียบร้อย'); window.location='member.php';</script>";
    exit();
}

// เปลี่ยนรหัสผ่าน
if (isset($_POST['change_password'])) {
    $old = $_POST['old_password'];
    $new = $_POST['new_password'];
    $re = $_POST['confirm_password'];

    $check = mysqli_query($conn, "SELECT * FROM user WHERE ID_user='$ID_user' AND password='$old'");
    if (mysqli_num_rows($check)) {
        if ($new === $re) {
            mysqli_query($conn, "UPDATE user SET password='$new' WHERE ID_user='$ID_user'");
            echo "<script>alert('เปลี่ยนรหัสผ่านเรียบร้อย'); window.location='member.php';</script>";
        } else {
            echo "<script>alert('รหัสผ่านใหม่ไม่ตรงกัน');</script>";
        }
    } else {
        echo "<script>alert('รหัสผ่านเดิมไม่ถูกต้อง');</script>";
    }
}

// เพิ่มที่อยู่ใหม่
if (isset($_POST['add_address'])) {
    $desc = $_POST['Description_address'];
    mysqli_query($conn, "INSERT INTO address (Description_address, ID_user) VALUES ('$desc', '$ID_user')");
    echo "<script>alert('เพิ่มที่อยู่เรียบร้อย'); window.location='member.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>บัญชีสมาชิก</title>
</head>
<body>
<h1>ข้อมูลสมาชิก</h1>
<form method="post">
    <label>ชื่อ:</label><br>
    <input type="text" name="name" value="<?php echo htmlspecialchars($user['User_name']); ?>" required><br>
    <label>อีเมล:</label><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($user['Email']); ?>" required><br>
    <label>เบอร์โทร:</label><br>
    <input type="text" name="tel" value="<?php echo htmlspecialchars($user['Tel_user']); ?>"><br><br>
    <button type="submit" name="update_profile">อัปเดตข้อมูลส่วนตัว</button>
</form>

<hr>
<h2>เปลี่ยนรหัสผ่าน</h2>
<form method="post">
    <input type="password" name="old_password" placeholder="รหัสผ่านเดิม" required><br>
    <input type="password" name="new_password" placeholder="รหัสผ่านใหม่" required><br>
    <input type="password" name="confirm_password" placeholder="ยืนยันรหัสผ่านใหม่" required><br><br>
    <button type="submit" name="change_password">เปลี่ยนรหัสผ่าน</button>
</form>

<hr>
<h2>เพิ่มที่อยู่จัดส่ง</h2>
<form method="post">
    <textarea name="address_desc" placeholder="กรอกที่อยู่ใหม่" required></textarea><br>
    <button type="submit" name="add_address">เพิ่มที่อยู่</button>
</form>

<hr>
<h2>ที่อยู่ของคุณ</h2>
<ul>
    <?php while ($addr = mysqli_fetch_assoc($address_q)): ?>
        <li><?php echo htmlspecialchars($addr['Description_address']); ?></li>
    <?php endwhile; ?>
</ul>

<hr>
<h2>ประวัติการสั่งซื้อ</h2>
<ul>
    <?php while ($order = mysqli_fetch_assoc($order_q)): ?>
        <li>เลขที่สั่งซื้อ: <?php echo $order['ID_order']; ?> | วันที่: <?php echo $order['Order_date']; ?> | สถานะ: <?php echo $order['Order_status']; ?> | ยอดรวม: <?php echo $order['Total_amount']; ?> บาท</li>
    <?php endwhile; ?>
</ul>
</body>
</html>