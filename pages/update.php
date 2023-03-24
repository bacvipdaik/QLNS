<?php
$id = $_GET['id'];
// $name = $_POST['name'];
// $age = $_POST['age'];
// $email = $_POST['email'];

require_once '../systems/connect.php';

$show = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($conn, $show);
$row = mysqli_fetch_assoc($result);
header('Content-Type: application/json');
echo json_encode($row);
$update =
    'UPDATE  user SET name="$name", age="$age", email="$email" WHERE id = $id';

// $complete = mysqli_query($conn, $update);

?>
