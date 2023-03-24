<?php
$id = $_GET['id'];

require_once '../systems/connect.php';
$delete = "DELETE FROM user WHERE id=$id";
$result = mysqli_query($conn, $delete);
if ($result) {
    echo "<script>
    alert('Xóa thành công');
  </script>";
    header('Location: ../index.php');
} else {
    echo "<script>
    alert('Xóa Thất bại');
  </script>";
}
