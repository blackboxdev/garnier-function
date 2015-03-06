<?php
@session_start();


if(isset($_POST['email_login_header'])){
    include('core/core.php');
    $email = $_POST['email_login_header'];
    $pass = md5($_POST['password']);

    $user = User::where('email','=',$email)
        ->where('password','=',$pass)->count();

    if($user >0){
        $user = User::where('email','=',$email)
            ->where('password','=',$pass)->first();
        if($user->active == 0){
            echo '<script>alert("Your account not activated, please check email and active it using given link.")</script>';
        }else{

            $_SESSION['email'] = $email;
            $_SESSION['id_user'] = $user->id;
            $_SESSION['lastname'] = $user->lastname;
            header('location: index-member.php');
            echo '<script>window.location.href = "index-member.php";</script>';
        }

    }else{
        echo '<script>alert("Login/Password are not corresponding")</script>';
    }
}



?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="icon" href="../../favicon.ico">

	
		<title>Garnier Malaysia - </title>

    	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<link href="css/yamm.css" rel="stylesheet">  
		<link type="text/css" rel="stylesheet" href="css/style.css" />

		<script type="text/javascript" src="js/app.js"></script>
	</head>
	
<!-- body -->	
	<body>
<!-- bg-atas -->
		<div class="bg-atas">
<!-- body-bg  -->
			<div class="body-bg">
<!-- container body  -->
				<div class="container">
<!-- header top -->
					<div class="header">
						<div class="container">

						<div class="row">
<!-- logo -->
							<div class="col-md-3 col-xs-3">
								<div class="logo">
									<a href="index.php"><img src="images/logo-garnier.png" width="195px"></a>
								</div>
							</div>
<!-- End of logo -->

							
<!-- Sign in / Create account  -->
							<div class="col-md-3 col-xs-3">
								<div class="bar-signin">
									<a data-toggle="modal" data-target="#SignIn">Sign in</a> / <a href="register.php">Create an account
									</a>
								</div>
							</div>

<!-- POPUP -->
							<div class="modal fade" id="SignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
									    <div class="modal-content">
										      <div class="modal-header">
										        <h1 class="popup-signin">Sign in</h1>
										      </div>
											      <div class="modal-body">
                                                    <form action="" method="POST">
											        <div class="col-md-6">
											        	<h4>I HAVE A GARNIER ACCOUNT</h4>


											        	<div class="form-group">
											        		<input type="email" class="form-control" name="email_login_header" placeholder="Your email">
											        	</div>
											        	<div class="form-group">
											        		<input type="password" class="form-control" name="password" placeholder="*******">
											        	</div>
											        	<div class="row">
											        		<div class="col-xs-6">
											        			<a href="forgot-password.php">Forgot password?</a>
											        		</div>
											        		<button type="submit" class="btn btn-primary btn-lg btn-confirm"> &#9656;  Login
															</button>
											        		<div class="col-xs-6">
											        			
											        		</div>
											        	</div>

                                                        </form>

											        </div>



											        <div class="col-md-6"><h4>I DON'T HAVE A GARNIER ACCOUNT</h4>
											        	Create an account and get access to exclusive and personalized privileges: E-coupons, new product pre-tests and services...
											        	<br><br><br>
											        	<a type="button" class="btn btn-primary btn-lg btn-confirm" href="index.php"> &#9656;  Register Now
														</a>
											        </div>
										      </div>
									      <div class="modal-footer">
									      </div>
									    </div>
								  </div>
							</div>



<!-- End of Sign in / Create account -->

<!-- Header Right -->
							<div class="col-md-6 col-xs-6 header-right">
<!-- FAQ -->
								<div class="row">
									<div class="col-md-12 faq">
<!-- Bahasa / About 
											<span class="multilanguage-btn">
												<a href="#"  target="_blank" >English</a> / <a href="#"  target="_blank" >Bahasa</a>
											</span>
-->											

											<span class="faq-btn">
											
											<a href="#"  target="_blank" >FAQ</a> / <a href="#"  target="_blank" >About Garnier</a>
											</span>
									
									</div>
								</div>
<!-- Bahasa / About -->

<!-- Search -->
								<div class="row">
									<div class="col-md-12 search">
                                        <form class="form-inline" action="search.php" method="GET">
											<label for="search">Search</label>
											<input type="text" class="form-control input-xs" name="search" id="search" placeholder="Look for a product">
											<button type="submit" class="btn btn-inverse btn-hijau btn-xs"><i class="fa fa-search"></i></button>
										</form>
									</div>
								</div>
<!-- End of Search -->
							</div>
<!-- End of Header Right -->
						</div>

					</div>
				</div>
<!-- End of header top -->
			





<!-- Header Bottom -->
			<div class="row">
<!-- Main Menu -->
				<div class="col-md-8 bg-bawah ">
					<nav class="navbar yamm navbar-default " role="navigation">
				     <ul class="nav navbar-nav">
				     	
				     	<li ><a href="index.php"><i class="fa fa-home fa-2 home"></i></a></li>

