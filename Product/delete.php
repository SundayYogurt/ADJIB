<?php

require('connect.php');
if (isset($_GET['Product_ID'])) {
    $strID = $_GET['Product_ID'];
}




$sql = "DELETE FROM tbl_product WHERE Product_ID = :Product_ID";
$stml = $conn->prepare($sql);
$stml->bindParam(':Product_ID', $_GET['Product_ID']);
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ($stml->execute()) {
    $message = "Successfully delete " . $_GET['Product_ID'] . ".";
    echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "ลบเรียบร้อย!",
                text: "ดำเนินการลบเรียบร้อย",
                type: "success",
                timer: 2500,
                showConfirmButton: "ok"
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
} else {
    $message = "Fail to delete customer information.";
}

$conn = null;
