<?php
session_start();
$status = isset($_SESSION['status']) ? $_SESSION['status'] : null;
unset($_SESSION['status']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>Document</title>
</head>

<body>
  <div class="container">
    <h1>Danh sách</h1>

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">
      Thêm <>
    </button>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>STT</th>
          <th>Họ Tên</th>
          <th>age</th>
          <th>Email</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once 'systems/connect.php';
        $stt = 1;
        $select = 'SELECT * FROM user';
        $result = $conn->query($select);
        foreach ($result as $row) { ?>
       
          <tr>
          
            <td><?= $stt++ ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['email'] ?></td>
            <td>
            <a class="btn btn-info btn-update">Sửa</a>
            
              <a id="delete" href="pages/delete.php ?id= <?= $row[
                  'id'
              ] ?> " onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger ">Xóa</a>
            </td>
            <input type="hidden" class="user_id" value="<?php echo $row[
                'id'
            ]; ?>">
          </tr>
        <?php }
        ?>
      </tbody>
    </table>
  </div>



  
<!-- The Modal update -->
<div class="modal" id="myModalUpdate">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Sửa thông tin</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form action="update/update.php" method="post">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name">User name</label>
                <input type="text" name="name" class="form-control" id="edit_name" placeholder="Nhập tên!" required>
              </div>
              <div class="form-group">
                <label for="name">Age</label>
                <input type="number" name="age" class="form-control" id="edit_age" placeholder="Nhập tuổi!" required>
              </div>
              <div class="form-group">    
                <label for="name">Email</label>
                <input type="email" name="email" class="form-control" id="edit_email" placeholder="Nhập email!" require>
              </div>
              <button class="btn btn-primary">Sửa</button>
            </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>

  <!-- The Modal add -->
  <div class="modal" id="myModalAdd">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="pages/add.php" method="post">
            <div class="form-group">
              <label for="name">User name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Nguyễn Hữu Bắc" required>
            </div>
            <div class="form-group">
              <label for="name">Age</label>
              <input type="number" name="age" class="form-control" id="age" placeholder="22" required>
            </div>
            <div class="form-group">
              <label for="name">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="nghuubac01@gmail.com" required>
            </div>
            <button class="btn btn-primary">Thêm</button>

          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>



  <script>
    <?php if ($status) {
        echo "alert('$status')";
    } ?>



$(document).ready(function(){
  let btnUpdate = document.querySelectorAll(".btn-update");
  let userid = document.querySelectorAll(".user_id");

  for (let i = 0; i < btnUpdate.length; i++) {
    btnUpdate[i].on('click', function() {
			$.ajax({
				url: window.location.protocol + '//' + window.location.host + '/QLNS/update/update.php?id=' + userid[i].val(),
				type: "GET",
				success: function(data) {
					console.log(data);
				}
			})
		})
    
  }
})
  </script>


</body>

</html>