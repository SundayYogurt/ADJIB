
    <?php

    if (isset($_POST['Customer_ID']) && isset($_POST['User_Name']) && isset($_POST['Password']) && isset($_POST['zipcode']) && isset($_POST['District']) && isset($_POST['Sub_District']) && isset($_POST['House_no']) && isset($_POST['Province'])) {
        require '../connect.php';

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo ($_POST['Customer_ID']);
        $Customer_ID = $_POST['Customer_ID'];
        $User_Name = $_POST['User_Name'];
        $Password = $_POST['Password'];
        $zipcode = $_POST['zipcode'];
        $District = $_POST['District'];
        $Sub_District = $_POST['Sub_District'];
        $House_no = $_POST['House_no'];
        $Province = $_POST['Province'];


        $sql = "UPDATE tbl_customer SET User_Name = :User_Name, Password = :Password, zipcode = :zipcode, District = :District, Sub_District = :Sub_District, House_no = :House_no, Province = :Province WHERE Customer_ID = :Customer_ID";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':Customer_ID', $_POST['Customer_ID']);
        $stmt->bindParam(':User_Name', $_POST['User_Name']);
        $stmt->bindParam(':Password', $_POST['Password']);
        $stmt->bindParam(':zipcode', $_POST['zipcode']);
        $stmt->bindParam(':District', $_POST['District']);
        $stmt->bindParam(':Sub_District', $_POST['Sub_District']);
        $stmt->bindParam(':House_no', $_POST['House_no']);
        $stmt->bindParam(':Province', $_POST['Province']);
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
