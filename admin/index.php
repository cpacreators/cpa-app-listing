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
?>
<!-- 

Website Designed by CounterMind on Marketing-Rhino.com
https://www.marketing-rhino.com/
It is forbidden to re-sell this landing page without Author Permission.

 -->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>Admin Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="description" content="Admin Dashboard" />    
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" type="image/ico" href="assets/img/favicon.ico" />
		<!-- Open Graph Meta Tags-->
		<meta property="og:title" content="Admin Dashboard" />
		<meta property="og:description" content="Admin Dashboard" />
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
							<a href="/"><div class="lp-logo-wrapper">
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
							</div></a>
						</div>
						<div class="mr-side-nav-group">
							<ul>
								<li class="nav-item <?php if (htmlspecialchars(!isset($_GET['manage-apps'])) && htmlspecialchars(!isset($_GET['proccessing-strings'])) && htmlspecialchars(!isset($_GET['header-settings'])) && htmlspecialchars(!isset($_GET['general-settings'])) && htmlspecialchars(!isset($_GET['design-colors'])) && htmlspecialchars(!isset($_GET['edit-admin'])) && htmlspecialchars(!isset($_GET['system-check'])) ) { echo 'active'; } ?>">
									<a class="nav-link" href="index.php"><i class="material-icons-two-tone">home</i>Home</a>
								</li>
								<li class="nav-item <?php if (htmlspecialchars(isset($_GET['manage-apps']))) { echo 'active'; } ?>">
									<a class="nav-link" href="index.php?manage-apps"><i class="material-icons-two-tone">view_list</i>Manage Apps</a>
								</li>
								<li class="nav-item <?php if (htmlspecialchars(isset($_GET['proccessing-strings']))) { echo 'active'; } ?>">
									<a class="nav-link" href="index.php?proccessing-strings"><i class="material-icons-two-tone">textsms</i>Text Strings</a>
								</li>
								<li class="nav-item <?php if (htmlspecialchars(isset($_GET['header-settings']))) { echo 'active'; } ?>">
									<a class="nav-link" href="index.php?header-settings"><i class="material-icons-two-tone">view_day</i>Header & Footer Settings</a>
								</li>
								<li class="nav-item <?php if (htmlspecialchars(isset($_GET['general-settings']))) { echo 'active'; } ?>">
									<a class="nav-link" href="index.php?general-settings"><i class="material-icons-two-tone">settings</i>General Settings</a>
								</li>
								<li class="nav-item <?php if (htmlspecialchars(isset($_GET['design-colors']))) { echo 'active'; } ?>">
									<a class="nav-link" href="index.php?design-colors"><i class="material-icons-two-tone">color_lens</i>Colors</a>
								</li>
								<li class="nav-item <?php if (htmlspecialchars(isset($_GET['edit-admin']))) { echo 'active'; } ?>">
									<a class="nav-link" href="index.php?edit-admin"><i class="material-icons-two-tone">edit</i>Edit Admin</a>
								</li>
								<li class="nav-item <?php if (htmlspecialchars(isset($_GET['system-check']))) { echo 'active'; } ?>">
									<a class="nav-link" href="index.php?system-check"><i class="material-icons-two-tone">build_circle</i>System Check</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="db_action/logout.php"><i class="material-icons-two-tone">exit_to_app</i>Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="mr-admin-content-wrapper">	  
				<?php				
				if (htmlspecialchars(!isset($_GET['manage-apps'])) && htmlspecialchars(!isset($_GET['proccessing-strings'])) && htmlspecialchars(!isset($_GET['header-settings'])) && htmlspecialchars(!isset($_GET['general-settings'])) && htmlspecialchars(!isset($_GET['design-colors'])) && htmlspecialchars(!isset($_GET['edit-admin'])) && htmlspecialchars(!isset($_GET['system-check'])))
				{
				require_once(realpath(dirname(__FILE__) . '/db_action/m_s_k.php'));
				?>
				<div class="dashboard-wrapper">
					<div class="dashboard-header-wrapper animated fadeInDown">
						<span class="dashboard-header-subtitle">Admin Dashboard</span>
						<h1 class="dashboard-header-title">Home</h1>
						<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 's') {?>
							<div class="dashboard-save-notification">Settings Saved</div>
						<?php } ?>						
					</div>
					<div class="dashboard-content-wrapper">
						<div class="dashboard-content-container">								
							<div class="dashboard-content-panel-wrapper">
								<div class="dashboard-content-panel-header">
									<h2>License Key</h2>
									<p>In order to gain full access to all functionalities, please enter your license key below. The license key was sent to your e-mail address which was entered during the checkout.</p>
									<div class="input-instructions input-instructions-m-t">
										<i class="material-icons-two-tone">info</i>
										<div>
											You need to connect your domain name with your license key inside <a href="https://www.marketing-rhino.com/customer-profile/" target="_blank">customer profile</a> on our website, as the landing page will function properly only on connected domains.
										</div>
									</div>
								</div>
								<form action="db_action/s_l_k.php" method="POST">
									<div class="dashboard-content-panel-content">
										<div class="mr-field-wrapper">
											<label for="l_key" class="mr-dashboard-label">License Key</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">vpn_key</span>
												<input type="text" name="l_key" id="l_key" class="mr-input-style mr-input-style-icon" placeholder="License Key..." value="<?php echo $lI; ?>" required>
											</div>	
										</div>										
									</div>										
									<div class="dashboard-content-panel-footer">
										<div class="form-group submit-form-group">
											<input type="submit" class="mr-btn-submit float-right" value="Save License Key">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>														
						</div>						
					</div>						
				</div>				
				<?php
				}
				if (htmlspecialchars(isset($_GET['manage-apps'])))
				{
				?>
				<div class="dashboard-wrapper">
					<div class="dashboard-header-wrapper animated fadeInDown">
						<span class="dashboard-header-subtitle">Admin Dashboard</span>
						<h1 class="dashboard-header-title">Manage Apps</h1>
						<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 'appd') {?>
							<div class="dashboard-save-notification">App Deleted</div>
						<?php } ?>
						<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 'appa') {?>
							<div class="dashboard-save-notification">New App Added</div>
						<?php } ?>
						<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 'appu') {?>
							<div class="dashboard-save-notification">App Updated</div>
						<?php } ?>	
					</div>
					<div class="dashboard-content-wrapper">
						<div class="dashboard-content-container cwide">								
							<div class="dashboard-content-panel-wrapper">
								<div class="dashboard-content-panel-header">
									<h2>Add a new app</h2>
									<p>You can add a new app to your app list by using the form below. You need to include the app image, app name and app description.</p>
									<p>Apps are positioned by descending order, which means that the app which you add first, will be showed on very top of the list.</p>
								</div>
								<form action="db_action/insert_new_app.php" method="POST" enctype="multipart/form-data">
									<div class="dashboard-content-panel-content">
										<div class="row">
											<div class="col-lg-7 mmfwot">
												<div class="form-group">
													<label for="app_img_src" class="mr-dashboard-label">App Image*</label>
													<input type="file" name="app_img_src" class="mr-input-style mr-file-input-style" required />
													<div class="input-instructions"><i class="material-icons-two-tone">info</i>Recommended Size: 100x100px </br>Accepted Extensions: .png, .jpg, .jpeg</div>
												</div>
											</div>
											<div class="col-lg-3 mmfwot">
												<div class="form-group">
													<label class="mr-dashboard-label text-center">Featured App</label>
													<div class="mr-switch-style">
														<input type="checkbox" name="app_featured" class="mr-switch-style-checkbox" id="app_featured" tabindex="0" value="1">
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
													<input type="text" name="app_downloads" class="mr-input-style" placeholder="100K+" />
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-5 mmfwot">
												<div class="form-group">
													<label for="app_name" class="mr-dashboard-label">App Name*</label>
													<input type="text" name="app_name" class="mr-input-style" placeholder="App Name..." required />
													<div class="input-instructions"><i class="material-icons-two-tone">info</i>App name which will be displayed in main app listing grid.</div>
												</div>
											</div>
											<div class="col-lg-2 mmfwot">
												<div class="form-group">
													<label for="app_short_name" class="mr-dashboard-label">Short App Name*</label>
													<input type="text" name="app_short_name" class="mr-input-style" placeholder="Short Name..." required />
													<div class="input-instructions"><i class="material-icons-two-tone">info</i>App name used in proccessing.</div>
												</div>
											</div>
											<div class="col-lg-3 mmfwot">
												<div class="form-group">
													<label for="app_author" class="mr-dashboard-label">App Author</label>
													<input type="text" name="app_author" class="mr-input-style" placeholder="App Author..." />
												</div>	
											</div>
											<div class="col-lg-2 mmfwot">
												<div class="form-group">
													<label for="app_rating" class="mr-dashboard-label">App Rating</label>
													<input type="text" name="app_rating" class="mr-input-style" placeholder="4.8" />
												</div>	
											</div>	
										</div>											
										<div class="form-group">
											<label for="app_name" class="mr-dashboard-label">App Description*</label>
											<textarea name="app_description" class="mr-textarea-style" placeholder="App Description..." required></textarea>
										</div>
										<div class="row">
											<div class="col-lg-4 col-4">
												<div class="form-group">
													<div class="radio-flex">
														<input type="radio" id="androidios" name="app_os" value="androidios" checked>
														<label for="androidios"><i class="fab fa-android"></i> <i class="fab fa-apple"></i></label>
													</div>	
												</div>	
											</div>
											<div class="col-lg-4 col-4">
												<div class="form-group">
													<div class="radio-flex">
														<input type="radio" id="android" name="app_os" value="android">
														<label for="android"><i class="fab fa-android"></i></label>
													</div>	
												</div>	
											</div>
											<div class="col-lg-4 col-4">
												<div class="form-group">
													<div class="radio-flex">
														<input type="radio" id="ios" name="app_os" value="ios">
														<label for="ios"><i class="fab fa-apple"></i></label>
													</div>	
												</div>	
											</div>	
										</div>
										<div class="form-group">
											<label for="app_locker_url" class="mr-dashboard-label">Redirect URL*</label>
											<input type="text" name="app_locker_url" class="mr-input-style" placeholder="Redirect URL..." required />
											<div class="input-instructions"><i class="material-icons-two-tone">info</i>Link to which your visitor is redirected after console proccessing is finished. Imporant: Do not enter your content locker script here! You can enter a direct locker URL.</div>
										</div>	
									</div>										
									<div class="dashboard-content-panel-footer">
										<div class="form-group submit-form-group">
											<input type="submit" class="mr-btn-submit float-right" value="Add new app">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>
							<div class="dashboard-content-panel-wrapper dfgw-mt">
								<div class="dashboard-content-panel-header">
									<h2>Manage Existing Apps</h2>
									<p>Overview of existing apps in your list. You can re-arrange apps by dragging them or delete a single app by clicking on "Delete" button in app row.</p><br>
									<div class="form-group">
										<form action="bulk-edit.php" method="post">
											<?php
											$query1=$file_db->prepare("SELECT * FROM apps LIMIT 1");
											$query1->execute();
											$data_url=$query1->fetchObject()
											
											?>
											<label for="app_locker_url" class="mr-dashboard-label">Bulk edit URL*</label>
											<input type="text" name="bulk_url" class="mr-input-style" placeholder="URL..." value="<?php echo $data_url->app_locker_url; ?>" required=""><br><br>
											<input type="submit" class="mr-btn-submit mr-btn-submit-edit n-m-b" value="Update bulk">	
										</form>
										</div>
								</div>
								<div class="dashboard-content-panel-content">
									<div class="dashboard-app-item-list-wrapper">						
										<?php
											$query=$file_db->prepare("SELECT * FROM apps ORDER BY app_display_order ASC");
											$query->execute();
											while($data=$query->fetch()) {
										?>									
											<div id='sort_<?php echo $data['id'] ?>' class="dashboard-app-row-item">
												<div class="dashboard-app-item-img-wrapper">
													<?php if (htmlspecialchars(isset($data['app_featured'])) && $data['app_featured'] == '1') {?><div class="dashboard-app-item-featured"><span>Featured</span></div><?php } ?>
													<img class="img-fluid" src="../<?php echo htmlspecialchars($data['app_img_src']); ?>" alt="<?php echo htmlspecialchars($data['app_name']); ?>">
												</div>
												<div class="dashboard-app-item-info-wrapper">
													<?php if (htmlspecialchars(isset($data['app_author'])) && $data['app_author'] != '') {?><div class="dashboard-app-item-author"> <?php echo "By: " . htmlspecialchars($data['app_author']); ?></div><?php } ?>
													<h4 class="app_name"><?php if (htmlspecialchars(isset($data['app_name']))) { echo $data['app_name']; }?></h4>
													<p><?php if (htmlspecialchars(isset($data['app_description']))) { echo $data['app_description']; }?></p>
													<?php if (htmlspecialchars(isset($data['app_locker_url']))) {?><div class="dashboard-app-item-locker-url"> <?php echo "Locker URL: <strong>" . $data['app_locker_url']; ?></strong></div><?php } ?>
												</div>
												<div class="dashboard-app-item-manage-buttons-wrapper">
													<form action="edit_app.php" method="POST">
														<input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
														<input type="submit" class="mr-btn-submit mr-btn-submit-edit n-m-b" value="Edit">
													</form>
													<form action="db_action/delete_app.php" method="POST">
														<input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
														<input type="submit" class="mr-btn-submit n-m-b" value="Delete">
													</form>
												</div>
											</div>
										<?php
											}
										?>                  
									</div>				
								</div>
							</div>														
						</div>						
					</div>						
				</div>						
				<?php					
				}
				if (htmlspecialchars(isset($_GET['proccessing-strings'])))
				{
				$query=$file_db->prepare("SELECT * FROM proccessing_strings");
				$query->execute();
				$data=$query->fetch();
				
				$query_hps=$file_db->prepare("SELECT * FROM hps");
				$query_hps->execute();
				$data_hps=$query_hps->fetch();
				
				$query_aos=$file_db->prepare("SELECT * FROM app_o_s");
				$query_aos->execute();
				$data_aos=$query_aos->fetch();
				?>
				<div class="dashboard-wrapper">
					<div class="dashboard-header-wrapper animated fadeInDown">
						<span class="dashboard-header-subtitle">Admin Dashboard</span>
						<h1 class="dashboard-header-title">Text Strings</h1>
						<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 's') {?>
							<div class="dashboard-save-notification">Settings Saved</div>
						<?php } ?>
					</div>
					<div class="dashboard-content-wrapper">
						<div class="dashboard-content-container">	
							<div class="dashboard-content-panel-wrapper">
								<div class="dashboard-content-panel-header">
									<h2>Homepage Text Strings</h2>
									<p>You can edit the text strings for Homepage titles and search input placeholder below.</p>
								</div>
								<form action="db_action/u_hp_s.php" method="POST">
									<div class="dashboard-content-panel-content">
										<div class="form-group">
											<label for="hp_string_featured_title" class="mr-dashboard-label">"Featured Apps" Section Title</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">format_quote</span>
												<input type="text" name="hp_string_featured_title" class="mr-input-style mr-input-style-icon" placeholder="Featured Apps" value="<?php echo htmlspecialchars($data_hps['hp_string_featured_title']); ?>" required />
											</div>												
										</div>
										<div class="form-group">
											<label for="hp_string_all_title" class="mr-dashboard-label">"All Apps" Section Title</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">format_quote</span>
												<input type="text" name="hp_string_all_title" class="mr-input-style mr-input-style-icon" placeholder="All Apps" value="<?php echo htmlspecialchars($data_hps['hp_string_all_title']); ?>" required />
											</div>												
										</div>
										<div class="form-group">
											<label for="hp_string_search" class="mr-dashboard-label">Search Input Placeholder.</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">format_quote</span>
												<input type="text" name="hp_string_search" class="mr-input-style mr-input-style-icon" placeholder="Search for apps..." value="<?php echo htmlspecialchars($data_hps['hp_string_search']); ?>" required />
											</div>												
										</div>
									</div>										
									<div class="dashboard-content-panel-footer">
										<div class="form-group submit-form-group">
											<input type="submit" class="mr-btn-submit float-right" value="Save">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>
							<div class="dashboard-content-panel-wrapper dfgw-mt">
								<div class="dashboard-content-panel-header">
									<h2>App Overview Popup</h2>
									<p>You can edit the text strings for App Overview popup window below.</p>
								</div>
								<form action="db_action/u_ao_s.php" method="POST">
									<div class="dashboard-content-panel-content">
										<div class="form-group">
											<label for="app_o_title" class="mr-dashboard-label">App Overview Title</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">format_quote</span>
												<input type="text" name="app_o_title" class="mr-input-style mr-input-style-icon" placeholder="Title Text..." value="<?php echo htmlspecialchars($data_aos['app_o_title']); ?>" required />
											</div>												
										</div>
										<div class="form-group">
											<label for="app_o_content" class="mr-dashboard-label">App Overview Content</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">format_quote</span>
												<input type="text" name="app_o_content" class="mr-input-style mr-input-style-icon" placeholder="Content Text..." value="<?php echo htmlspecialchars($data_aos['app_o_content']); ?>" required />
											</div>												
										</div>
										<div class="form-group">
											<label for="app_o_button" class="mr-dashboard-label">App Overview Button</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">format_quote</span>
												<input type="text" name="app_o_button" class="mr-input-style mr-input-style-icon" placeholder="Button Text..." value="<?php echo htmlspecialchars($data_aos['app_o_button']); ?>" required />
											</div>												
										</div>
									</div>										
									<div class="dashboard-content-panel-footer">
										<div class="form-group submit-form-group">
											<input type="submit" class="mr-btn-submit float-right" value="Save">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>
							<div class="dashboard-content-panel-wrapper dfgw-mt">
								<div class="dashboard-content-panel-header">
									<h2>Manage Console Proccessing Strings</h2>
									<p>You can edit the console proccessing strings content by editing individual row message below.</p>
									<p>To insert app name inside a proccessing string, use the <strong>[appname]</strong> shortcode.</p>
								</div>
								<form action="db_action/u_p_s.php" method="POST">
									<div class="dashboard-content-panel-content">
										<div class="form-group">
											<label for="proc_str_title_1" class="mr-dashboard-label">Proccessing Title 1</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">format_quote</span>
												<input type="text" name="proc_str_title_1" class="mr-input-style mr-input-style-icon" placeholder="Proccessing Title 1..." value="<?php echo htmlspecialchars($data['proc_str_title_1']); ?>" required />
											</div>												
										</div>
										<div class="form-group">
											<label for="proc_str_title_2" class="mr-dashboard-label">Proccessing Title 2</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">format_quote</span>
												<input type="text" name="proc_str_title_2" class="mr-input-style mr-input-style-icon" placeholder="Proccessing Title 2..." value="<?php echo htmlspecialchars($data['proc_str_title_2']); ?>" required />
											</div>												
										</div>
										<div class="form-group">
											<label for="proc_str_1" class="mr-dashboard-label">Proccessing String 1</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">format_quote</span>
												<input type="text" name="proc_str_1" class="mr-input-style mr-input-style-icon" placeholder="Proccessing String 1..." value="<?php echo htmlspecialchars($data['proc_str_1']); ?>" required />
											</div>												
										</div>
										<div class="form-group">
											<label for="proc_str_2" class="mr-dashboard-label">Proccessing String 2</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">format_quote</span>
												<input type="text" name="proc_str_2" class="mr-input-style mr-input-style-icon" placeholder="Proccessing String 2..." value="<?php echo htmlspecialchars($data['proc_str_2']); ?>" required />
											</div>												
										</div>
										<div class="form-group">
											<label for="proc_str_3" class="mr-dashboard-label">Proccessing String 3</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">format_quote</span>
												<input type="text" name="proc_str_3" class="mr-input-style mr-input-style-icon" placeholder="Proccessing String 3..." value="<?php echo htmlspecialchars($data['proc_str_3']); ?>" required />
											</div>												
										</div>
										<div class="form-group">
											<label for="proc_str_4" class="mr-dashboard-label">Proccessing String 4</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">format_quote</span>
												<input type="text" name="proc_str_4" class="mr-input-style mr-input-style-icon" placeholder="Proccessing String 4..." value="<?php echo htmlspecialchars($data['proc_str_4']); ?>" required />
											</div>												
										</div>
										<div class="form-group">
											<label for="proc_str_5" class="mr-dashboard-label">Proccessing String 5</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">format_quote</span>
												<input type="text" name="proc_str_5" class="mr-input-style mr-input-style-icon" placeholder="Proccessing String 5..." value="<?php echo htmlspecialchars($data['proc_str_5']); ?>" required />
											</div>												
										</div>
										<div class="input-instructions"><i class="material-icons-two-tone">info</i>Shortcode [appname] will be automatically replaced with an actual short app name depending on which app is selected.</div>
									</div>										
									<div class="dashboard-content-panel-footer">
										<div class="form-group submit-form-group">
											<input type="submit" class="mr-btn-submit float-right" value="Save">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>							
						</div>						
					</div>	
				</div>						
				<?php					
				}
				if (htmlspecialchars(isset($_GET['header-settings'])))
				{
				$query=$file_db->prepare("SELECT * FROM header_settings");
				$query->execute();
				$data=$query->fetch();	
				?>
				<div class="dashboard-wrapper">
					<div class="dashboard-header-wrapper animated fadeInDown">
						<span class="dashboard-header-subtitle">Admin Dashboard</span>
						<h1 class="dashboard-header-title">Header & Footer Settings</h1>
						<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 's') {?>
							<div class="dashboard-save-notification">Settings Saved</div>
						<?php } ?>
					</div>
					<div class="dashboard-content-wrapper">
						<div class="dashboard-content-container">								
							<div class="dashboard-content-panel-wrapper">
								<div class="dashboard-content-panel-header">
									<h2>Header Logo & Content</h2>
									<p>Configure the header logo image and content.</p>
								</div>
								<form action="db_action/u_h_s.php" method="POST" enctype="multipart/form-data">
									<div class="dashboard-content-panel-content">
										<div class="row">
											<div class="col-md-7 mmfwot">
												<div class="form-group">
													<label for="logo_img_src" class="mr-dashboard-label">Header Logo Image</label>
													<input type="file" name="logo_img_src" class="mr-input-style mr-file-input-style" />
													<div class="input-instructions"><i class="material-icons-two-tone">info</i>Recommended Size: 100x100px <br/>Accepted Extensions: .png, .jpg, .jpeg</div>
												</div>
											</div>
											<div class="col-md-5 mmfwot">
												<div class="form-group">
													<label class="mr-dashboard-label">Current Logo Image</label>
													<div class="current-logo-img-wrapper">
														<img src="../<?php echo htmlspecialchars($data['header_logo_img_src']); ?>" class="img-fluid current-logo-img" />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-9 mmfwot">
												<div class="form-group">
													<label for="header_title" class="mr-dashboard-label">Header Title*</label>
													<div class="mr-input-wrapper">
														<span class="material-icons-two-tone">label</span>
														<input type="text" name="header_title" class="mr-input-style mr-input-style-icon" placeholder="Header Title..." value="<?php echo htmlspecialchars($data['header_title']); ?>" required />
													</div>												
												</div>	
											</div>
											<div class="col-md-3 mmfwot">
												<div class="form-group parefg">
													<label class="mr-dashboard-label text-center">Enable Particles</label>
													<div class="mr-switch-style">
														<input type="checkbox" name="header_particles" class="mr-switch-style-checkbox" id="header_particles" tabindex="0" value="1" <?php if(htmlspecialchars($data['header_particles']) == '1') { echo 'checked'; } ?>>
														<label class="mr-switch-style-label" for="header_particles">
															<span class="mr-switch-style-inner"></span>
															<span class="mr-switch-style-switch"></span>
														</label>
													</div>
												</div>
											</div>
										</div>	
										<div class="form-group">
											<label for="header_subtitle" class="mr-dashboard-label">Header Subtitle</label>
											<textarea name="header_subtitle" class="mr-textarea-style" placeholder="Header Subtitle..."><?php echo htmlspecialchars($data['header_subtitle']); ?></textarea>
										</div>											
									</div>										
									<div class="dashboard-content-panel-footer">
										<div class="form-group submit-form-group">
											<input type="submit" class="mr-btn-submit float-right" value="Save">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>
							<div class="dashboard-content-panel-wrapper dfgw-mt">
								<div class="dashboard-content-panel-header">
									<h2>Footer Content</h2>
									<p>Configure footer content. By leaving the "Footer Content" field blank, you can entirely remove footer from display.</p>
								</div>
								<?php
								$query_fs=$file_db->prepare("SELECT * FROM footer_settings");
								$query_fs->execute();
								$data_fs=$query_fs->fetch();
								?>
								<form action="db_action/u_f_s.php" method="POST">
									<div class="dashboard-content-panel-content">
										<div class="form-group">
											<label for="footer_content" class="mr-dashboard-label">Footer Content</label>
											<textarea name="footer_content" class="mr-textarea-style" placeholder="Footer content..."><?php echo htmlspecialchars($data_fs['footer_content']); ?></textarea>
										</div>									
									</div>										
									<div class="dashboard-content-panel-footer">
										<div class="form-group submit-form-group">
											<input type="submit" class="mr-btn-submit float-right" value="Save">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>
						</div>						
					</div>						
				</div>		
				<?php					
				}
				if (htmlspecialchars(isset($_GET['general-settings'])))
				{
				$query=$file_db->prepare("SELECT * FROM general_settings");
				$query->execute();
				$data=$query->fetch();
				
				$query2=$file_db->prepare("SELECT * FROM ga_id");
				$query2->execute();
				$data2=$query2->fetch();
				
				$query3=$file_db->prepare("SELECT * FROM d_acc");
				$query3->execute();
				$data3=$query3->fetch();
				?>
				<div class="dashboard-wrapper">
					<div class="dashboard-header-wrapper animated fadeInDown">
						<span class="dashboard-header-subtitle">Admin Dashboard</span>
						<h1 class="dashboard-header-title">General Settings</h1>
						<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 's') {?>
							<div class="dashboard-save-notification">Settings Saved</div>
						<?php } ?>
					</div>
					<div class="dashboard-content-wrapper">
						<div class="dashboard-content-container">								
							<div class="dashboard-content-panel-wrapper">
								<div class="dashboard-content-panel-header">
									<h2>Page title & meta description</h2>
									<p>You can edit the page title and description meta tags below.</p>
								</div>
								<form action="db_action/u_g_s.php" method="POST">
									<div class="dashboard-content-panel-content">
										<div class="form-group">
											<label for="title_meta_tag" class="mr-dashboard-label">Meta Title Tag</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">label</span>
												<input type="text" name="title_meta_tag" class="mr-input-style mr-input-style-icon" placeholder="Meta Title Tag..." value="<?php echo htmlspecialchars($data['page_title']); ?>" required />
											</div>												
										</div>	
										<div class="form-group">
											<label for="description_meta_tag" class="mr-dashboard-label">Meta Description Tag</label>
											<textarea name="description_meta_tag" class="mr-textarea-style" placeholder="Meta Description Tag..." required><?php echo htmlspecialchars($data['page_meta_description']); ?></textarea>
										</div>											
									</div>										
									<div class="dashboard-content-panel-footer">
										<div class="form-group submit-form-group">
											<input type="submit" class="mr-btn-submit float-right" value="Save">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>
							<div class="dashboard-content-panel-wrapper dfgw-mt">
								<div class="dashboard-content-panel-header">
									<h2>Device Accessibility</h2>
									<p>Select which devices are allowed to access your website. By selecting "Mobile Only" option, desktop access will be blocked.</p>
								</div>
								<form action="db_action/u_g_s.php" method="POST">
									<div class="dashboard-content-panel-content">
										<div class="form-group radio-form-group">
											<div class="radio-select-wrapper">
												<div class="radio-select-inner-wrapper">
													<input type="radio" id="desktop" name="device_access" value="desktop" <?php if ($data3['d_acc'] == 'desktop'){ echo 'checked'; } ?>>														
													<label for="desktop"><span class="material-icons-two-tone">devices</span> Desktop & Mobile</label>
												</div>	
											</div>	
											<div class="radio-select-wrapper rswlc">
												<div class="radio-select-inner-wrapper">
													<input type="radio" id="mobile" name="device_access" value="mobile" <?php if ($data3['d_acc'] == 'mobile'){ echo 'checked'; } ?>>														
													<label for="mobile"><span class="material-icons-two-tone">phone_iphone</span> Mobile Only</label>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="m-o-c-w">
											<div class="form-group">
												<label for="d_acc_title" class="mr-dashboard-label">Desktop Notice Title</label>
												<div class="mr-input-wrapper">
													<span class="material-icons-two-tone">label</span>
													<input type="text" name="d_acc_title" class="mr-input-style mr-input-style-icon" placeholder="Mobile Device Not Detected" value="<?php echo htmlspecialchars($data3['d_acc_title']); ?>" required />
												</div>												
											</div>
											<div class="form-group">
												<label for="d_acc_content" class="mr-dashboard-label">Desktop Notice Content</label>
												<div class="mr-input-wrapper">
													<textarea name="d_acc_content" class="mr-textarea-style" placeholder="This website can only be accessed from a mobile device. Please re-visit this website from your mobile phone or tablet device." required><?php echo htmlspecialchars($data3['d_acc_content']); ?></textarea>
												</div>												
											</div>	
										</div>	
									</div>										
									<div class="dashboard-content-panel-footer">
										<div class="form-group submit-form-group">
											<input type="submit" class="mr-btn-submit float-right" value="Save">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>
							<div class="dashboard-content-panel-wrapper dfgw-mt">
								<div class="dashboard-content-panel-header">
									<h2>Google Analytics Tracking</h2>
									<p>You can insert your Google Analytics tracking ID to include tracking code. If the field is left empty, no tracking code will be included.</p>
								</div>
								<form action="db_action/u_g_s.php" method="POST">
									<div class="dashboard-content-panel-content">
										<div class="form-group">
											<label for="ga_id" class="mr-dashboard-label">Google Analytics ID</label>
											<div class="mr-input-wrapper">
												<span class="material-icons-two-tone">analytics</span>
												<input type="text" name="ga_id" class="mr-input-style mr-input-style-icon" placeholder="UA-00000000-0" value="<?php if($data2['ga_id'] != '') { echo htmlspecialchars($data2['ga_id']); } ?>" />
											</div>																								
										</div>	
										<?php if($data2['ga_id'] != '') { ?>	
										<div class="input-instructions"><i class="material-icons-two-tone">info</i><div>The code snippet located below will be included inside main index.php file just before the closing <code>&lt;/head></code> tag. If you want to include it manually, leave the "Google Analytics ID" field empty.</div></div>
										<div class="code-e-wrapper">
											<code>
												<!-- Global site tag (gtag.js) - Google Analytics -->
												&lt;script async src="https://www.googletagmanager.com/gtag/js?id=<?php if($data2['ga_id'] != '') { echo htmlspecialchars($data2['ga_id']); } else { echo 'UA-00000000-0';}?>">&lt;/script></br>
												&lt;script></br>
												  window.dataLayer = window.dataLayer || [];</br>
												  function gtag(){dataLayer.push(arguments);}</br>
												  gtag('js', new Date());</br>	
												  gtag('config', '<?php if($data2['ga_id'] != '') { echo htmlspecialchars($data2['ga_id']); } else { echo 'UA-00000000-0';}?>');</br>
												&lt;/script>
											</code>
										</div>
										<?php } ?>
									</div>										
									<div class="dashboard-content-panel-footer">
										<div class="form-group submit-form-group">
											<input type="submit" class="mr-btn-submit float-right" value="Save">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>
						</div>						
					</div>						
				</div>						
				<?php					
				}
				if (htmlspecialchars(isset($_GET['design-colors'])))
				{
				$query_dc=$file_db->prepare("SELECT * FROM design_colors");
				$query_dc->execute();
				$data_dc=$query_dc->fetch();
				$query_acc=$file_db->prepare("SELECT * FROM accent_color");
				$query_acc->execute();
				$data_acc=$query_acc->fetch();				
				?>
				<div class="dashboard-wrapper">
					<div class="dashboard-header-wrapper animated fadeInDown">
						<span class="dashboard-header-subtitle">Admin Dashboard</span>
						<h1 class="dashboard-header-title">Design & Colors</h1>
						<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 's') {?>
							<div class="dashboard-save-notification">Settings Saved</div>
						<?php } ?>
					</div>
					<div class="dashboard-content-wrapper">
						<div class="dashboard-content-container">
							<div class="dashboard-content-panel-wrapper">
								<div class="dashboard-content-panel-header">
									<h2>Color Mode</h2>
									<p>You can choose between Light and Dark color modes.</p>
								</div>
								<form id="n-p-form" action="db_action/u_c_m.php" method="POST">
									<div class="dashboard-content-panel-content">
										<div class="form-group radio-form-group">
											<div class="radio-select-wrapper radio-color-mode-w">
												<div class="radio-select-inner-wrapper">
													<input type="radio" id="light" name="color_mode" value="light" <?php if ($data_dc['color_mode'] == 'light'){ echo 'checked'; } ?>>														
													<label for="light">
														<img src="assets/img/cm-l.jpg" class="img-fluid cms-img" />
														<span>Light Mode</span>
													</label>
												</div>	
											</div>	
											<div class="radio-select-wrapper radio-color-mode-w">
												<div class="radio-select-inner-wrapper">
													<input type="radio" id="dark" name="color_mode" value="dark" <?php if ($data_dc['color_mode'] == 'dark'){ echo 'checked'; } ?>>														
													<label for="dark" class="rswlc">
														<img src="assets/img/cm-d.jpg" class="img-fluid cms-img" />
														<span>Dark Mode</span>
													</label>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="dashboard-content-panel-footer">
										<div class="form-group submit-form-group">
											<input type="submit" class="mr-btn-submit float-right" value="Save">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>
							<div class="dashboard-content-panel-wrapper dfgw-mt">
								<div class="dashboard-content-panel-header">
									<h2>Accent Color</h2>
									<p>You can select the primary accent color below.</p>
								</div>
								<form id="n-p-form" action="db_action/u_a_c.php" method="POST">
									<div class="dashboard-content-panel-content">
										<div class="form-group radio-form-group">
											<div class="radio-select-wrapper radio-accent-color-w">
												<div class="radio-select-inner-wrapper">
													<input type="radio" id="a-c-c1" name="accent_color" value="a-c-c1" <?php if ($data_acc['accent_color'] == 'a-c-c1'){ echo 'checked'; } ?>>														
													<label for="a-c-c1"></label>
												</div>	
											</div>	
											<div class="radio-select-wrapper radio-accent-color-w">
												<div class="radio-select-inner-wrapper">
													<input type="radio" id="a-c-c2" name="accent_color" value="a-c-c2" <?php if ($data_acc['accent_color'] == 'a-c-c2'){ echo 'checked'; } ?>>														
													<label for="a-c-c2"></label>
												</div>	
											</div>
											<div class="radio-select-wrapper radio-accent-color-w">
												<div class="radio-select-inner-wrapper">
													<input type="radio" id="a-c-c3" name="accent_color" value="a-c-c3" <?php if ($data_acc['accent_color'] == 'a-c-c3'){ echo 'checked'; } ?>>														
													<label for="a-c-c3"></label>
												</div>	
											</div>
											<div class="radio-select-wrapper radio-accent-color-w">
												<div class="radio-select-inner-wrapper">
													<input type="radio" id="a-c-c4" name="accent_color" value="a-c-c4" <?php if ($data_acc['accent_color'] == 'a-c-c4'){ echo 'checked'; } ?>>														
													<label for="a-c-c4"></label>
												</div>	
											</div>
											<div class="radio-select-wrapper radio-accent-color-w">
												<div class="radio-select-inner-wrapper">
													<input type="radio" id="a-c-c5" name="accent_color" value="a-c-c5" <?php if ($data_acc['accent_color'] == 'a-c-c5'){ echo 'checked'; } ?>>														
													<label for="a-c-c5"></label>
												</div>	
											</div>
											<div class="radio-select-wrapper radio-accent-color-w">
												<div class="radio-select-inner-wrapper">
													<input type="radio" id="a-c-c6" name="accent_color" value="a-c-c6" <?php if ($data_acc['accent_color'] == 'a-c-c6'){ echo 'checked'; } ?>>														
													<label for="a-c-c6"></label>
												</div>	
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="dashboard-content-panel-footer">
										<div class="form-group submit-form-group">
											<input type="submit" class="mr-btn-submit float-right" value="Save">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>	
						</div>						
					</div>						
				</div>
				<?php					
				}
				if (htmlspecialchars(isset($_GET['edit-admin'])))
				{
				?>
				<div class="dashboard-wrapper">
					<div class="dashboard-header-wrapper animated fadeInDown">
						<span class="dashboard-header-subtitle">Admin Dashboard</span>
						<h1 class="dashboard-header-title">Edit Admin</h1>
						<?php if (htmlspecialchars(isset($_GET['rmsg'])) && htmlspecialchars($_GET['rmsg']) == 's') {?>
							<div class="dashboard-save-notification">Settings Saved</div>
						<?php } ?>
					</div>
					<div class="dashboard-content-wrapper">
						<div class="dashboard-content-container">
							<div class="dashboard-content-panel-wrapper">
								<div class="dashboard-content-panel-header">
									<h2>Change Admin Login Details</h2>
									<p>You can change the current admin username and password by using the form below.</p>
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
											<input type="submit" class="mr-btn-submit float-right" value="Confirm New Login Details">
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>													
						</div>						
					</div>						
				</div>						
				<?php					
				}				
				if (htmlspecialchars(isset($_GET['system-check'])))
				{
				?>
				<div class="dashboard-wrapper">
					<div class="dashboard-header-wrapper animated fadeInDown">
						<span class="dashboard-header-subtitle">Admin Dashboard</span>
						<h1 class="dashboard-header-title">System Check</h1>
					</div>
					<div class="dashboard-content-wrapper">
						<div class="dashboard-content-container">
							<div class="dashboard-content-panel-wrapper">
								<div class="dashboard-content-panel-header">
									<h2>Check your current server configuration.</h2>
									<p>You can check if your current server configuration supports all the settings and extensions which are required for proper functioning of the landing page.</p>
								</div>
								<div class="dashboard-content-panel-content">
									<div class="system-check-content">
										<?php
										if (extension_loaded('curl')) {
											echo '<div class="sysc-c-l sysc-c-l-s"><span class="material-icons-two-tone">check_circle</span><span class="sysc-c-l-en">cURL</span> extension is loaded</div>';
										} else {
											echo '<div class="sysc-c-l sysc-c-l-e"><span class="material-icons-two-tone">highlight_off</span><span class="sysc-c-l-en">cURL</span> extension is not loaded !</div>';
										}
										if (extension_loaded('mbstring')) {
											echo '<div class="sysc-c-l sysc-c-l-s"><span class="material-icons-two-tone">check_circle</span><span class="sysc-c-l-en">mbstring</span> extension is loaded</div>';
										} else {
											echo '<div class="sysc-c-l sysc-c-l-e"><span class="material-icons-two-tone">highlight_off</span><span class="sysc-c-l-en">mbstring</span> extension is not loaded !</div>';
										}
										if( ini_get('allow_url_fopen') ) {
											echo '<div class="sysc-c-l sysc-c-l-s"><span class="material-icons-two-tone">check_circle</span><span class="sysc-c-l-en">allow_url_fopen</span> is enabled</div>';
										} else {
											echo '<div class="sysc-c-l sysc-c-l-e"><span class="material-icons-two-tone">highlight_off</span><span class="sysc-c-l-en">allow_url_fopen</span> is not enabled !</div>';
										}
										?>
									</div>
								</div>
							</div>													
						</div>						
					</div>						
				</div>						
				<?php					
				}
				?>
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
		<style>
			.mr-side-nav {
    		position: fixed;
    		min-height: 100%;
			}

			.mr-side-nav-wrapper {
   			 width: 260px;
			}

			/*Floating Back-To-Top Button*/
			#myBtn {
	position: fixed;
    bottom: 30px;
    float: right;
    right: 10%;
    left: 94%;
    max-width: 3%;
    width: 100%;
    font-size: 16px;
    border-color: rgba(85, 85, 85, 0.2);
    background-color: rgb(26 32 46);
    padding: 10px;
    border-radius: 50px;
}

    }
/*On Hover Color Change*/
    #myBtn:hover {
        background-color: #7dbbf1;
    }
		</style>
		
		<button id="myBtn"><a href="#top" style="color: white">↑</a></button>

	</body>
</html>