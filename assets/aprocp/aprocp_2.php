<?php
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX) {die("<div style='width: 100%; height: 100%; position: fixed; background: #212833; left: 0; top: 0;'><div style='width: 70%; margin: 150px auto 0 auto; background: #fff; text-align:center; padding: 80px 100px; border-radius: 20px; font-family: Verdana; box-shadow: 0 0 0 3px rgba(255,255,255,0.2);'><h3 style='color: #000; text-transform: uppercase; margin: 0;'>Huh.. wait a second!</h3><h1 style='margin: 5px 0 0 0; color: #fc4349; text-transform: uppercase; letter-spacing: 1px;'>Nosey little mouse, aren't you?</h1><p style='font-size: 1em; color: #555;'>There is nothing interesting here, no point waisting your time.</p></div></div>");}
?>
<div class="proccessing-wrapper">
	<div class="proccessing-content">
		<div class="proccessing-loader"><span class="material-icons-two-tone fa-spin">settings</span></div>
		<h3 class="proccessing-title animated pulse infinite"></h3>
		<div class="proccessing-msg"></div>
		<div id="progressBarConsole" class="proccessing-loadbar"><div></div></div>	
	</div>
</div>
<?php
require_once('../../includes/sqldb.inc.php');
$query_ps=$file_db->prepare("SELECT * FROM proccessing_strings");
$query_ps->execute();
$data_ps=$query_ps->fetch();
?>
<script type="text/javascript">
	var 
	$console_msg_string_1 = "<?php echo htmlspecialchars($data_ps['proc_str_1']); ?>";
	$console_msg_string_2 = "<?php echo htmlspecialchars($data_ps['proc_str_2']); ?>";
	$console_msg_string_3 = "<?php echo htmlspecialchars($data_ps['proc_str_3']); ?>";
	$console_msg_string_4 = "<?php echo htmlspecialchars($data_ps['proc_str_4']); ?>";
	$console_msg_string_5 = "<?php echo htmlspecialchars($data_ps['proc_str_5']); ?>";
	$console_title_string_1 = "<?php echo htmlspecialchars($data_ps['proc_str_title_1']); ?>";
	$console_title_string_2 = "<?php echo htmlspecialchars($data_ps['proc_str_title_2']); ?>";
</script>