<!-- Garnier Skin Natural -->
				       <li class="dropdown">
				         <a href="#" class="dropdown-toggle navb" data-toggle="dropdown">Garnier Skin Natural</a>
					         <ul class="dropdown-menu">
					           <li>
					               <div class="yamm-content">
					                  <ul class="col-sm-4 list-unstyled dash-right">
						                  <li class="drop-header"><span class="dd"><span>Brands</span></span><br><br></li>
						                  <li class="warna"><a href="light-complete.php">Light Complete</a></li>
						                  <li class="warna"><a href="sakura-white.php">Sakura White</a></li>
						                  <li class="warna"><a href="pure-active.php">Pure Active</a></li>
						                  <li class="warna"><a href="aqua-defense.php">Aqua Defense</a></li>
						                  <li class="warna"><a href="duo-clean.php">Duo Clean</a></li>
									  </ul>
									  <ul class="col-sm-4 list-unstyled dash-right"> 
										<li class="drop-header">
										<span class="dd"><span>By Skin Needs</span></span><br><br></li>
						                <li class="warna"><a href="">Whitening</a></li>
						                <li class="warna"><a href="">Acne</a></li>
						                <li class="warna"><a href="">Hydrating</a></li>
									  </ul>
									  <ul class="col-sm-4 list-unstyled"> 
					                 		<li class="drop-header"><span class="dd"><span>By Skin Type</span></span><br><br></li>
						                	<li class="warna"><a href="">Normal</a></li>
						                 	<li class="warna"><a href="">Dry</a></li>
						                 	<li class="warna"><a href="">Sensitive</a></li>
						                 	<li class="warna"><a href="">Combination</a></li>
						                 	<li class="warna"><a href="">Oily</a></li>
									  </ul>
								   </div>
					           </li>
					         </ul>
				       </li>
<!-- Garnier Men -->
				       <li class="dropdown">
				         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Garnier Men</a>
					         <ul class="dropdown-menu">
					           <li>
					               <div class="yamm-content">
					                  <ul class="col-sm-4 list-unstyled dash-right">
						                  <li class="drop-header"><span class="dd"><span>Brands</span></span><br><br></li>
						                  <li class="warna"><a href="turbo-light.php">Turbo Light</a></li>
						                  <li class="warna"><a href="oil-control-men.php">Turbo Light Oil Control</a></li>
						                  <li class="warna"><a href="">Icy Duo</a></li>
						                  <li class="warna"><a href="acno-fight.php">Acno Fight</a></li>
						                  
									  </ul>
									  <ul class="col-sm-4 list-unstyled dash-right"> 
										<li class="drop-header"><span class="dd"><span>By Skin Needs</span></span><br><br></li>
						                <li class="warna"><a href="">Whitening</a></li>
						                <li class="warna"><a href="">Acne</a></li>
						                <li class="warna"><a href="">Hydrating</a></li>
									  </ul>
									  <ul class="col-sm-4 list-unstyled"> 
					                 		<li class="drop-header"><span class="dd"><span>By Skin Type</span></span><br><br></li>
						                	<li class="warna"><a href="">Normal</a></li>
						                 	<li class="warna"><a href="">Dry</a></li>
						                 	<li class="warna"><a href="">Sensitive</a></li>
						                 	<li class="warna"><a href="">Combination</a></li>
									  </ul>
								   </div>
					           </li>
					         </ul>
				       </li>
<!-- Hair Colour -->
				       <li class="dropdown">
				         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hair Colour</a>
					         <ul class="dropdown-menu">
					           <li>
					               <div class="yamm-content">
					                  <ul class="col-sm-4 list-unstyled dash-right dash-right">
						                  <li class="drop-header"><span class="dd"><span>Brands</span></span><br><br></li>
						                  <li class="warna"><a href="">Color Naturals</a></li>
						                  <li class="warna"><a href="">Olia</a></li>
									  </ul>
									  <ul class="col-sm-4 list-unstyled dash-right"> 
										<li class="drop-header"><span class="dd"><span>By Skin Type</span></span><br><br></li>
						                <li class="warna"><a href="">Permanent</a></li>
						                <li class="warna"><a href="">Ammonia Free</a></li>
									  </ul>
									  <ul class="col-sm-4 list-unstyled"> 
					                 		<li class="drop-header">
					                 		<span class="dd"><span>By Colour</span></span><br><br></li>
						                	<li class="warna"><a href="">Black</a></li>
						                 	<li class="warna"><a href="">Brown</a></li>
						                 	<li class="warna"><a href="">Blonde</a></li>
						                 	<li class="warna"><a href="">Red</a></li>
						                 	<li class="warna"><a href="">Violet</a></li>
						                 	<li class="warna"><a href="">Copper</a></li>
									  </ul>
								   </div>
					           </li>
					         </ul>
				       </li>
				     </ul>
				</nav>

				</div>
<!-- End of Main Menu -->

<!-- Sign Up Newsletter -->
					<div class="col-md-4 newsletter">Sign up to receive updates from Garnier<br>
						<form class="form-inline">  
							<input type="text" class="form-control input-xs" id="search" placeholder="Your email address">
							<button type="submit" class="btn btn-inverse btn-grey btn-xs"> > SIGN UP NOW
							</button>
						</form>
					</div>
<!-- End of Sign Up Newsletter -->
			</div>
		</div>
<!-- End of container body -->
	</div>

<!-- END OF HEADER################ -->