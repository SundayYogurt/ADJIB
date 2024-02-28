<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="Picture.css" />
    <link rel="stylesheet" href="blackground.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css.scss" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="locales.js" defer></script>
    <script src="babel.js" defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <title>CRUD IT STORE Information </title>
    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">

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
                    <a href="index.php">HOME</a>
                </li>
                <li>
                    <span class="material-symbols-outlined">table_view</span>
                    <a href="./Product/indexPro.php">product</a>
                </li>
                <li>
                    <span class="material-symbols-outlined">table_view</span>
                    <a href="./Classification/indexclass.php">classification</a>
                </li>
                <li>
                    <span class="material-symbols-outlined">person</span>
                    <a href="./Customer/indexcus.php">customer</a>
                </li>
                <li>
                    <span class="material-symbols-outlined">table_view</span>
                    <a href="./Order/indexOR.php">order</a>
                </li>
                <li>
                    <span class="material-symbols-outlined">person</span>
                    <a href="#">promotion</a>
                </li>
                <li>
                    <span class="material-symbols-outlined">table_view</span>
                    <a href="./Track/indextrack.php">tracking </a>
                </li>
                <h4>Advanced</h4>
                <li>
                    <span class="material-symbols-outlined">Database</span>
                    <a href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=adjib" target="_blank">MyADMIN</a>
                </li>
                <li class="logout-link">
                    <span class="material-symbols-outlined">logout</span>
                    <a href="javascript:close_window();">Logout</a>
                </li>
            </ul>

        </aside>

        </style>
        <section class="header">
            <h1> <img src="Picture/output-onlinepngtools.png" alt="logo">
                ADJIB STORE</h1><br>
            <p>ADMIN PAGE SERVICES</p>

            <section class="container">
                <div class="card__container swiper">
                    <div class="card__content">
                        <div class="swiper-wrapper">
                            <article class="card__article swiper-slide">
                                <div class="card__image">
                                    <img src="Picture/avatar-1.png" alt="image" class="card__img">
                                    <div class="card__shadow"></div>
                                </div>

                                <div class="card__data">
                                    <h3 class="card__name"> CEO KRITSANA</h3>
                                    <p class="card__description">

                                    </p>

                                    <a href="https://www.facebook.com/profile.php?id=100008939291216" target="_blank" class="card__button">View More</a>
                                </div>
                            </article>

                            <article class="card__article swiper-slide">
                                <div class="card__image">
                                    <img src="Picture/avartar-3.png" alt="image" class="card__img">
                                    <div class="card__shadow"></div>
                                </div>

                                <div class="card__data">
                                    <h3 class="card__name">WIFE'CEO BARAREAM </h3>
                                    <p class="card__description">
                                        แฟนCEO
                                    </p>

                                    <a href="https://www.instagram.com/suphatsorn26?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="card__button">View More</a>
                                </div>
                            </article>

                            <article class="card__article swiper-slide">
                                <div class="card__image">
                                    <img src="Picture/avartar-5.png" alt="image" class="card__img">
                                    <div class="card__shadow"></div>
                                </div>

                                <div class="card__data">
                                    <h3 class="card__name">STAFF APISARA</h3>
                                    <p class="card__description">

                                    </p>

                                    <a href="https://www.facebook.com/apisara.samboonruag" target="_blank" class="card__button">View More</a>
                                </div>
                            </article>

                            <article class="card__article swiper-slide">
                                <div class="card__image">
                                    <img src="Picture/avartar-6.png" alt="image" class="card__img">
                                    <div class="card__shadow"></div>
                                </div>

                                <div class="card__data">
                                    <h3 class="card__name">STAFF PHUSANU</h3>
                                    <p class="card__description">

                                    </p>

                                    <a href="https://www.facebook.com/profile.php?id=100023945021819" target="_blank" class="card__button">View More</a>
                                </div>
                            </article>

                            <article class="card__article swiper-slide">
                                <div class="card__image">
                                    <img src="Picture/avartar-4.png" alt="image" class="card__img">
                                    <div class="card__shadow"></div>
                                </div>

                                <div class="card__data">
                                    <h3 class="card__name">CO CEO KASANI</h3>
                                    <p class="card__description">

                                    </p>

                                    <a href="#" class="card__button">View More</a>
                                </div>
                            </article>
                        </div>
                    </div>

                    <!-- Navigation buttons -->
                    <div class="swiper-button-next">
                        <i class="ri-arrow-right-s-line"></i>
                    </div>

                    <div class="swiper-button-prev">
                        <i class="ri-arrow-left-s-line"></i>
                    </div>

                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <!--=============== SWIPER JS ===============-->
            <script src="assets/js/swiper-bundle.min.js"></script>

            <!--=============== MAIN JS ===============-->
            <script src="assets/js/main.js"></script>

            <body>

                <h2 class="mb-5"></h2>
                <button type="button" class="btn btn-primary py-12 px-4" data-toggle="modal" data-target="#exampleModalCenter">
                    โฆษณา
                </button>

                <!-- Modal -->

        </section>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="ion-ios-close"></span>
                        </button>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-5 d-flex">
                            <div class="modal-body p-5 color-2 d-flex">
                                <span class="icon-2 flaticon-snowflake"></span>
                                <div class="w-100 text text-center">
                                    <span class="subheading">Summer</span>
                                    <h3 class="sale">Sale
                                        <span class="icon flaticon-snowflake"></span>
                                    </h3>
                                    <h2><span>40</span><sup>%</sup><sub>off</sub></h2>
                                    <p class="upper">To all colorlib products</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 d-flex">
                            <div class="modal-body p-8 img d-flex align-items-center" style="background-image: url(images/bg-2.jpg);">
                                <div class="text w-100">
                                    <a href="https://www.advice.co.th/promotion/flashsale" class="btn btn-primary d-block py-3">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>