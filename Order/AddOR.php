<!--<!DOCTYPE html>-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="blackground.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="locales.js" defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="../form.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,
          wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>ADD NEW CLASSIFICATION</title>
    <style type="text/css">
        img {
            transition: transform 0.25s ease;
        }

        img:hover {
            -webkit-transform: scale(1.5);

            transform: scale(1.5);
        }
    </style>


</head>

<body>
    <?php
    require '../connect.php';

    $sql_select = 'SELECT * FROM tbl_order';
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();

    if (isset($_POST['submit'])) {
        if (!empty($_POST['Order_ID'])) {

            $sql = "INSERT INTO tbl_order (Order_ID, Customer_ID, Order_Date_Time, Track_ID) VALUES (:Order_ID, :Customer_ID, :Order_Date_Time, :Track_ID)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':Order_ID', $_POST['Order_ID']);
            $stmt->bindParam(':Customer_ID', $_POST['Customer_ID']);
            $stmt->bindParam(':Order_Date_Time', $_POST['Order_Date_Time']);
            $stmt->bindParam(':Track_ID', $_POST['Track_ID']);
            print_r($_POST);
            echo '
                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

            try {
                if ($stmt->execute()) :
                    echo '
                        <script type="text/javascript">        
                        $(document).ready(function(){
                    
                            swal({
                                title: "Success!",
                                text: "Successfuly ADD NEW order",
                                type: "success",
                                timer: 250000,
                                showConfirmButton: "ok"
                            }, function(){
                                    window.location.href = "indexOR.php";
                            });
                        });                    
                        </script>
                    ';
                else :

                    echo '<script type="text/javascript">
            $(document).ready(function(){
              Swal({
                title: "ไม่สำเร็จ",
                text: "ไม่สามารถเพิ่มได้",
                icon: "warning",
                confirmButtonText: "ok",
              }).then(function(){
                window.location.href = "indexOR.php";
              });
            });
          </script>';


                endif;
                // echo $message;
            } catch (PDOException $e) {
                echo 'Fail! ' . $e;
            }
            $conn = null;
        }
    }
    ?>




    <div class="container justify-content-center align-center-item">
        <div class="row">
            <div class="col-md-4"> <br>
                <div class="row g-3">
                    <div class="form-group">
                        <h3>เพิ่มข้อมูลออเดอร์</h3>
                        <form action="AddOR.php" method="POST" enctype="multipart/form-data">
                            <label for="name" class=" col-form-label"> หมายเลขผู้ใช้, รหัสติดตามพัสดุ ต้องตรงถึงจะเพิ่มได้!!! </label>

                            <input type="number" class="form-control" placeholder="หมายเลขออเดอร์" name="Order_ID" required>
                            <br> <br>
                            <input type="number" class="form-control" placeholder="หมายเลขผู้ใช้" name="Customer_ID" required>
                            <br> <br>
                            <input type="datetime-local" class="form-control" placeholder="วันเวลา" name="Order_Date_Time" required>
                            <br> <br>
                            <input type="number" class="form-control" placeholder="รหัสติดตามพัสดุ" name="Track_ID" required>
                            <br> <br>

                            <input type="submit" value="Submit" name="submit" class="btn btn-success" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#IT_Table').DataTable();
        });
    </script>



</body>

</html>