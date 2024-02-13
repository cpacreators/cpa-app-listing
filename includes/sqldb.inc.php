<?php
try {
	define('DB_PATH', __DIR__ . '/db.sqlite3');
    $file_db = new PDO('sqlite:' . DB_PATH);
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$file_db->exec("CREATE TABLE IF NOT EXISTS apps (
					   id INTEGER PRIMARY KEY AUTOINCREMENT,
					   app_display_order INTEGER,
					   app_img_src TEXT,
					   app_name TEXT,
					   app_short_name TEXT,
					   app_author TEXT,
					   app_description TEXT,
					   app_locker_url TEXT,
					   app_featured INTEGER,
					   app_rating TEXT,
					   app_os TEXT,
					   app_downloads TEXT)");
	$file_db->exec("CREATE TABLE IF NOT EXISTS proccessing_strings (
					   proc_str_1 TEXT, 
					   proc_str_2 TEXT,
					   proc_str_3 TEXT,
					   proc_str_4 TEXT, 
					   proc_str_5 TEXT,
					   proc_str_title_1 TEXT,
					   proc_str_title_2 TEXT)");
	$file_db->exec("CREATE TABLE IF NOT EXISTS app_o_s (
					   app_o_title TEXT, 
					   app_o_content TEXT,
					   app_o_button TEXT)");
	$file_db->exec("CREATE TABLE IF NOT EXISTS hps (
					   hp_string_featured_title TEXT, 
					   hp_string_all_title TEXT,
					   hp_string_search TEXT)");	
	$file_db->exec("CREATE TABLE IF NOT EXISTS header_settings (
					   header_logo_img_src TEXT,
					   header_title TEXT, 
					   header_subtitle TEXT,
					   header_particles INTEGER)");
	$file_db->exec("CREATE TABLE IF NOT EXISTS design_colors (
					   color_mode TEXT)");
	$file_db->exec("CREATE TABLE IF NOT EXISTS accent_color (
					   accent_color TEXT)");						
	$file_db->exec("CREATE TABLE IF NOT EXISTS footer_settings (
					   footer_content TEXT)");	
	$file_db->exec("CREATE TABLE IF NOT EXISTS general_settings (
					   page_title TEXT,
					   page_meta_description TEXT,
					   page_favicon TEXT)");
	$file_db->exec("CREATE TABLE IF NOT EXISTS ga_id (
					   ga_id TEXT)");
	$file_db->exec("CREATE TABLE IF NOT EXISTS d_acc (
					   d_acc TEXT,
					   d_acc_title TEXT,
					   d_acc_content TEXT)");
	$file_db->exec("CREATE TABLE IF NOT EXISTS f_ico (
					   favicon_src TEXT)");				   
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>