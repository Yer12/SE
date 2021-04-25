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
                            <li><a href="login.php"><i class="fa fa-user-o"></i> Log in</a></li>
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



                        </div>
                        <!-- row -->
                    </div>
                    <!-- container -->
                </div>
                <!-- /MAIN HEADER -->
            </header>
        <!-- /HEADER -->