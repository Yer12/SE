
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Category page</title>

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
			.dwrap{
				display: flex;
				flex-wrap: wrap;
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
											   <h1 style="color: white; margin-top:10px;">Periodicals</h1>
                                           </a>
                                       </div>
                                   </div>
                                   <!-- /LOGO -->

                                   <!-- SEARCH BAR -->
                                   <div class="col-md-6">
                                       <div class="header-search">
                                       <?php
                                            $mysql = new mysqli('localhost', 'root', 'root', 'se');
                                            $csql="SELECT `category`, COUNT(DISTINCT(`product_name`)) AS 'n' FROM `books` GROUP by `category`";
											$cresult = $mysql->query($csql);

                                            if(isset($_POST['search'])){
                                                $searchKey = $_POST['search'];
                                                $sql="SELECT * FROM `books` WHERE `product_name` LIKE '%$searchKey%'";
                                            }
                                            else{
                                                $sql="SELECT * FROM `books`";
                                                $csql="SELECT `category`, COUNT(DISTINCT(`product_name`)) AS 'n' FROM `books` GROUP by `category`";
                                            }
											$result = $mysql->query($sql);
											$count = mysqli_num_rows($result);
                                       ?>
                                           <form method="post">
                                               <input class="input" type="text" name="search" id="search" placeholder="Search here" value="<? echo $searchKey; ?>">
                                               <button type="submit" class="search-btn">Search</button>
                                           </form>
                                       </div>
                                   </div>
                                   <!-- /SEARCH BAR -->

                                   <!-- ACCOUNT -->
                                   <div class="col-md-3 clearfix">
                                       <div class="header-ctn">
                                           <!-- Wishlist -->
                                           <div>
                                               <a href="#">
                                                   <i class="fa fa-heart-o"></i>
                                                   <span>Your Wishlist</span>
                                                   <div class="qty">2</div>
                                               </a>
                                           </div>
                                           <!-- /Wishlist -->

                                           <!-- Cart -->
                                           <div class="dropdown">
                                               <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                   <i class="fa fa-shopping-cart"></i>
                                                   <span>Your Cart</span>
                                                   <div class="qty">3</div>
                                               </a>
                                               <div class="cart-dropdown">
                                                   <div class="cart-list">
                                                       <div class="product-widget">
                                                           <div class="product-img">
                                                               <img src="./img/product01.png" alt="">
                                                           </div>
                                                           <div class="product-body">
                                                               <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                               <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                                           </div>
                                                           <button class="delete"><i class="fa fa-close"></i></button>
                                                       </div>

                                                       <div class="product-widget">
                                                           <div class="product-img">
                                                               <img src="./img/product02.png" alt="">
                                                           </div>
                                                           <div class="product-body">
                                                               <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                               <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                                           </div>
                                                           <button class="delete"><i class="fa fa-close"></i></button>
                                                       </div>
                                                   </div>
                                                   <div class="cart-summary">
                                                       <small>3 Item(s) selected</small>
                                                       <h5>SUBTOTAL: $2940.00</h5>
                                                   </div>
                                                   <div class="cart-btns">
                                                       <a href="#">View Cart</a>
                                                       <a href="checkout.php">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                                   </div>
                                               </div>
                                           </div>
                                           <!-- /Cart -->

                                           <!-- Menu Toogle -->
                                           <div class="menu-toggle">
                                               <a href="#">
                                                   <i class="fa fa-bars"></i>
                                                   <span>Menu</span>
                                               </a>
                                           </div>
                                           <!-- /Menu Toogle -->
                                       </div>
                                   </div>
                                   <!-- /ACCOUNT -->
                               </div>
                               <!-- row -->
                           </div>
                           <!-- container -->
                       </div>
                       <!-- /MAIN HEADER -->
                   </header>
               <!-- /HEADER -->
        <?php require "blocks/nav.php" ?>

        <!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">All Categories</a></li>
							
						
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
        <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
							
   								 <?php
                                    while($crow=$cresult->fetch_assoc()){ ?>
                                        <div class="list-group-item checkbox  ">
                                            <label>
                                                <input type="checkbox" class="product_check brand" value="<?php echo $row['category']; ?>">
                                                <?php echo $crow['category']; ?>
                                                <small>( <?php echo $crow['n']; ?> )</small>
                                            </label>
                                        </div>
                                <?php
                                    }
                                ?>

							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->


					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
					    <h3>All products:</h3><br>

						<!-- store products -->
						<div class="dwrap">

							<!-- product -->
							<?php
									while($row=$result->fetch_assoc()){ ?>
										<!-- product -->
										<div class="col-md-4 col-xs-6">
											<div class="product">
												<div class="product-img">
													<img src=<?= $row['image']; ?> alt="">
													<div class="product-label">
														<span class="sale">-30%</span>
														<span class="new">NEW</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">Category: <?= $row['category']; ?></p>
													<h3 class="product-name"><a href="product.php?product=<?php echo $row['producd_key'] ?>"> <?= $row['product_name']; ?></a></h3>
													<h4 class="product-price">$<?= $row['price']-200; ?> <del class="product-old-price">$<?= $row['price']; ?></del></h4>
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

							<div class="clearfix visible-sm visible-xs"></div>
										</div>
										<!-- /product -->

								<?php
									}
								?>

							</div>


						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing <? echo $count ?> products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
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
		<script>
// 			$(document).ready(function(){
//
// 				$(".product_check").click(function(){
// 					var action = 'data';
// 					var brand = get_filter_text('');
// 				});
//
// 				 function get_filter_text(text_id){
// 					 var filterData = [];
// 					 $('#'+text_id+':checked').each(function(){
// 						filterData.push($(this).val());
// 					 });
// 					 return filterData;
// 				 }
// 			});
		</script>
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>
</html>
