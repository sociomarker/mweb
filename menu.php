<body>

<div class="page-wrapper">

    <header class="header">
    <div class="header-wrapper">
        <div class="container">
            <div class="header-inner">
                <div class="header-logo">
                    <a href="index.html">
                        <img src="assets/img/logo.png" alt="Logo">
                        <span>Mia Mia</span>
                    </a>
                </div><!-- /.header-logo -->

                <div class="header-content">
                    <div class="header-bottom">


	<ul class="header-nav-primary nav nav-pills collapse navbar-collapse">
    <li <?php if($thisPage == 'home') echo 'class="active"' ?>>
        <a href="index.php">Home</a>
    </li>
	<!--<li >
        <a href="about.php">About Us</a>
    </li>-->

    <li <?php if($thisPage == 'cat') echo 'class="active"' ?>>
        <a href="#">Browse by Category<i class="fa fa-chevron-down"></i></a>

        <ul class="sub-menu">
			<?php
				$pui = getAllCat();
				for($u = 0; $u < count($pui); $u++ ){
					echo '<li><a href="listing-cat.php?cat='.$pui[$u]['category_id'].'">'.$pui[$u]['category_name'].'</a></li>';
				}
			?>
        </ul>
    </li>
	<li >
        <a href="blog.php">Blog</a>
    </li>
	<li <?php if($thisPage == 'contact') echo 'class="active"' ?>>
        <a href="contact.php">Contact Us</a>
    </li>
	<?php
		if($_flag == 1){
	?>
    <li>
        <a href="#">Hey <?php echo $_name ?><i class="fa fa-chevron-down"></i></a>

        <ul class="sub-menu">
				<!--<li><a href="#">Manage Profile</a></li>-->
				<li><a href="newapp/web/logout.php">Logout</a></li>
        </ul>
    </li>


	<?php
		} else {
	?>
	<li <?php if($thisPage == 'login') echo 'class="active"' ?>>
        <a href="login.php">Login</a>
    </li>
	<?php
		}
	?>
	<li <?php if($thisPage == 'freelisting') echo 'class="active"' ?>>
        <a href="freelisting.php"><span class="highlight">Free Listing</span></a>
    </li>

</ul>

<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav-primary">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>

                    </div><!-- /.header-bottom -->
                </div><!-- /.header-content -->
            </div><!-- /.header-inner -->
        </div><!-- /.container -->
    </div><!-- /.header-wrapper -->
</header><!-- /.header -->

