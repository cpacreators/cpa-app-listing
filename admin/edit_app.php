<?php
    session_start();
	if (!isset($_SESSION['user_admin'])) {
		$url = "login.php";
		header('Location: '.$url.'');
		exit;
	} else {
		require_once(realpath(dirname(__FILE__) . '/../includes/sqldb.inc.php'));
		require_once(realpath(dirname(__FILE__) . '/../admin-configuration.php'));
		if ($password_admin == "123456") {
			$url = "c-psw.php";
			header('Location: '.$url.'');
		}
	}
	if (isset($_POST['id']) && !empty($_POST['id'])){
		$a_id = htmlspecialchars($_POST["id"]);
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
		<title>Admin Dashboard - AppRocket</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="description" content="Admin Dashboard - AppRocket" />    
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" type="image/ico" href="assets/img/favicon.ico" />
		<!-- Open Graph Meta Tags-->
		<meta property="og:title" content="Admin Dashboard - AppRocket" />
		<meta property="og:description" content="Admin Dashboard - AppRocket" />
		<meta property="og:type" content="website" />
		<!-- Icons -->
		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Two+Tone|" rel="stylesheet">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
		<!-- CSS -->
		<link href="assets/css/animate.css" rel="stylesheet" />
		<link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/style.css" rel="stylesheet" />
	</head>
	<body>
		<section class="mr-admin-wrapper">
			<span class="toggle-button">
				 <div class="menu-bar menu-bar-top"></div>
				 <div class="menu-bar menu-bar-middle"></div>
				 <div class="menu-bar menu-bar-bottom"></div>
			</span>
			<div class="mr-side-nav-wrapper">
				<div class="mr-side-nav">
					<div class="mr-side-nav-ha">
						<div class="mr-side-nav-header">
							<div class="lp-logo-wrapper">
								<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="26.672px" height="32px" viewBox="0 0 26.672 32" enable-background="new 0 0 26.672 32" xml:space="preserve">
									<path d="M21.077,17.009c0.134-0.787,0.212-1.565,0.212-2.32C21.289,7.699,17.616,0,13.943,0C9.681,0,5.298,8.293,5.298,14.926
									c0,1.12,0.051,2.192,0.139,3.219c-8.936,3.914-4.255,13.256-3.87,13.424c0.474,0.207,3.302,0.119,3.494-0.235
									c0.142-0.263-2.161-4.674,1.378-7.281c1.19,4.576,2.939,7.312,3.36,7.577c0.651,0.415,3.376,0.415,4.146-0.177
									c0.443-0.343,2.814-3.5,4.746-7.476c1.908,2.563-0.174,7.01,0.108,7.354c0.415,0.504,3.007,0.829,3.731,0.588
									C23.159,31.711,32.385,19.749,21.077,17.009z M14.156,26.818c-0.436,1.33-1.725,2.103-2.879,1.724
									c-1.154-0.378-1.738-1.763-1.303-3.092c0.435-1.33,1.725-2.103,2.879-1.724C14.008,24.105,14.592,25.489,14.156,26.818z
									 M15.461,18.913c-0.638,1.944-2.407,3.112-3.952,2.606c-1.547-0.509-2.284-2.494-1.646-4.439c0.638-1.946,2.407-3.113,3.953-2.606
									C15.359,14.979,16.098,16.967,15.461,18.913z M15.712,9.821c-0.535,1.633-2.055,2.602-3.394,2.163
									c-1.34-0.438-1.992-2.118-1.458-3.752c0.535-1.634,2.055-2.603,3.395-2.164C15.596,6.507,16.247,8.187,15.712,9.821z"/>
								</svg>
							</div>
							<div class="mr-side-nav-header-content">
								<h1>AppRocket</h1>
								<h2>The ultimate app-listing CPA marketing landing page.</h2>
							</div>
						</div>
						<div class="mr-side-nav-group">
							<div class="mr-side-nav-section-title-wrapper">
								<div class="mr-side-nav-section-title">Dashboards</div>
								<div class="mr-side-nav-section-subtitle">Select a category below to configure.</div>
							</div>
							<ul>
								<li class="nav-item">
									<a class="nav-link" href="index.php"><i class="material-icons-two-tone">home</i>Home</a>
								</li>
								<li class="nav-item <?php echo 'active'; ?>">
									<a class="nav-link" href="index.php?manage-apps"><i class="material-icons-two-tone">view_list</i>Manage Apps</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="index.php?proccessing-strings"><i class="material-icons-two-tone">textsms</i>Text Strings</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="index.php?header-settings"><i class="material-icons-two-tone">view_day</i>Header & Footer Settings</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="index.php?general-settings"><i class="material-icons-two-tone">settings</i>General Settings</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="index.php?design-colors"><i class="material-icons-two-tone">color_lens</i>Colors</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="index.php?edit-admin"><i class="material-icons-two-tone">edit</i>Edit Admin</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="index.php?system-check"><i class="material-icons-two-tone">build_circle</i>System Check</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="db_action/logout.php"><i class="material-icons-two-tone">exit_to_app</i>Logout</a>
								</li>
							</ul>
						</div>
						<div class="mr-side-nav-group">
							<div class="mr-side-nav-section-title-wrapper">
								<div class="mr-side-nav-section-title">Support</div>
								<div class="mr-side-nav-section-subtitle">Get in touch with us to receive support.</div>
							</div>
							<ul>
								<li class="nav-item">
									<div class="nav-link"><i class="fab fa-skype"></i><div><span>Skype Username:</span> counter.mind</div></div>
								</li>
								<li class="nav-item">
									<div class="nav-link"><i class="material-icons-two-tone">alternate_email</i><div><span>Email:</span> info@marketing-rhino.com</div></div>
								</li>
							</ul>						
						</div>
					</div>
					<div class="ac-wrapper">
						<div class="ac-inner-wrapper">
							<a href="https://www.marketing-rhino.com/" target="_blank">
								<img src="assets/img/mr-logo.png" class="ac-logo img-fluid" />
								www.marketing-rhino.com
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="mr-admin-content-wrapper">				
				<div class="dashboard-wrapper">
					<?php
						$query=$file_db->prepare("SELECT * FROM apps WHERE id = :id");
						$query->bindParam(':id', $a_id);
						$query->execute();
						$data=$query->fetch();
					?>
					<div class="dashboard-header-wrapper animated fadeInDown">
						<span class="dashboard-header-subtitle">Admin Dashboard</span>
						<h1 class="dashboard-header-title">Editing App: <img class="img-fluid edit-app-icon" src="../<?php echo htmlspecialchars($data['app_img_src']); ?>" alt="<?php echo $data['app_name']; ?>"><?php if (htmlspecialchars(isset($data['app_name']))) { echo $data['app_name']; } ?></h1>
						<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 'appd') {?>
							<div class="dashboard-save-notification">App Deleted</div>
						<?php } ?>
						<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 'appe') {?>
							<div class="dashboard-save-notification">App Edited</div>
						<?php } ?>
						<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 'appa') {?>
							<div class="dashboard-save-notification">New App Added</div>
						<?php } ?>						
					</div>
					<div class="dashboard-content-wrapper">
						<div class="dashboard-content-container cwide">								
							<div class="dashboard-content-panel-wrapper">
								<div class="dashboard-content-panel-header">
									<h2>Edit App</h2>
									<p>You can add a new app to your app list by using the form below. You need to include the app image, app name and app description.</p>
								</div>								
								<form action="db_action/e_a.php" method="POST" enctype="multipart/form-data">
									<div class="dashboard-content-panel-content">
										<div class="row">
											<div class="col-lg-7 mmfwot">
												<div class="form-group">
													<label for="app_img_src" class="mr-dashboard-label">App Image*</label>
													<input type="file" name="app_img_src" class="mr-input-style mr-file-input-style" />
													<div class="input-instructions"><i class="material-icons-two-tone">info</i>Recommended Size: 100x100px </br>Accepted Extensions: .png, .jpg, .jpeg</div>
												</div>
											</div>
											<div class="col-lg-3 mmfwot">
												<div class="form-group">
													<label class="mr-dashboard-label text-center">Featured App</label>
													<div class="mr-switch-style">
														<input type="checkbox" name="app_featured" class="mr-switch-style-checkbox" id="app_featured" tabindex="0" value="1" <?php if (htmlspecialchars(isset($data['app_featured'])) && $data['app_featured'] == '1') { echo 'checked'; } ?>>
														<label class="mr-switch-style-label" for="app_featured">
															<span class="mr-switch-style-inner"></span>
															<span class="mr-switch-style-switch"></span>
														</label>
													</div>
													<div class="input-instructions"><i class="material-icons-two-tone">info</i>Show this app in featured section?</div>
												</div>
											</div>
											<div class="col-lg-2 mmfwot">
												<div class="form-group">
													<label for="app_downloads" class="mr-dashboard-label">Downloads</label>
													<input type="text" name="app_downloads" class="mr-input-style" placeholder="100K+" value="<?php if (htmlspecialchars(isset($data['app_downloads']))) { echo htmlspecialchars($data['app_downloads']); } ?>" />
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-5 mmfwot">
												<div class="form-group">
													<label for="app_name" class="mr-dashboard-label">App Name*</label>
													<input type="text" name="app_name" class="mr-input-style" placeholder="App Name..." required value="<?php if (htmlspecialchars(isset($data['app_name']))) { echo $data['app_name']; } ?>" />
													<div class="input-instructions"><i class="material-icons-two-tone">info</i>App name which will be displayed in main app listing grid.</div>
												</div>
											</div>
											<div class="col-lg-2 mmfwot">
												<div class="form-group">
													<label for="app_short_name" class="mr-dashboard-label">Short App Name*</label>
													<input type="text" name="app_short_name" class="mr-input-style" placeholder="Short Name..." required value="<?php if (htmlspecialchars(isset($data['app_short_name']))) { echo $data['app_short_name']; } ?>" />
													<div class="input-instructions"><i class="material-icons-two-tone">info</i>App name used in proccessing.</div>
												</div>
											</div>
											<div class="col-lg-3 mmfwot">
												<div class="form-group">
													<label for="app_author" class="mr-dashboard-label">App Author</label>
													<input type="text" name="app_author" class="mr-input-style" placeholder="App Author..." value="<?php if (htmlspecialchars(isset($data['app_author']))) { echo htmlspecialchars($data['app_author']); } ?>" />
												</div>	
											</div>
											<div class="col-lg-2 mmfwot">
												<div class="form-group">
													<label for="app_rating" class="mr-dashboard-label">App Rating</label>
													<input type="text" name="app_rating" class="mr-input-style" placeholder="4.8" value="<?php if (htmlspecialchars(isset($data['app_rating']))) { echo htmlspecialchars($data['app_rating']); } ?>" />
												</div>	
											</div>	
										</div>											
										<div class="form-group">
											<label for="app_description" class="mr-dashboard-label">App Description*</label>
											<textarea name="app_description" class="mr-textarea-style" placeholder="App Description..." required><?php if (htmlspecialchars(isset($data['app_description']))) { echo $data['app_description']; } ?></textarea>
										</div>
										<div class="row">
											<div class="col-lg-4 col-4">
												<div class="form-group">
													<div class="radio-flex">
														<input type="radio" id="androidios" name="app_os" value="androidios" <?php if (htmlspecialchars(isset($data['app_os'])) && $data['app_os'] == 'androidios') { echo 'checked'; } ?>>
														<label for="androidios"><i class="fab fa-android"></i> <i class="fab fa-apple"></i></label>
													</div>	
												</div>	
											</div>
											<div class="col-lg-4 col-4">
												<div class="form-group">
													<div class="radio-flex">
														<input type="radio" id="android" name="app_os" value="android" <?php if (htmlspecialchars(isset($data['app_os'])) && $data['app_os'] == 'android') { echo 'checked'; } ?>>
														<label for="android"><i class="fab fa-android"></i></label>
													</div>	
												</div>	
											</div>
											<div class="col-lg-4 col-4">
												<div class="form-group">
													<div class="radio-flex">
														<input type="radio" id="ios" name="app_os" value="ios" <?php if (htmlspecialchars(isset($data['app_os'])) && $data['app_os'] == 'ios') { echo 'checked'; } ?>>
														<label for="ios"><i class="fab fa-apple"></i></label>
													</div>	
												</div>	
											</div>	
										</div>
										<div class="form-group">
											<label for="app_locker_url" class="mr-dashboard-label">Redirect URL*</label>
											<input type="text" name="app_locker_url" class="mr-input-style" placeholder="Redirect URL..." value="<?php if (htmlspecialchars(isset($data['app_locker_url']))) { echo $data['app_locker_url']; } ?>" required />
											<div class="input-instructions"><i class="material-icons-two-tone">info</i>Link to which your visitor is redirected after console proccessing is finished. Imporant: Do not enter your content locker script here! You can enter a direct locker URL.</div>
										</div>	
									</div>										
									<div class="dashboard-content-panel-footer">
										<div class="form-group submit-form-group">
											<input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
											<input type="submit" class="mr-btn-submit float-right" value="Save">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>														
						</div>						
					</div>						
				</div>
			</div>
		</section>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>	
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script type="text/javascript" src="assets/js/main.js"></script>
		<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 'lei') {?>
			<script>
				$(document).ready(function() {
					Swal.fire({
					  title: 'Error!',
					  text: 'The license key is invalid.',
					  icon: 'error',
					  confirmButtonText: 'Ok'
					})
				});
			</script>	
		<?php } ?>	
		<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 'led') {?>
			<script>
				$(document).ready(function() {
					Swal.fire({
					  title: 'Error!',
					  html: 'Your license key is active, but there are no domains connected to it. <div class="salsn">You need to connect your domain name with your license key inside <a href="https://www.marketing-rhino.com/customer-profile/" target="_blank">customer profile</a> on our website.</div>',
					  icon: 'error',
					  confirmButtonText: 'Ok'
					})
				});
			</script>	
		<?php } ?>	
		<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 'leu') {?>
			<script>
				$(document).ready(function() {
					Swal.fire({
					  title: 'Error!',
					  text: 'This domain is not connected to the license key which is in use.',
					  icon: 'error',
					  confirmButtonText: 'Ok'
					})
				});
			</script>	
		<?php } ?>	
		<?php
		if (htmlspecialchars(isset($_GET['manage-apps']))) {
		?>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="assets/js/sort.js"></script>
		<?php					
		}
		?>
		<?php
		if (htmlspecialchars(isset($_GET['edit-admin'])))
		{
		?>
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
		<?php					
		}
		?>
		<?php
		if (htmlspecialchars(isset($_GET['general-settings'])))
		{
		?>
		<script>
			$(document).ready(function() {	
				if ($("#desktop").is(":checked")) {
					$(".m-o-c-w").hide();
				}
				$("input[name='device_access']").click(function() {
					if ($("#mobile").is(":checked")) {
						$(".m-o-c-w").fadeIn();
					} else {
						$(".m-o-c-w").fadeOut();
					}
				});
			});
		</script>
		<?php					
		}
		?>
	</body>
</html>