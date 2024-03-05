<?php

if (isset($_POST['Promotion_ID']) && isset($_POST['Promotion_Name']) && isset($_POST['Promotion_Remaining']) && isset($_POST['Promotion_Date']) && isset($_POST['Promotion_Used'])) {
    require '../connect.php';
    echo $_POST['Promotion_ID'];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $Promotion_ID = $_POST['Promotion_ID'];
    $Promotion_Name = $_POST['Promotion_Name'];
    $Promotion_Remaining =  $_POST['Promotion_Remaining'];
    $Promotion_Date = $_POST['Promotion_Date'];
    $Promotion_Used = $_POST['Promotion_Used'];

    $sql = "UPDATE tbl_promotion SET Promotion_Name = :Promotion_Name, Promotion_Remaining = :Promotion_Remaining, Promotion_Date = :Promotion_Date, Promotion_Date = :Promotion_Date WHERE Promotion_ID = :Promotion_ID";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':Promotion_Name', $_POST['Promotion_Name']);
    $stmt->bindParam(':Promotion_Remaining', $_POST['Promotion_Remaining']);
    $stmt->bindParam(':Promotion_ID', $_POST['Promotion_ID']);
    $stmt->bindparam(':Promotion_Date', $_POST['Promotion_Date']);
    $stmt->bindparam(':Promotion_Used', $_POST['Promotion_Used']);


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
                            window.location.href = "indexpro.php";
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
                            window.location.href = "indexpro.php";
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
