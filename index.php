<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Main page</title>
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
        <style>
            html,body {
                scroll-behavior: smooth !important;
            }
			.tap{
				color: #D10425;
			}
        </style>
    </head>

    <body>
        <!-- HEADER -->
            <header>
                <!-- TOP HEADER -->
                <div id="top-header">
                    <div class="container">
                        <ul class="header-links pull-left">
                            <li><a href="#"><i class="fa fa-phone"></i> +7707-523-38-16</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                            <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Almaty, Tulebaeva 38</a></li>
                        </ul>
                        <ul class="header-links pull-right">
                        <?php
                            if($_COOKIE['user'] != ''):
                        ?>
                            <li><a href="login.php"><i class="fa fa-user-o"></i> <?= $_COOKIE['user']?></a></li>
                            <li><a href="exit.php"> Log out</a></li>
                        <?php else: ?>
                            <li><a href="login.php"><i class="fa fa-user-o"></i> Login</a></li>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <!-- /TOP HEADER -->

                <!-- MAIN HEADER -->
                <div id="header">
                    <!-- container -->
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <!-- LOGO -->
                            <div class="col-md-3">
                                <div class="header-logo">
                                    <a href="index.php" class="logo">
                                        <!-- <img src="./img/logo.png" alt=""> -->
                                       <h1 style="color: white; margin-top:10px;">KI<span class="tap">TAP</span></h1>
                                    </a>
                                </div>
                            </div>
                            <!-- /LOGO -->



                        </div>
                        <!-- row -->
                    </div>
                    <!-- container -->
                </div>
                <!-- /MAIN HEADER -->
            </header>
        <!-- /HEADER -->
        <?php require "blocks/nav.php" ?>


        <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
                                <div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
                                    <?php
                                        try{
                                            // $mysql = new mysqli('localhost', 'root', 'root', 'se');
                                            // $result = $mysql -> query("SELECT * FROM `books` LIMIT 10");

											$mysql = new mysqli('remotemysql.com', 'KzxmCsv99W', 'Kz0rgSvacP', 'KzxmCsv99W');
                                            $result = $mysql -> query("SELECT * FROM `books` LIMIT 10");
                                        }
                                        catch(Exception $e){
                                            $error = $e->getMessage();
                                        }

                                        $rows = $result->num_rows;
                                        if(!$rows){
                                            echo "No Results Found";
                                        }
                                        else{
                                            while($books = $result->fetch_assoc()){ ?>
                                                <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img src=<?php echo $books['image']; ?> alt="">
                                                            <div class="product-label">
                                                                <span class="sale">-30%</span>
                                                                <span class="new">NEW</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">Category: <?php echo $books['category']; ?></p>
                                                            <h3 class="product-name"><a href="product.php?product=<?php echo $books['producd_key'] ?>"><?php echo $books['product_name']; ?></a></h3>
                                                            <h4 class="product-price">$<?php echo $books['price']-100; ?> <del class="product-old-price">$<?php echo $books['price']; ?></del></h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                            </div>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                                        </div>
                                                    </div>
                                                    <!-- /product -->

                                            <?php
                                            }
                                        }

                                        $mysql->close();
                                        ?>


									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

         <!-- SECTION -->
        		<div class="section">
        			<!-- container -->
        			<div class="container">
        				<!-- row -->
        				<div class="row">
        					<!-- shop -->
        					<div class="col-md-4 col-xs-6">
        						<div class="shop">
        							<div class="shop-img">
        								<img src="./img/17239-9-5bcd981e13467.jpeg" alt="">
        							</div>
        							<div class="shop-body">
        								<h3>Book<br>Collection</h3>
        								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
        							</div>
        						</div>
        					</div>
        					<!-- /shop -->

        					<!-- shop -->
							<div class="col-md-4 col-xs-6">
        						<div class="shop">
        							<div class="shop-img">
        								<img src="./img/17239-9-5bcd981e13467.jpeg" alt="">
        							</div>
        							<div class="shop-body">
        								<h3>Book<br>Collection</h3>
        								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
        							</div>
        						</div>
        					</div>
        					<!-- /shop -->

        					<!-- shop -->
							<div class="col-md-4 col-xs-6">
        						<div class="shop">
        							<div class="shop-img">
        								<img src="./img/17239-9-5bcd981e13467.jpeg" alt="">
        							</div>
        							<div class="shop-body">
        								<h3>Book<br>Collection</h3>
        								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
        							</div>
        						</div>
        					</div>
        					<!-- /shop -->
        				</div>
        				<!-- /row -->
        			</div>
        			<!-- /container -->
        		</div>
        		<!-- /SECTION -->


        <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
								 <?php
                                        try{
											$mysql = new mysqli('remotemysql.com', 'KzxmCsv99W', 'Kz0rgSvacP', 'KzxmCsv99W');
                                            $result = $mysql -> query("SELECT * FROM `books` WHERE `producd_key` BETWEEN 1 AND 5");
                                        }
                                        catch(Exception $e){
                                            $error = $e->getMessage();
                                        }

                                        $rows = $result->num_rows;
                                        if(!$rows){
                                            echo "No Results Found";
                                        }
                                        else{
                                            while($books = $result->fetch_assoc()){ ?>
                                                <!-- product widget -->
												<div class="product-widget">
													<div class="product-img">
														<img src=<?php echo $books['image']; ?> alt="">
													</div>
													<div class="product-body">
														<p class="product-category">Category: <?php echo $books['category']; ?></p>
														<h3 class="product-name"><a href="product.php?product=<?php echo $books['producd_key'] ?>"><?php echo $books['product_name']; ?></a></h3>
														<h4 class="product-price">$<?php echo $books['price']-200; ?> <del class="product-old-price">$<?php echo $books['price']; ?></del></h4>
													</div>
												</div>
										<!-- /product widget -->

                                            <?php
                                            }
                                        }

                                        $mysql->close();
                                        ?>


								</div>

							<div>
								<?php
                                        try{
											$mysql = new mysqli('remotemysql.com', 'KzxmCsv99W', 'Kz0rgSvacP', 'KzxmCsv99W');
                                            $result = $mysql -> query("SELECT * FROM `books` WHERE `producd_key` BETWEEN 6 AND 11");
                                        }
                                        catch(Exception $e){
                                            $error = $e->getMessage();
                                        }

                                        $rows = $result->num_rows;
                                        if(!$rows){
                                            echo "No Results Found";
                                        }
                                        else{
                                            while($books = $result->fetch_assoc()){ ?>
                                                <!-- product widget -->
												<div class="product-widget">
													<div class="product-img">
														<img src=<?php echo $books['image']; ?> alt="">
													</div>
													<div class="product-body">
														<p class="product-category">Category: <?php echo $books['category']; ?></p>
														<h3 class="product-name"><a href="product.php?product=<?php echo $books['producd_key'] ?>"><?php echo $books['product_name']; ?></a></h3>
														<h4 class="product-price">$<?php echo $books['price']-200; ?> <del class="product-old-price">$<?php echo $books['price']; ?></del></h4>
													</div>
												</div>
										<!-- /product widget -->

                                            <?php
                                            }
                                        }

                                        $mysql->close();
                                        ?>

							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
						<?php
                                        try{
											$mysql = new mysqli('remotemysql.com', 'KzxmCsv99W', 'Kz0rgSvacP', 'KzxmCsv99W');
                                            $result = $mysql -> query("SELECT * FROM `books` WHERE `producd_key` BETWEEN 12 AND 17");
                                        }
                                        catch(Exception $e){
                                            $error = $e->getMessage();
                                        }

                                        $rows = $result->num_rows;
                                        if(!$rows){
                                            echo "No Results Found";
                                        }
                                        else{
                                            while($books = $result->fetch_assoc()){ ?>
                                                <!-- product widget -->
												<div class="product-widget">
													<div class="product-img">
														<img src=<?php echo $books['image']; ?> alt="">
													</div>
													<div class="product-body">
														<p class="product-category">Category: <?php echo $books['category']; ?></p>
														<h3 class="product-name"><a href="product.php?product=<?php echo $books['producd_key'] ?>"><?php echo $books['product_name']; ?></a></h3>
														<h4 class="product-price">$<?php echo $books['price']-200; ?> <del class="product-old-price">$<?php echo $books['price']; ?></del></h4>
													</div>
												</div>
										<!-- /product widget -->

                                            <?php
                                            }
                                        }

                                        $mysql->close();
                                        ?>

							</div>

							<div>
							<?php
                                        try{
                                            $mysql = new mysqli('remotemysql.com', 'KzxmCsv99W', 'Kz0rgSvacP', 'KzxmCsv99W');
                                            $result = $mysql -> query("SELECT * FROM `books` WHERE `producd_key` BETWEEN 15 AND 20");
                                        }
                                        catch(Exception $e){
                                            $error = $e->getMessage();
                                        }

                                        $rows = $result->num_rows;
                                        if(!$rows){
                                            echo "No Results Found";
                                        }
                                        else{
                                            while($books = $result->fetch_assoc()){ ?>
                                                <!-- product widget -->
												<div class="product-widget">
													<div class="product-img">
														<img src=<?php echo $books['image']; ?> alt="">
													</div>
													<div class="product-body">
														<p class="product-category">Category: <?php echo $books['category']; ?></p>
														<h3 class="product-name"><a href="product.php?product=<?php echo $books['producd_key'] ?>"><?php echo $books['product_name']; ?></a></h3>
														<h4 class="product-price">$<?php echo $books['price']-200; ?> <del class="product-old-price">$<?php echo $books['price']; ?></del></h4>
													</div>
												</div>
										<!-- /product widget -->

                                            <?php
                                            }
                                        }

                                        $mysql->close();
                                        ?>

							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
							<?php
                                try{
                                   $mysql = new mysqli('remotemysql.com', 'KzxmCsv99W', 'Kz0rgSvacP', 'KzxmCsv99W');
                                    $result = $mysql -> query("SELECT * FROM `books` WHERE `producd_key` BETWEEN 1 AND 5");
                                }
                                catch(Exception $e){
                                    $error = $e->getMessage();
                                }

                                $rows = $result->num_rows;
                                if(!$rows){
                                    echo "No Results Found";
                                }
                                else{
                                    while($books = $result->fetch_assoc()){ ?>
                                        <!-- product widget -->
										<div class="product-widget">
											<div class="product-img">
												<img src=<?php echo $books['image']; ?> alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Category: <?php echo $books['category']; ?></p>
												<h3 class="product-name"><a href="product.php?product=<?php echo $books['producd_key'] ?>"><?php echo $books['product_name']; ?></a></h3>
												<h4 class="product-price">$<?php echo $books['price']-200; ?> <del class="product-old-price">$<?php echo $books['price']; ?></del></h4>
											</div>
										</div>
								<!-- /product widget -->

                                    <?php
                                    }
                                }

                                $mysql->close();
                                ?>

							</div>

							<div>
							<?php
                                        try{
                                            $mysql = new mysqli('remotemysql.com', 'KzxmCsv99W', 'Kz0rgSvacP', 'KzxmCsv99W');
                                            $result = $mysql -> query("SELECT * FROM `books` WHERE `producd_key` BETWEEN 6 AND 11");
                                        }
                                        catch(Exception $e){
                                            $error = $e->getMessage();
                                        }

                                        $rows = $result->num_rows;
                                        if(!$rows){
                                            echo "No Results Found";
                                        }
                                        else{
                                            while($books = $result->fetch_assoc()){ ?>
                                                <!-- product widget -->
												<div class="product-widget">
													<div class="product-img">
														<img src=<?php echo $books['image']; ?> alt="">
													</div>
													<div class="product-body">
														<p class="product-category">Category: <?php echo $books['category']; ?></p>
														<h3 class="product-name"><a href="product.php?product=<?php echo $books['producd_key'] ?>"><?php echo $books['product_name']; ?></a></h3>
														<h4 class="product-price">$<?php echo $books['price']-200; ?> <del class="product-old-price">$<?php echo $books['price']; ?></del></h4>
													</div>
												</div>
										<!-- /product widget -->

                                            <?php
                                            }
                                        }

                                        $mysql->close();
                                        ?>

							</div>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

        <!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->


        <?php require "blocks/footer.php" ?>
        <!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

    </body>
</html>
