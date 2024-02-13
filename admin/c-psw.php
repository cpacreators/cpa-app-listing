<?php
	session_start();
	if (!isset($_SESSION['user_admin'])) {
		$url = "login.php";
		header('Location: '.$url.'');
		exit;
	} else {
		require_once(realpath(dirname(__FILE__) . '/../includes/sqldb.inc.php'));
		require_once(realpath(dirname(__FILE__) . '/../admin-configuration.php'));

	}
?>
<!-- 

Website Designed by CounterMind on Marketing-Rhino.com
https://www.marketing-rhino.com/
It is forbidden to re-sell this landing page without Author Permission.

 -->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>Change Username & Password - Admin Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="description" content="Change Username & Password - Admin Dashboard" />    
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" type="image/ico" href="assets/img/favicon.ico" />
		<!-- Open Graph Meta Tags-->
		<meta property="og:title" content="Change Username & Password - Admin Dashboard" />
		<meta property="og:description" content="Change Username & Password - Admin Dashboard" />
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
					<div class="default-psw-change-notice animated bounceIn">
						<span>Imporant:</span> You need to change the default admin username and password before you can continue.
					</div>	
					<div class="dashboard-content-panel-wrapper animated bounceIn animation-delay-200">
						<div class="dashboard-content-panel-header text-center">
							<h2>Change Admin Login Details</h2>
							<p>Before you can continue, you need to change the default admin username and password by using the form below.</p>
						</div>
						<form id="n-p-form" action="db_action/uld.php" method="POST">
							<div class="dashboard-content-panel-content">
								<div class="mr-field-wrapper">
									<label for="new_username" class="mr-dashboard-label">New admin username</label>
									<div class="mr-input-wrapper">
										<span class="material-icons-two-tone">account_circle</span>
										<input type="text" name="new_username" id="new_username" class="mr-input-style mr-input-style-icon" placeholder="New username..." required>
									</div>
								</div>
								<div class="mr-field-wrapper">
									<label for="new_password" class="mr-dashboard-label">New Admin Password</label>
									<div class="mr-input-wrapper">
										<span class="material-icons-two-tone">vpn_key</span>
										<input type="password" name="new_password" id="new_password" class="mr-input-style mr-input-style-icon" placeholder="New password..." required>
									</div>	
								</div>
								<div class="mr-field-wrapper">
									<label for="new_password" class="mr-dashboard-label">Repeat new admin password</label>
									<div class="mr-input-wrapper">
										<span class="material-icons-two-tone">vpn_key</span>
										<input type="password" name="new_password_confirm" id="new_password_confirm" class="mr-input-style mr-input-style-icon" placeholder="Repeat new password..." required>
									</div>	
								</div>
							</div>
							<div class="dashboard-content-panel-footer">
								<div class="form-group submit-form-group">
									<input type="submit" class="mr-btn-submit margin-auto" value="Confirm New Login Details">
									<div class="clearfix"></div>
								</div>
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
			var validator = $("#n-p-form").validate({
				errorPlacement: function(error, element) {
					// Append error within linked label
					$( element )
						.closest( "form" )
							.find( "label[for='" + element.attr( "id" ) + "']" )
								.append( error );
				},
				errorElement: "div",
				errorClass: "login-input-error inline-input-error-right",
				rules: {
					new_username: {
						required: true,
						minlength: 4
					},
					new_password: {
						required: true,
						minlength: 6
					},
					new_password_confirm: {
						equalTo : "#new_password",
						minlength: 6
					}
				}
			});
		});
	</script>
</html>