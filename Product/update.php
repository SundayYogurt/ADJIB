<?php

if (isset($_POST['Product_ID']) && isset($_POST['Product_Name']) && isset($_POST['Price']) && isset($_POST['Brand'])) {
    require 'connect.php';

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $Product_ID = $_POST['Product_ID'];
    $Product_Name = $_POST['Product_Name'];
    $Price =  $_POST['Price'];
    $Brand = $_POST['Brand'];
    echo ($_POST['Brand']);
    $sql = "UPDATE tbl_product SET Product_Name = :Product_Name, Price = :Price, Brand = :Brand WHERE Product_ID = :Product_ID";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':Product_Name', $_POST['Product_Name']);
    $stmt->bindParam(':Price', $_POST['Price']);
    $stmt->bindParam(':Product_ID', $_POST['Product_ID']);
    $stmt->bindparam(':Brand', $_POST['Brand']);


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
                        text: "Successfuly update",
                        type: "success",
                        timer: 25000,
                        showConfirmButton: "ok"
                    }, function(){
                            window.location.href = "index.php";
                    });
                });                    
                </script>
            ';
        else :
            echo '
                <script type="text/javascript">        
                $(document).ready(function(){
            
                    swal({
                        title: "Error!",
                        text: "fail to update",
                        type: "warning",
                        timer: 25000,
                        showConfirmButton: "ok"
                    }, function(){
                            window.location.href = "index.php";
                    });
                });                    
                </script>
            ';
        endif;
        // echo $message;
    } catch (PDOException $e) {
        echo 'Fail! ' . $e;
    }
    $conn = null;
}
