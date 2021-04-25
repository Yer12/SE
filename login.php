<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Login page</title>

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
            .form-signin{
                padding:40px;
                width: 60%;
                margin: 0 auto;
            }
            .tap{
				color: #D10425 !important;
			}
        </style>
    </head>

    <body>
        <?php  require "blocks/header.php" ?>
        <div class="container">
            <form action="validation-form/auth.php" class="form-signin" method="POST">
                <h2>Login</h2>
                <Br>
                <input type="text" name="username" class="form-control" placeholder="Enter your username"><br>
                <input type="password" name="password" class="form-control" placeholder="Password"><br>
                <button class="btn btn-success" type="submit">Log in</button>
                <a href="registration.php" class="mt-2"><p>Already not registered?</p></a>
            </form>
        </div>

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
