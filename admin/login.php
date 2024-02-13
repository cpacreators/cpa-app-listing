<?php
	session_start();
	if (isset($_SESSION['user_admin'])) {
		$url = "index.php";
		header('Location: '.$url.'');
		exit;
	}
	require_once(realpath(dirname(__FILE__) . '/../admin-configuration.php'));
?>
<!-- 

Website Designed by CounterMind on Marketing-Rhino.com
https://www.marketing-rhino.com/
It is forbidden to re-sell this landing page without Author Permission.

 -->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>Login - Admin Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="description" content="Login - Admin Dashboard" />    
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
		<!-- Open Graph Meta Tags-->
		<meta property="og:title" content="Login - Admin Dashboard" />
		<meta property="og:description" content="Login - Admin Dashboard" />
		<meta property="og:type" content="website" />
		<!-- Icons -->
		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Two+Tone|" rel="stylesheet">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
		<!-- CSS -->
		<link href="assets/css/animate.css" rel="stylesheet" />
		<link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/style.css" rel="stylesheet" />
	</head>
	<body>
		<section class="admin-login-section">
			<div class="admin-login-wrapper">
				<div class="container">
					<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 's') {?>
						<div class="dashboard-save-notification">Admin Details Updated</div>
					<?php } ?>
					<div class="dashboard-content-panel-wrapper animated bounceIn">
						<div class="dashboard-content-panel-header text-center">
							<h2>Admin Login</h2>
							<p>Login to access admin dashboard.</p>
						</div>
						<form id="a-l-form" action="db_action/auth.php" method="POST">
							<div class="dashboard-content-panel-content">
								<div class="mr-field-wrapper">
									<label for="username" class="mr-dashboard-label">Username</label>
									<div class="mr-input-wrapper">
										<span class="material-icons-two-tone">account_circle</span>
										<input type="text" name="username" id="username" class="mr-input-style mr-input-style-icon" placeholder="Username..." required>
									</div>
									<?php
									if ($password_admin == "123456") {
										echo '<div class="default-login-info-field">Default Username: <span>admin</span></div>';
									}
									?>
								</div>
								<div class="mr-field-wrapper">
									<label for="password" class="mr-dashboard-label">Password</label>
									<div class="mr-input-wrapper">
										<span class="material-icons-two-tone">vpn_key</span>
										<input type="password" name="password" id="password" class="mr-input-style mr-input-style-icon" placeholder="Password..." required>
									</div>
									<?php
									if ($password_admin == "123456") {
										echo '<div class="default-login-info-field">Default Password: <span>123456</span></div>
										<div class="input-instructions dl-input-instructions"><i class="material-icons-two-tone">info</i>You will need to change the default admin login details on the next step.</div>';
									}
									?>
								</div>
							</div>
							<div class="dashboard-content-panel-footer">								
								<div class="form-group submit-form-group">
									<input type="submit" class="mr-btn-submit margin-auto" value="Login">
									<div class="clearfix"></div>
								</div>
								<?php
									if (isset($_GET['status']) && !empty($_GET['status'])){
										echo '<div class="login-error-wrapper animated bounceIn">Wrong login credentials.</div>';
									}
								?>	
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
	<!-- JS -->	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>	
	<script type="text/javascript" src="assets/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
	<script>
		$(document).ready(function() {
			var validator = $("#a-l-form").validate({
				errorPlacement: function(error, element) {
					// Append error within linked label
					$( element )
						.closest( "form" )
							.find( "label[for='" + element.attr( "id" ) + "']" )
								.append( error );
				},
				errorElement: "span",
				errorClass: "login-input-error",
				messages: {
					username: {
						required: " (required)"
					},
					password: {
						required: " (required)"
					}
				}
			});
			function aO(el, anim, onDone) {
				var $el = $(el);
				$el.addClass( 'animated ' + anim );
				$el.one( 'animationend', function() {
					$(this).removeClass( 'animated ' + anim );
					onDone && onDone();
				});
			}
			if($('.dashboard-save-notification').length){
				var query = window.location.search.substring(1)
				if(query.length) {
				   if(window.history != undefined && window.history.pushState != undefined) {
						window.history.pushState({}, document.title, window.location.pathname);
				   }
				}
				aO( $('.dashboard-save-notification'), 'bounceIn' );
				setTimeout(function() {	
					$('.dashboard-save-notification').fadeOut();
				}, 1500 );
			}
		});
	</script>
</html>