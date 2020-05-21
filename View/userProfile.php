<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
    <title>Modist - Đặng Cường Trọng Tấn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <hr>
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
                            <a id="dqcuong" class="dropdown-item" href="?page=shop">
                                Shop All
                                <div id="cuonglu" class="dropdown-menu">
                                    <a class="dropdown-item" href="product-single.html">Single Product</a>
                                    <a class="dropdown-item" href="cart.html">Cart</a>
                                    <a class="dropdown-item" href="checkout.html">Checkout</a>
                                </div>

                            </a>
                            <a class="dropdown-item" href="?page=cart">Cart</a>
                        </div>
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
                        echo "<li class='nav-item'><a href='?page=login' class='nav-link'>Đăng Kí</a></li>";
                    } ?>
                    <li class="nav-item"><a href="?page=login" class="nav-link">Đăng Nhập</a></li>
                    <li class="nav-item cta cta-colored"><a href="?page=cart" class="nav-link"><span class="icon-shopping_cart"></span>[<?php if (isset($_SESSION['total'])) echo $_SESSION['total'] ?>]</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    <div class="noidung">
        <div class="container bootstrap snippet ">
            <div class="row">
                <div class="col-sm-10">
                    <h1 style="color:red">Chào mừng <?php echo $_SESSION['user']['user'] ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>

                    </ul>


                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <hr>
                            <form class="form" action="?page=updateUser" method="post" id="registrationForm">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name">
                                            <h4>Name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="name" id="first_name" value="<?php echo $_SESSION['user']['name'] ?>" title="enter your first name if any.">
                                    </div>
                                </div>


                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="phone">
                                            <h4>Number Phone</h4>
                                        </label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $_SESSION['user']['number_phone'] ?>" title="enter your phone number if any.">
                                    </div>
                                </div>


                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Email</h4>
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['user']['email'] ?>" title="enter your email.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Address</h4>
                                        </label>
                                        <input type="text" class="form-control" name = "address" id="address" value="<?php echo $_SESSION['user']['address'] ?>" title="enter a address">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Sex</h4>
                                        </label>
                                        <input type="text" class="form-control" name = "sex" id="address" value="<?php echo $_SESSION['user']['sex'] ?>" title="enter a address">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Date of birth</h4>
                                        </label>
                                        <input type="text" class="form-control" name = "day" id="address" value="<?php echo $_SESSION['user']['date_of_birth'] ?>" title="enter a address">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password">
                                            <h4>Password</h4>
                                        </label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password2">
                                            <h4>Verify</h4>
                                        </label>
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign" ></i> Save</button>
                                    </div>
                                </div>
                            </form>
                            <h3 style="color: red"><?php if(isset($thongBao)) echo $thongBao ?></h3>
                            <hr>

                        </div>
                        <!--/tab-pane-->

                    </div>
                    <!--/tab-pane-->
                </div>
                <!--/tab-content-->

            </div>
            <!--/col-9-->
        </div>
        <!--/row-->
    </div>
    <style>
        .noidung {
            background-color: #60a3bc;
            width: 100%;
            height: 100%;
        }
    </style>
    <script>
        $(document).ready(function() {


            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function() {
                readURL(this);
            });
        });
    </script>
</body>