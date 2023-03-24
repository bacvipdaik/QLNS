<?php
session_start();
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];

require_once '../systems/connect.php';

$add = "INSERT INTO user (name, age, email) VALUES ('$name', '$age', '$email')";
$result = mysqli_query($conn, $add);
if ($result) {
    $status = 'Thêm thành công';
    $_SESSION['status'] = $status;
    header('Location: ../index.php');
} else {
    $error = 'Thêm thất bại';
}
