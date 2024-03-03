<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="Picture.css" />
    <link rel="stylesheet" href="blackground.css" />
    <link rel="stylesheet" href="style3.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="locales.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <link href=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css rel="stylesheet">
    <link href=https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css rel="stylesheet">
    <link href=https://cdn.datatables.net/searchpanes/2.3.0/css/searchPanes.bootstrap5.css rel="stylesheet">
    <link href=https://cdn.datatables.net/select/2.0.0/css/select.bootstrap5.css rel="stylesheet">
    <link rel="stylesheet" href="newbg.css" />
    <title>CRUD IT STORE Information </title>

</head>


<body>
    <aside>
        <aside class="sidebar">
            <div class="logo">
                <img src="Picture/output-onlinepngtools.png" alt="logo">
                <h2>ADJIB ADMIN PAGE</h2>
            </div>
            <ul class="links">
                <h4>Main Menu</h4>
                <li>
                    <span class="material-symbols-outlined">home</span>
                    <a href="../index.php">HOME</a>
                </li>
                <li>
                    <span class="material-symbols-outlined">table_view</span>
                    <a href="indexPro.php">product</a>
                </li>
                <li>
                    <span class="material-symbols-outlined">table_view</span>
                    <a href="../Classification/indexclass.php">classification</a>
                </li>
                <li>
                    <span class="material-symbols-outlined">person</span>
                    <a href="../Customer/indexcus.php">customer</a>
                </li>
                <li>
                    <span class="material-symbols-outlined">table_view</span>
                    <a href="../Order/indexOR.php">order</a>
                </li>
                <li>
                    <span class="material-symbols-outlined">person</span>
                    <a href="#">promotion</a>
                </li>
                <li>
                    <span class="material-symbols-outlined">table_view</span>
                    <a href="../Track/indextrack.php">tracking </a>
                </li>
                <h4>Advanced</h4>
                <li>
                    <span class="material-symbols-outlined">Database</span>
                    <a href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=adjib" target="_blank">MyADMIN</a>
                </li>
                <li>
                    <span class="material-symbols-outlined">add</span>
                    <a href="AddProduct_DB.php">ADD NEW PRODUCT</a>
                </li>
                <li class="logout-link">
                    <span class="material-symbols-outlined">logout</span>
                    <a href="javascript:close_window();">Logout</a>
                </li>
            </ul>

        </aside>
        <div class="blackground">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> <br>
                        <h3 style="color: white;">รายการสินค้า </h3> <br>
                        <table id="ITTable" class="display-table table-dark table-striped table-responsive table-bordered table table-hover vw-50 vh-50" data-component="datatable" data-locale="en" data-search="true">

                            <thead align="center">
                                <tr>
                                    <th width="10%">รหัสสินค้า</th>
                                    <th width="20%">ชื่อสินค้า</th>
                                    <th width="15%">ราคา</th>
                                    <th width="10%">ภาพ</th>
                                    <th width="10%">แบรนด์</th>
                                    <th width="10%">ประเภท</th>
                                    <th width="5%">แก้ไข</th>
                                    <th width="5%">ลบ</th>
                                </tr>

                            </thead>
                            <tbody align="center">
                                <?php
                                require '../connect.php';
                                $sql =
                                    'SELECT * FROM tbl_product p, tbl_classification c WHERE p.Classification_ID = c.Classification_ID';
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                foreach ($result as $r) { ?>
                                    <tr>
                                        <td><?= $r['Product_ID'] ?></td>
                                        <td><?= $r['Product_Name'] ?></td>
                                        <td><?= $r['Price'] ?></td>
                                        <div class="boxsize">
                                            <td><img src="./Picture/<?= $r['Picture']; ?>" width="100px" height="120px" alt="image" class="box" onclick="enlargeImg()" id="img1"></td>
                                        </div>
                                        <td><?= $r['Brand'] ?></td>
                                        <td><?= $r['Classification_Name'] ?></td>


                                        <td><a href="updateform.php?Product_ID=<?= $r['Product_ID'] ?>&Product_Name=<?= $r['Product_Name'] ?>&Price=<?= $r['Price'] ?>&Brand=<?= $r['Brand'] ?> " class="btn btn-warning btn-sm">แก้ไข</a></td>
                                        <td><a href="delete.php?Product_ID=<?= $r['Product_ID'] ?>&Product_Name=<?= $r['Product_Name'] ?>&Price=<?= $r['Price'] ?>&Brand=<?= $r['Brand'] ?>" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#ModalCenter" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" charset="utf8" src=https://code.jquery.com/jquery-3.7.1.js></script>
        <script type="text/javascript" charset="utf8" src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js></script>
        <script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/2.0.0/js/dataTables.js></script>
        <script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js></script>
        <script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/searchpanes/2.3.0/js/dataTables.searchPanes.js></script>
        <script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/searchpanes/2.3.0/js/searchPanes.bootstrap5.js></script>
        <script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/select/2.0.0/js/dataTables.select.js></script>
        <script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/select/2.0.0/js/select.bootstrap5.js></script>



        <script>
            $(document).ready(function() {
                $("#ITTable").DataTable();
            });
        </script>



</body>

</html>