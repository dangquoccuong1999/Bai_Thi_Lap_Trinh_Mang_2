<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <title>Modist - Đặng Cường Trọng Tấn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="View/sing_up/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="View/sing_up/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="View/sing_up/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="View/sing_up/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="View/sing_up/css/main.css" rel="stylesheet" media="all">


    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="View/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="View/css/animate.css">
    <link rel="stylesheet" href="View/css/owl.carousel.min.css">
    <link rel="stylesheet" href="View/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="View/css/magnific-popup.css">
    <link rel="stylesheet" href="View/css/aos.css">

    <link rel="stylesheet" href="View/css/ionicons.min.css">
    <link rel="stylesheet" href="View/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="View/css/jquery.timepicker.css">

    <link rel="stylesheet" href="View/css/flaticon.css">
    <link rel="stylesheet" href="View/css/icomoon.css">
    <link rel="stylesheet" href="View/css/style.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="?">Modist</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="?" class="nav-link">Home</a></li>
                        <li class="nav-item dropdown active">
                            
                        </li>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php if (isset($_SESSION['user'])) echo  $_SESSION['user']['user'] ?></a>
                                <div class="dropdown-menu" aria-labelledby="dropdown04">
                                    <a class="dropdown-item" href="?page=userProfile">Tài khoản của tôi</a>
                                    <a class="dropdown-item" href="?page=logout">Đăng xuất</a>
                                </div>
                            </li>
                        <?php } else {
                            echo "<li class='nav-item'><a href='?page=dangKi' class='nav-link'>Đăng Kí</a></li>";
                        } ?>
                        <li class="nav-item"><a href="?page=login" class="nav-link">Đăng Nhập</a></li>
                        <li class="nav-item cta cta-colored"><a href="?page=cart" class="nav-link"><span class="icon-shopping_cart"></span>[<?php if (isset($_SESSION['total'])) echo $_SESSION['total'] ?>]</a></li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title ">Registration Info</h2>
                    <form method="POST" action="?page=dangKi">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="User" name="user">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Password" name="pass1">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Enter the password again" name="pass2">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Name" name="name">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3 js-datepicker" type="date" placeholder="Birthdate" name="birthday">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="gender">
                                    <option disabled="disabled" selected="selected">Gender</option>
                                    <option value='Nam'>Male</option>
                                    <option value='Nữ'>Female</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Phone" name="phone">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Address" name="address">
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit" name="submitSingUp">Submit</button>
                        </div>
                    </form>
                    <?php if(isset($thongBao)) echo $thongBao?>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="View/sing_up/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="View/sing_up/vendor/select2/select2.min.js"></script>
    <script src="View/sing_up/vendor/datepicker/moment.min.js"></script>
    <script src="View/sing_up/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="View/sing_up/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->