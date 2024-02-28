
    <?php

    if (isset($_POST['Track_ID']) && isset($_POST['Courior_Name'])) {
        require '../connect.php';

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo ($_POST['Customer_ID']);
        $Track_ID = $_POST['Track_ID'];
        $Courior_Name = $_POST['Courior_Name'];


        $sql = "UPDATE tbl_tracking SET Courior_Name = :Courior_Name WHERE Track_ID = :Track_ID";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':Track_ID', $_POST['Track_ID']);
        $stmt->bindParam(':Courior_Name', $_POST['Courior_Name']);
        echo ($_POST['Track_ID']);
        print_r($stmt);

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
                            window.location.href = "indextrack.php";
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
                            window.location.href = "indextrack.php";
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
