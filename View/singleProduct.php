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
            <a class="navbar-brand" href="?">Modist</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="?" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="?page=shop">Shop All</a>
                            <a class="dropdown-item" href="?page=cart">Cart</a>
                        </div>
                    </li>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php if (isset($_SESSION['user'])) echo  $_SESSION['user']['user'] ?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="?page=userProfile">Tài khoản của tôi</a>
                                <a class="dropdown-item" href="">Đăng xuất</a>
                            </div>
                        </li>
                    <?php } else {
                        echo "<li class='nav-item'><a href='?page=login' class='nav-link'>Đăng Kí</a></li>";
                    } ?>
                    <li class="nav-item"><a href="?page=login" class="nav-link">Đăng Nhập</a></li>
                    <li class="nav-item cta cta-colored"><a href="?page=cart" class="nav-link"><span class="icon-shopping_cart"></span>[<?php if (isset($_SESSION['total'])) echo $_SESSION['total'] ?>]</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('View/images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Product Single</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="View/images/menu-2.jpg" class="image-popup"><img src="View/<?php echo $this->getSingleProduct()[0]['img_product'] ?>" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3><?php echo $this->getSingleProduct()[0]['name_product'] ?></h3>
                    <p class="price"><span><?php echo number_format($this->getSingleProduct()[0]['price']) ?> VND</span></p>
                    <p><?php echo $this->getSingleProduct()[0]['description'] ?></p>
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group d-flex">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>

                                    <form method="post" action="?page=single_product&id=<?php echo $_GET['id'] ?>">
                                        <h5>Dung tích <?php echo $this->getSingleProduct()[0]['capacity']  ?> </h5>
                                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                        <br>
                                        <input type="submit" name="addcart" class="btn btn-primary py-3 px-5 addProduct" value="Add">
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big">Products</h1>
                    <h2 class="mb-4">Related Products</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                        <div class="product">
                            <a href="?page=single_product&id=<?php echo $this->recommended_products()[$i]['id'] ?>" class="img-prod"><img class="img-fluid" src="View/<?php echo $this->recommended_products()[$i]['img_product'] ?>" alt="Colorlib Template"></a>
                            <div class="text py-3 px-3">
                                <h3><a href="?page=single_product&id=<?php echo $this->recommended_products()[$i]['id'] ?>"><?php echo $this->recommended_products()[$i]['name_product'] ?></a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span><?php echo number_format($this->recommended_products()[$i]['price']) ?> VND</span></p>
                                    </div>
                                    <!-- <div class="rating">
                                    <p class="text-right">
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                    </p>
                                </div> -->
                                </div>
                                <hr>
                                <!-- <p class="bottom-area d-flex">
                                    <a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                                    <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
                                </p> -->
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

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

    <script>
        $(document).ready(function() {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });


        });
    </script>

</body>

</html>