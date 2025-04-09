<?php
session_start();
include("connect.php");

if (!isset($_SESSION['ID_user'])) {
    echo "<script>alert('กรุณาเข้าสู่ระบบ'); window.location='login.php';</script>";
    exit();
}

$ID_user = $_SESSION['ID_user'];

// รับค่าจากฟอร์ม
$cart_data = isset($_POST['cart_data']) ? json_decode($_POST['cart_data'], true) : [];
$Total_amount = isset($_POST['Total_amount']) ? floatval($_POST['Total_amount']) : 0;

// ตรวจสอบความถูกต้องของข้อมูล
if (empty($cart_data) || !is_array($cart_data)) {
    echo "<script>alert('ไม่พบข้อมูลสินค้าในตะกร้า'); window.location='cart.php';</script>";
    exit();
}

if ($Total_amount <= 0) {
    echo "<script>alert('ยอดรวมไม่ถูกต้อง'); window.location='cart.php';</script>";
    exit();
}

// 🔸 บันทึกคำสั่งซื้อ
$order_sql = "INSERT INTO orders (ID_user, Total_amount, Order_date, Order_status)
              VALUES (?, ?, NOW(), 'รอดำเนินการ')";
$stmt = mysqli_prepare($conn, $order_sql);
mysqli_stmt_bind_param($stmt, "id", $ID_user, $Total_amount);
mysqli_stmt_execute($stmt);

$order_id = mysqli_insert_id($conn);
if (!$order_id) {
    echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกคำสั่งซื้อ'); window.location='cart.php';</script>";
    exit();
}



// ล้างตะกร้า
echo "<script>
    alert('สั่งซื้อเรียบร้อยแล้ว!');
    localStorage.removeItem('littleBakeryCart');
    window.location='member.php';
</script>";
?>
