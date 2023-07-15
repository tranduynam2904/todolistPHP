<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'testquanlikhachhang';
$conn = new mysqli($servername,$username,$password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  $sql = 'select * from nhanvien';
  $result = mysqli_query($conn,$sql);
  if(isset($_GET["control"]) && $_GET["control"] == "delete"){
    if(isset($_GET["id"])){
        $sql = "delete from nhanvien where manhanvien = '$_GET[id]'";
    }
    mysqli_query($conn,$sql);
    header("location:codelaiSQL.php");
}
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
<table class="table">
    <thead>
      <tr>
        <th>Username</th>
        <th>Phone</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
        <?php
        while($row = mysqli_fetch_array($result)){
        ?>
      <tr>
        <td><?php echo $row['Hoten']?></td>
        <td><?php echo $row['Dienthoai']?></td>
        <td><a href="codelaiSQL.php?control=delete&id=<?php echo $row['Manhanvien'] ?>" onclick="return window.confirm('Do you want to detele this?');" name='delete'>Delete</a></td>
        <td><a href ='#'>Edit</a></td>
      </tr>
<?php
}
?>
    </tbody>
  </table>
</body>
</html>