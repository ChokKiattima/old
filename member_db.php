<?php
// filepath: c:\xampp\htdocs\project\little\save_member_data.php
header('Content-Type: application/json');

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpmyadmin";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
}

// รับข้อมูลจาก AJAX
$data = json_decode(file_get_contents("php://input"), true);

$username = $data['User_name'];
$firstname = $data['Firstname'];
$lastname = $data['Lastname'];
$email = $data['Email'];
$phonenumber = $data['Phone_number'];


// บันทึกข้อมูลลงฐานข้อมูล
$sql = "INSERT INTO users (username, firstname, lastname, email, phonenumber) 
        VALUES ('$username', '$firstname', '$lastname', '$email', '$phonenumber')
        ON DUPLICATE KEY UPDATE 
        Firstname='$firstname', Lastname='$lastname', Email='$email', Phone_number='$phone'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Data saved successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
}

$conn->close();
?>