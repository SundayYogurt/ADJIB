
    <?php

    if (isset($_POST['Order_ID']) && isset($_POST['Customer_ID']) && isset($_POST['Order_Date_Time']) && isset($_POST['Track_ID'])) {
        require '../connect.php';

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo ($_POST['Customer_ID']);
        $Order_ID = $_POST['Order_ID'];
        $Customer_ID = $_POST['Customer_ID'];
        $Order_Date_Time = $_POST['Order_Date_Time'];
        $Track_ID = $_POST['Track_ID'];

        $sql = "UPDATE tbl_order SET Customer_ID = :Customer_ID, Order_Date_Time = :Order_Date_Time, Track_ID = :Track_ID WHERE Order_ID = :Order_ID";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':Order_ID', $_POST['Order_ID']);
        $stmt->bindParam(':Customer_ID', $_POST['Customer_ID']);
        $stmt->bindParam(':Order_Date_Time', $_POST['Order_Date_Time']);
        $stmt->bindParam(':Track_ID', $_POST['Track_ID']);
        // print_r($stmt);

        echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
        // print_r($stmt);
        try {
            // print_r($stmt);
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
                            window.location.href = "indexcus.php";
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
                            window.location.href = "indexcus.php";
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
