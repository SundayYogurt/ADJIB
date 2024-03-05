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
  <title>update</title>
</head>

<body>

  <?php

  require '../connect.php';

  $sql_select = 'SELECT * FROM tbl_promotion';
  $stmt_s = $conn->prepare($sql_select);
  $stmt_s->execute();


  if (isset($_GET['Promotion_ID'])) {

    $sql_select_or = 'SELECT * FROM tbl_promotion WHERE Promotion_ID=:Promotion_ID AND Promotion_Name=:Promotion_Name AND Promotion_Remaining=:Promotion_Remaining AND Promotion_Date=:Promotion_Date AND Discount_Used=:Discount_Used ';
    $stmt = $conn->prepare($sql_select_or);
    $stmt->bindParam(':Promotion_ID', $_GET['Promotion_ID']);
    $stmt->bindParam(':Promotion_Name', $_GET['Promotion_Name']);
    $stmt->bindParam(':Promotion_Remaining', $_GET['Promotion_Remaining']);
    $stmt->bindParam(':Promotion_Date', $_GET['Promotion_Date']);
    $stmt->bindParam(':Discount_Used', $_GET['Discount_Used']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($result);
  }

  ?>


  <div class="container justify-content-center align-center-item">
    <div class="row">
      <div class="col-md-4"> <br>
        <div class="form-group">
          <h3>ฟอร์มแก้ไขข้อมูลออเดอร์</h3>
          <form action="indexpro.php" method="POST" align="center">

            <label for="name" class="col-sm-2 col-form-label"> เลขโปรโมชั่น: </label>

            <input type="number" name="Promotion_ID" class="form-control" value="<?= $result['Promotion_ID']; ?>">

            <label for="name" class="col-sm-2 col-form-label"> ชื่อโปรโมชั่น: </label>

            <input type="text" name="Promotion_Name" class="form-control" required value="<?php echo $result['Promotion_Name']; ?>">

            <label for="name" class="col-sm-2 col-form-label"> โปรโมชั่นคงเหลือ: </label>

            <input type="number" name="Promotion_Remaining" class="form-control" required value="<?php echo $result['Promotion_Remaining']; ?>">

            <label for="name" class="col-sm-2 col-form-label"> วันหมดโปรโมชั่น: </label>

            <input type="date" name="Track_ID" class="form-control" required value="<?php echo $result['Promotion_Date']; ?>">

            <label for="name" class="col-sm-2 col-form-label"> โปรโมชั่นที่ใช้ไปแล้ว: </label>

            <input type="number" name="Discount_Used" class="form-control" required value="<?php echo $result['Discount_Used']; ?>">

            <br> <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>