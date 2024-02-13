<body class="page-body <?php if (htmlspecialchars(isset($data_dcs['color_mode'])) && $data_dcs['color_mode'] == 'light') { echo 'cm-l'; } else if  (htmlspecialchars(isset($data_dcs['color_mode'])) && $data_dcs['color_mode'] == 'dark') { echo 'cm-d'; }?>">	
	<div id="preloader" class="preloader-wrapper">
		<div class="preloader-inner-wrapper">
			<div class="ball-scale-multiple"><div></div><div></div><div></div></div>
		</div>
	</div>
	<header class="page-header">
		<?php
		$query_hs=$file_db->prepare("SELECT * FROM header_settings");
		$query_hs->execute();
		$data_hs=$query_hs->fetch();
		?>
		<div class="container">
			<div class="logo-wrapper">
				<?php if (htmlspecialchars(isset($data_hs['header_logo_img_src']))) { ?><img src="<?php echo htmlspecialchars($data_hs['header_logo_img_src']); ?>" class="img-fluid header-logo-img" /><?php } ?>				
			</div>
			<div class="header-content-wrapper">
				<h1 class="header-title"><?php if (htmlspecialchars(isset($data_hs['header_title']))) { echo htmlspecialchars($data_hs['header_title']); } ?></h1>
				<p class="header-subtitle"><?php if (htmlspecialchars(isset($data_hs['header_subtitle']))) { echo htmlspecialchars($data_hs['header_subtitle']); } ?></p>
			</div>
		</div>
		<?php if (htmlspecialchars(isset($data_hs['header_particles'])) && htmlspecialchars($data_hs['header_particles']) == '1') { ?><div id="header-particles"></div><?php } ?>			
	</header>
	<?php
	$query_hps=$file_db->prepare("SELECT * FROM hps");
	$query_hps->execute();
	$data_hps=$query_hps->fetch();
	?>
	<section class="featured-section">
		<div class="container">
			<div class="section-title-wrapper">
				<h3><?php if (htmlspecialchars(isset($data_hps['hp_string_featured_title'])) && $data_hps['hp_string_featured_title'] != '') { echo $data_hps['hp_string_featured_title']; } ?></h3>
			</div>
			<div class="featured-apps-content">
				<div class="featured-apps-slider">
					<?php
					$query_featured_apps=$file_db->prepare("SELECT * FROM apps WHERE app_featured = 1");
					$query_featured_apps->execute();
					while($data_featured_apps=$query_featured_apps->fetch()) {
					?>
					<div class="featured-app-slider-item lit lit-t" data-lrurl="<?php if (htmlspecialchars(isset($data_featured_apps['app_locker_url'])) && $data_featured_apps['app_locker_url'] != '') { echo $data_featured_apps['app_locker_url']; } ?>">
						<img src="<?php if (htmlspecialchars(isset($data_featured_apps['app_img_src']))) { echo htmlspecialchars($data_featured_apps['app_img_src']); } ?>" class="featured-app-slider-item-img liti img-fluid" alt="<?php if (htmlspecialchars(isset($data_featured_apps['app_name']))) { echo $data_featured_apps['app_name']; } ?> Logo"/>
						<div class="featured-app-slider-item-name litn"><?php if (htmlspecialchars(isset($data_featured_apps['app_name']))) { echo htmlspecialchars($data_featured_apps['app_name']); } ?></div>
						<?php if (htmlspecialchars(isset($data_featured_apps['app_rating'])) && $data_featured_apps['app_rating'] != '') { ?><div class="listing-item-rating"><span class="listing-item-rating-separator"></span><span class="material-icons-two-tone">star</span><span class="listing-item-rating-val"><?php echo htmlspecialchars($data_featured_apps['app_rating']); ?></span></div><?php } ?>
						<div class="featued-app-slider-item-hidden-meta">
							<?php if (htmlspecialchars(isset($data_featured_apps['app_author'])) && $data_featured_apps['app_author'] != '') { ?><div class="listing-item-by">Author: <span class="listing-item-by-val"><?php echo $data_featured_apps['app_author']; ?></span></div><?php } ?>
							<?php if (htmlspecialchars(isset($data_featured_apps['app_os'])) && $data_featured_apps['app_os'] == 'androidios') { ?><div class="listing-item-os"><i class="fab fa-android imr"></i><i class="fab fa-apple"></i></div><?php } ?>
							<?php if (htmlspecialchars(isset($data_featured_apps['app_os'])) && $data_featured_apps['app_os'] == 'android') { ?><div class="listing-item-os"><i class="fab fa-android"></i></div><?php } ?>
							<?php if (htmlspecialchars(isset($data_featured_apps['app_os'])) && $data_featured_apps['app_os'] == 'ios') { ?><div class="listing-item-os"><i class="fab fa-apple"></i></div><?php } ?>
							<?php if (htmlspecialchars(isset($data_featured_apps['app_description']))) { ?><div class="listing-item-about"><?php echo htmlspecialchars($data_featured_apps['app_description']); ?></div><?php } ?>
							<?php if (htmlspecialchars(isset($data_featured_apps['app_downloads'])) && $data_featured_apps['app_downloads'] != '') { ?><div class="listing-item-downloads-val"><?php echo htmlspecialchars($data_featured_apps['app_downloads']); ?></div><?php } ?>
							<?php if (htmlspecialchars(isset($data_featured_apps['app_short_name'])) && $data_featured_apps['app_short_name'] != '') { ?><div class="listing-item-short-name litsn"><?php echo $data_featured_apps['app_short_name']; ?></div><?php } ?>
						</div>
					</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<section class="listing-section">
		<div class="container">				
			<div class="section-title-wrapper">
				<h3><?php if (htmlspecialchars(isset($data_hps['hp_string_all_title'])) && $data_hps['hp_string_all_title'] != '') { echo $data_hps['hp_string_all_title']; } ?></h3>
				<div class="search-form-wrapper">
					<form id="search-form">
						<div class="search-input-wrapper">
							<span class="material-icons-two-tone">search</span>
							<input type="text" class="search-input" id="search-input" value="" placeholder="<?php if (htmlspecialchars(isset($data_hps['hp_string_search'])) && $data_hps['hp_string_search'] != '') { echo $data_hps['hp_string_search']; } ?>"/>
						</div>
					</form>
				</div>
			</div>
			<div class="listing-content">
				<div class="row">
					<?php
					$query_apps=$file_db->prepare("SELECT * FROM apps ORDER BY app_display_order ASC");
					$query_apps->execute();
					while($data_apps=$query_apps->fetch()) {
					?>
					<div class="listing-item-wrapper col-md-6">
						<div class="listing-item lit lit-t" data-lrurl="<?php if (htmlspecialchars(isset($data_apps['app_locker_url'])) && $data_apps['app_locker_url'] != '') { echo $data_apps['app_locker_url']; } ?>">
							<div class="listing-item-left">
								<img src="<?php if (htmlspecialchars(isset($data_apps['app_img_src']))) { echo htmlspecialchars($data_apps['app_img_src']); } ?>" class="img-fluid listing-item-img liti" alt="<?php if (htmlspecialchars(isset($data_apps['app_name']))) { echo $data_apps['app_name']; } ?> Logo"/>
							</div>
							<div class="listing-item-right">
								<div class="listing-item-auos">
									<?php if (htmlspecialchars(isset($data_apps['app_author'])) && $data_apps['app_author'] != '') { ?><div class="listing-item-by">Author: <span class="listing-item-by-val"><?php echo $data_apps['app_author']; ?></span></div><?php } ?>
									<?php if (htmlspecialchars(isset($data_apps['app_os'])) && $data_apps['app_os'] == 'androidios') { ?><div class="listing-item-os"><i class="fab fa-android imr"></i><i class="fab fa-apple"></i></div><?php } ?>
									<?php if (htmlspecialchars(isset($data_apps['app_os'])) && $data_apps['app_os'] == 'android') { ?><div class="listing-item-os"><i class="fab fa-android"></i></div><?php } ?>
									<?php if (htmlspecialchars(isset($data_apps['app_os'])) && $data_apps['app_os'] == 'ios') { ?><div class="listing-item-os"><i class="fab fa-apple"></i></div><?php } ?>
								</div>
								<div class="listing-item-name-rating-wrapper">
									<div class="listing-item-name litn"><?php if (htmlspecialchars(isset($data_apps['app_name']))) { echo $data_apps['app_name']; } ?></div>
									<?php if (htmlspecialchars(isset($data_apps['app_rating'])) && $data_apps['app_rating'] != '') { ?><div class="listing-item-rating"><span class="listing-item-rating-separator"></span><span class="material-icons-two-tone">star</span><span class="listing-item-rating-val"><?php echo htmlspecialchars($data_apps['app_rating']); ?></span></div><?php } ?>
								</div>
								<?php if (htmlspecialchars(isset($data_apps['app_description']))) { ?><div class="listing-item-about"><?php echo $data_apps['app_description']; ?></div><?php } ?>
								<div class="listing-item-hidden-d">
									<?php if (htmlspecialchars(isset($data_apps['app_downloads'])) && $data_apps['app_downloads'] != '') { ?><div class="listing-item-downloads-val"><?php echo htmlspecialchars($data_apps['app_downloads']); ?></div><?php } ?>
									<?php if (htmlspecialchars(isset($data_apps['app_short_name'])) && $data_apps['app_short_name'] != '') { ?><div class="listing-item-short-name litsn"><?php echo htmlspecialchars($data_apps['app_short_name']); ?></div><?php } ?>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<?php
					}
					?> 	
				</div>
			</div>
		</div>
	</section>
	<?php
	$query_fs=$file_db->prepare("SELECT * FROM footer_settings");
	$query_fs->execute();
	$data_fs=$query_fs->fetch();
	if (htmlspecialchars(isset($data_fs['footer_content'])) && $data_fs['footer_content'] != '') {
	?>
	<footer>
		<div class="container">
			<div class="footer-content">
				<p><?php echo htmlspecialchars($data_fs['footer_content']); ?></p>
			</div>
		</div>
	</footer>
	<?php
	}
	?>
</body>