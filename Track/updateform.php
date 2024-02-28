<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  <!-- <link rel="stylesheet" href="./css/style.css" /> -->
  <!-- <link rel="stylesheet" href="Picture.css" />
  <link rel="stylesheet" href="blackground.css" /> -->
  <!-- <link rel="stylesheet" href="style.css" /> -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
  <script src="locales.js" defer></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="../form.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,
          wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <title>update track</title>
</head>

<body>

  <?php

  require '../connect.php';

  $sql_select = 'SELECT * FROM tbl_tracking';
  $stmt_s = $conn->prepare($sql_select);
  $stmt_s->execute();


  if (isset($_GET['Track_ID'])) {

    $sql_select_cus = 'SELECT * FROM tbl_tracking WHERE Track_ID=:Track_ID AND Courior_Name=:Courior_Name ';
    $stmt = $conn->prepare($sql_select_cus);
    $stmt->bindParam(':Track_ID', $_GET['Track_ID']);
    $stmt->bindParam(':Courior_Name', $_GET['Courior_Name']);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // echo 'Customer_ID' . $_GET['Customer_ID'] . "<br>";
    // echo 'Customer' . $_GET['User_Name'] . "<br>";
    // echo 'Customer' . $_GET['Password'] . "<br>";
    // echo 'Customer' . $_GET['zipcode'] . "<br>";
    // echo 'Customer' . $_GET['District'] . "<br>";
    // echo 'Customer' . $_GET['Sub_District'] . "<br>";
    // echo 'Customer' . $_GET['House_no'] . "<br>";
    // echo 'Customer_ID' . $_GET['Province'] . "<br>";

    // print_r($result);
  }

  ?>


  <div class="container justify-content-center align-center-item">
    <div class="row">
      <div class="col-md-4"> <br>
        <div class="form-group">
          <h3>ฟอร์มแก้ไขข้อมูลการติดตาม</h3>
          <form action="update.php" method="POST" align="center">

            <label for="name" class="col-sm-2 col-form-label"> เลขหมายติดตาม: </label>

            <input type="number" name="Customer_ID" class="form-control" value="<?= $result['Track_ID']; ?>">

            <label for="name" class="col-sm-2 col-form-label"> ชื่อขนส่ง: </label>

            <input type="text" name="User_Name" class="form-control" required value="<?php echo $result['Courior_Name']; ?>">


            <br> <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>