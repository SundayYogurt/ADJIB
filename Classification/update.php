<?php

if (isset($_POST['Classification_ID']) && isset($_POST['Classification_Name'])) {
    require '../connect.php';

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $Classification_ID = $_POST['Classification_ID'];
    $Classification_Name = $_POST['Classification_Name'];

    $sql = "UPDATE tbl_classification SET Classification_Name = :Classification_Name WHERE Classification_ID = :Classification_ID";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':Classification_ID', $_POST['Classification_ID']);
    $stmt->bindParam(':Classification_Name', $_POST['Classification_Name']);



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
                            window.location.href = "indexclass.php";
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
                            window.location.href = "indexclass.php";
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
