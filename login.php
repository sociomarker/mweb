<?php
	$thisPage = 'home';
    include_once "newapp/web/logincheck2.php";
	include "header.php";
	include "menu.php";
?>
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="content">



                    <div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="page-title">
            <h1>Login</h1>
        </div><!-- /.page-title -->
		<div class="json">
			<?php
				if(isset($_REQUEST['response'])){
					if($_REQUEST['response'] == "Login Successful"){
						header("location: index.php?welcome=1");
					} else {
						echo addslashes(@$_REQUEST['response']);
					}
				}
			?>
		</div>
        <form method="post" action="newapp/web/userLogin.php">
            <div class="form-group">
                <label for="login-form-email">E-mail</label>
                <input type="email" class="form-control" name="email" id="login-form-email">
            </div><!-- /.form-group -->

            <div class="form-group">
                <label for="login-form-password">Password</label>
                <input type="password" class="form-control" name="password" id="login-form-password">
            </div><!-- /.form-group -->

            <button type="submit" class="btn btn-primary pull-right">Login</button>
        </form>
		<a href="register.php">Not a Member? Register Now!</a>
		<br />
		<!--<a href="register.php">Register as Supplier!</a>-->
    </div><!-- /.col-sm-4 -->
</div><!-- /.row -->

               

<?php
include "footer.php";
include "js.php";
?>
