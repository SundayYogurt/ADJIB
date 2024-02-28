<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="form.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,
          wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <title>update product</title>
</head>

<body>

  <?php

  require '../connect.php';

  $sql_select = 'SELECT * FROM tbl_product, tbl_classification ORDER BY Product_ID';
  $stmt_s = $conn->prepare($sql_select);
  $stmt_s->execute();


  if (isset($_GET['Product_ID'])) {

    $sql_select_product = 'SELECT * FROM tbl_product WHERE Product_ID=:Product_ID AND Product_Name=:Product_Name AND Price=:Price AND Brand=:Brand';
    $stmt = $conn->prepare($sql_select_product);
    $stmt->bindParam(':Product_ID', $_GET['Product_ID']);
    $stmt->bindParam(':Product_Name', $_GET['Product_Name']);
    $stmt->bindParam(':Price', $_GET['Price']);
    $stmt->bindParam(':Brand', $_GET['Brand']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  }

  ?>


  <div class="container">
    <div class="row">
      <div class="col-md-4"> <br>
        <div class="form-group">
          <h3>ฟอร์มแก้ไขข้อมูลสินค้า</h3>
          <form action="update.php" method="POST" align="center">
            <div class="form-size">
              <input type="hidden" name="Product_ID" value="<?= $result['Product_ID']; ?>">

              <label for="name" class="col-sm-2 col-form-label"> ชื่อ: </label>

              <input type="text" name="Product_Name" class="form-control" required value="<?php echo $result['Product_Name']; ?>">

              <label for="name" class="col-sm-2 col-form-label"> ราคา : </label>

              <input type="number" name="Price" class="form-control" required value="<?php echo $result["Price"] ?>">


              <label for="name" class="col-sm-2 col-form-label"> แบรนด์ : </label>

              <input type="text" name="Brand" class="form-control" required value="<?php echo $result["Brand"] ?>">

              <label>Select a type of Product</label>
              <select name="Classification_ID" class="form-control">
                <?php
                while ($t = $stmt_s->fetch(PDO::FETCH_ASSOC)) :
                ?>
                  <option value="<?php echo $t['Classification_ID'] ?>">
                    <?php echo $t['Classification_Name'] ?>
                  </option>

                <?php

                endwhile;
                ?>
              </select>
              <br> <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

</body>

</html>