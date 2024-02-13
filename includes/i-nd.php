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
	<section class="d-b-section">
		<div class="container">	
			<div class="d-b-notice-wrapper">	
				<span class="material-icons-two-tone">screen_lock_portrait</span>
				<?php
				$query_daccc=$file_db->prepare("SELECT * FROM d_acc");
				$query_daccc->execute();
				$data_daccc=$query_daccc->fetch();
				?>
				<h2><?php if (htmlspecialchars(isset($data_daccc['d_acc_title']))) { echo htmlspecialchars($data_daccc['d_acc_title']); } ?></h2>
				<p><?php if (htmlspecialchars(isset($data_daccc['d_acc_content']))) { echo htmlspecialchars($data_daccc['d_acc_content']); } ?></p>
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