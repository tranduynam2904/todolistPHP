<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'testquanlikhachhang';
$conn = new mysqli($servername,$username,$password,$database);
// if ($conn->connect_error){
//     die('Connection failed: ' . $conn->connect_error);
// }
// echo 'Connected successfully';

if(isset($_GET["control"]) && $_GET["control"] == "delete"){
    if(isset($_GET["id"])){
        $sql = "delete from nhanvien where manhanvien = '$_GET[id]'";
    }
    mysqli_query($conn, $sql);
    header("location:buoi5.php");
}
if(isset($_POST['themnhanvien'])){
    $manv = $_POST['manv'];
    $tennv = $_POST['tennv'];
    $sdt = $_POST['sdt'];
    $nglv = $_POST['nglv'];
    $sql = "insert into nhanvien values('$manv','$tennv','$sdt',$nglv)";
    // die($sql);
    mysqli_query($conn, $sql);
    header("location:buoi5.php");
}
$sql = 'select * from nhanvien';
$result = mysqli_query($conn,$sql);
// $kq = mysqli_fetch_array($result);
// echo '<pre>';
// print_r($kq);
// echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>Document</title>
</head>

<body>
   <p></p>
   <form method="post" >
  <div class="container mt-3">
  <table class="table">
    <thead>
    </thead>
    <tbody class='table_add'>
      <tr>
        <td>Mã nhân viên</td>
        <td><input type='text' placeholder ='Mã nhân viên' name='manv'></td>
      </tr>
      <tr>
        <td>Tên nhân viên</td>
        <td><input type='text' placeholder ='Tên sản phẩm' name='tennv'></td>
      </tr>
      <tr>
      <td>Số điện thoại</td>
        <td><input type='text' placeholder ='Số điện thoại' name='sdt'></td>
      </tr>
      <tr>
      <td>Ngày làm việc</td>
        <td><input type='date' placeholder ='Ngày làm việc' name='nglv'></td>
        </tr>
      </tr>
    </tbody>
  </table>
  <button class="btn btn-primary" id='addbutton' type='submit' value='Thêm mới' name='themnhanvien'>Thêm nhân viên</button>
</form>
</div>
   
   <table class="table">
    <thead>
      <tr>
        <th>Staff ID</th>
        <th>Username</th>
        <th>Phone</th>
        <th>Work Day</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
        <?php
        while($row = mysqli_fetch_array($result)){
         ?>   
         <tr>
         <td><?php echo $row['Manhanvien'];?></td>
        <td><?php echo $row['Hoten'];?></td>
        <td><?php echo $row['Dienthoai'];?></td>
        <td><?php echo $row['Ngaylamviec'];?></td>
        <td><a onclick="return window.confirm('Do you want to detele this?');" href="buoi5.php?control=delete&id=<?php echo $row['Manhanvien'] ?>">Delete</a></td>
        <td><a href="#">Edit</a></td>
      </tr>
         <?php
        }
        ?>
      
    </tbody>
  </table>
  
</body>
</html>
