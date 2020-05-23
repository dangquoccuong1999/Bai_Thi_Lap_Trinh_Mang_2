<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modist - Đặng Cường Trọng Tấn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="?page=admin&user">Modist</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="?page=admin&user" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Shop
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="?page=admin&user">List user</a>
                            <a class="dropdown-item" href="?page=adminProduct&product">Add Product</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thống kê sản phẩm</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <div id="menuchinh">Doanh thu cao nhất</div>
                            <div id="menuchinh2">Bán chạy nhất</div>
                            <div id="menuchinh2"><a href="?page=sanPhamMoi" style="color:black">Sản phẩm mới</a></div>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdown04" id="menuan">
                            <a class="dropdown-item" href="?page=sanPhamDoanhThuCaoNhatThang&thang=1&nam=<?php echo $year ?>">Tháng 1</a>
                            <a class="dropdown-item" href="?page=sanPhamDoanhThuCaoNhatThang&thang=2&nam=<?php echo $year ?>">Tháng 2</a>
                            <a class="dropdown-item" href="?page=sanPhamDoanhThuCaoNhatThang&thang=3&nam=<?php echo $year ?>">Tháng 3</a>
                            <a class="dropdown-item" href="?page=sanPhamDoanhThuCaoNhatThang&thang=4&nam=<?php echo $year ?>">Tháng 4</a>
                            <a class="dropdown-item" href="?page=sanPhamDoanhThuCaoNhatThang&thang=5&nam=<?php echo $year ?>">Tháng 5</a>
                            <a class="dropdown-item" href="?page=sanPhamDoanhThuCaoNhatThang&thang=6&nam=<?php echo $year ?>">Tháng 6</a>
                            <a class="dropdown-item" href="?page=sanPhamDoanhThuCaoNhatThang&thang=7&nam=<?php echo $year ?>">Tháng 7</a>
                            <a class="dropdown-item" href="?page=sanPhamDoanhThuCaoNhatThang&thang=8&nam=<?php echo $year ?>">Tháng 8</a>
                            <a class="dropdown-item" href="?page=sanPhamDoanhThuCaoNhatThang&thang=9&nam=<?php echo $year ?>">Tháng 9</a>
                            <a class="dropdown-item" href="?page=sanPhamDoanhThuCaoNhatThang&thang=10&nam=<?php echo $year ?>">Tháng 10</a>
                            <a class="dropdown-item" href="?page=sanPhamDoanhThuCaoNhatThang&thang=11&nam=<?php echo $year ?>">Tháng 11</a>
                            <a class="dropdown-item" href="?page=sanPhamDoanhThuCaoNhatThang&thang=12&nam=<?php echo $year ?>">Tháng 12</a>
                        </div>

                        <div class="dropdown-menu" aria-labelledby="dropdown04" id="menuan2">
                            <a class="dropdown-item" href="?page=sanPhamBanChayThang&thang=1&nam=<?php echo $year ?>">Tháng 1</a>
                            <a class="dropdown-item" href="?page=sanPhamBanChayThang&thang=2&nam=<?php echo $year ?>">Tháng 2</a>
                            <a class="dropdown-item" href="?page=sanPhamBanChayThang&thang=3&nam=<?php echo $year ?>">Tháng 3</a>
                            <a class="dropdown-item" href="?page=sanPhamBanChayThang&thang=4&nam=<?php echo $year ?>">Tháng 4</a>
                            <a class="dropdown-item" href="?page=sanPhamBanChayThang&thang=5&nam=<?php echo $year ?>">Tháng 5</a>
                            <a class="dropdown-item" href="?page=sanPhamBanChayThang&thang=6&nam=<?php echo $year ?>">Tháng 6</a>
                            <a class="dropdown-item" href="?page=sanPhamBanChayThang&thang=7&nam=<?php echo $year ?>">Tháng 7</a>
                            <a class="dropdown-item" href="?page=sanPhamBanChayThang&thang=8&nam=<?php echo $year ?>">Tháng 8</a>
                            <a class="dropdown-item" href="?page=sanPhamBanChayThang&thang=9&nam=<?php echo $year ?>">Tháng 9</a>
                            <a class="dropdown-item" href="?page=sanPhamBanChayThang&thang=10&nam=<?php echo $year ?>">Tháng 10</a>
                            <a class="dropdown-item" href="?page=sanPhamBanChayThang&thang=11&nam=<?php echo $year ?>">Tháng 11</a>
                            <a class="dropdown-item" href="?page=sanPhamBanChayThang&thang=12&nam=<?php echo $year ?>">Tháng 12</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thống kê người dùng</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <div id="menuchinh3">Mua nhiều nhất</div>
                            <div id="menuchinh3"><a href="?page=khachHangChuaMuaSanPhamNao" style="color:black">Chưa mua sản phẩm nào</a></div>

                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdown04" id="menuan3">
                            <a class="dropdown-item" href="?page=khachHangMuaNhieuNhat&thang=1&nam=<?php echo $year ?>">Tháng 1</a>
                            <a class="dropdown-item" href="?page=khachHangMuaNhieuNhat&thang=2&nam=<?php echo $year ?>">Tháng 2</a>
                            <a class="dropdown-item" href="?page=khachHangMuaNhieuNhat&thang=3&nam=<?php echo $year ?>">Tháng 3</a>
                            <a class="dropdown-item" href="?page=khachHangMuaNhieuNhat&thang=4&nam=<?php echo $year ?>">Tháng 4</a>
                            <a class="dropdown-item" href="?page=khachHangMuaNhieuNhat&thang=5&nam=<?php echo $year ?>">Tháng 5</a>
                            <a class="dropdown-item" href="?page=khachHangMuaNhieuNhat&thang=6&nam=<?php echo $year ?>">Tháng 6</a>
                            <a class="dropdown-item" href="?page=khachHangMuaNhieuNhat&thang=7&nam=<?php echo $year ?>">Tháng 7</a>
                            <a class="dropdown-item" href="?page=khachHangMuaNhieuNhat&thang=8&nam=<?php echo $year ?>">Tháng 8</a>
                            <a class="dropdown-item" href="?page=khachHangMuaNhieuNhat&thang=9&nam=<?php echo $year ?>">Tháng 9</a>
                            <a class="dropdown-item" href="?page=khachHangMuaNhieuNhat&thang=10&nam=<?php echo $year ?>">Tháng 10</a>
                            <a class="dropdown-item" href="?page=khachHangMuaNhieuNhat&thang=11&nam=<?php echo $year ?>">Tháng 11</a>
                            <a class="dropdown-item" href="?page=khachHangMuaNhieuNhat&thang=12&nam=<?php echo $year ?>">Tháng 12</a>
                        </div>


                    </li>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php if (isset($_SESSION['user'])) echo  $_SESSION['user']['user'] ?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="?page=logout">Đăng xuất</a>
                            </div>
                        </li>
                    <?php } else {
                        echo "<li class='nav-item'><a href='?page=dangKi' class='nav-link'>Đăng Kí</a></li>";
                    } ?>
                    <li class="nav-item"><a href="?page=login" class="nav-link">Đăng Nhập</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    <?php if (isset($_GET['product'])) { ?>
        <br>
        <div style="margin-top:50px">
            <h1>Danh sách sản phẩm</h1>
            <h3><a href="?page=adminAddProduct">Thêm sản phẩm</a></h3>
            <br>
            <br>
            <form action="?page=adminUpdateProduct" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name Product</th>
                            <th scope="col">Name Producer</th>
                            <th scope="col">Origin</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Img_product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Capacity</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <?php $i =1; foreach ($products as $product) {?>
                        
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $product['id'] ?></th>
                                <td><input value="<?php echo $product['name_product'] ?>" name="name_product[<?php echo $i ?>]"></td>
                                <td><input value="<?php echo $product['name_producer'] ?>" name="name_producer[<?php echo $i ?>]"></td>
                                <td><input value="<?php echo $product['origin'] ?>" style="width:50%" name="origin[<?php echo $i ?>]"></td>
                                <td><input value="<?php echo $product['description'] ?>" name="description[<?php echo $i ?>]"></td>
                                <td><input value="<?php echo $product['category'] ?>" style="width:50%" name="category[<?php echo $i ?>]"></td>
                                <td><img src="View/<?php echo $product['img_product'] ?>" style="width:100px" name="img_product[<?php echo $i ?>]">
                                    <input type="file" name="img_product[<?php echo $i ?>]">
                                </td>
                                <td><input value="<?php echo $product['price'] ?>" name="price[<?php echo $i ?>]"></td>
                                <td><input value="<?php echo $product['capacity'] ?>" style="width:50%" name="capacity[<?php echo $i ?>]" disabled></td>
                                <td><input value="<?php echo $product['quantity_number'] ?>" style="width:50%" name="quantity_number[<?php echo $i ?>]"></td>
                                <td><a href="?page=adminDeleteProduct&id=<?php echo $product['id'] ?>">Delete</a></td>
                            </tr>
                        </tbody>
                    <?php $i++; } ?>
                </table>
                <p align="right">
                    <input type="submit" value="Update" name="updateProduct">
                </p>
            </form>
            <?php if (isset($_SESSION['thongBaoUpdateSp'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <strong><?php echo $_SESSION['thongBaoUpdateSp']?> !</strong>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center py-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h1 class="big">Subscribe</h1>
                        <h2>Subcribe to our Newsletter</h2>
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="col-md-8">
                                <form action="#" class="subscribe-form">
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control" placeholder="Enter email address">
                                        <input type="submit" value="Subscribe" class="submit px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="ftco-footer bg-light ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Modist</h2>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Shop</a></li>
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Journal</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Help</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">FAQs</a></li>
                                <li><a href="#" class="py-2 d-block">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


    <script src="View/js/jquery.min.js"></script>
    <script src="View/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="View/js/popper.min.js"></script>
    <script src="View/js/bootstrap.min.js"></script>
    <script src="View/js/jquery.easing.1.3.js"></script>
    <script src="View/js/jquery.waypoints.min.js"></script>
    <script src="View/js/jquery.stellar.min.js"></script>
    <script src="View/js/owl.carousel.min.js"></script>
    <script src="View/js/jquery.magnific-popup.min.js"></script>
    <script src="View/js/aos.js"></script>
    <script src="View/js/jquery.animateNumber.min.js"></script>
    <script src="View/js/bootstrap-datepicker.js"></script>
    <script src="View/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="View/js/google-map.js"></script>
    <script src="View/js/main.js"></script>

    
    <style>
            #menuan {
                display: none;
                position: absolute;
                top: 70px;
                left: 150px;
            }

            #menuchinh {
                position: relative;
                /* font-size: 14px;
                text-align: center; */
            }

            #menuan2 {
                display: none;
                position: absolute;
                top: 100px;
                left: 150px;
            }

            #menuchinh2 {
                position: relative;
                /* font-size: 14px;
                text-align: center; */
            }

            #menuan3 {
                display: none;
                position: absolute;
                top: 70px;
                left: 140px;
            }

            #menuchinh3 {
                position: relative;
                /* font-size: 14px;
                text-align: center; */
            }
        </style>

        <script>
            $(document).ready(function() {
                $("#menuchinh").mouseenter(function() {
                    $("#menuan").css("display", "block");
                });

                $("#menuchinh").mouseleave(function() {
                    $("#menuan").css("display", "none");
                });


                $("#menuan").mouseenter(function() {
                    $("#menuan").css("display", "block");
                });

                $("#menuan").mouseleave(function() {
                    $("#menuan").css("display", "none");
                });

                //menu 2
                $("#menuchinh2").mouseenter(function() {
                    $("#menuan2").css("display", "block");
                });

                $("#menuchinh2").mouseleave(function() {
                    $("#menuan2").css("display", "none");
                });


                $("#menuan2").mouseenter(function() {
                    $("#menuan2").css("display", "block");
                });

                $("#menuan2").mouseleave(function() {
                    $("#menuan2").css("display", "none");
                });

                //menu 3
                $("#menuchinh3").mouseenter(function() {
                    $("#menuan3").css("display", "block");
                });

                $("#menuchinh3").mouseleave(function() {
                    $("#menuan3").css("display", "none");
                });


                $("#menuan3").mouseenter(function() {
                    $("#menuan3").css("display", "block");
                });

                $("#menuan3").mouseleave(function() {
                    $("#menuan3").css("display", "none");
                });


            })
        </script>
</body>

</html>