<!-- 

CPAZip.com- Free Landing Pages and CPA Methods

 -->
<?php
require_once(realpath(dirname(__FILE__) . '/includes/sqldb.inc.php'));
require_once(realpath(dirname(__FILE__) . '/includes/Mobile_Detect.php'));
$detect = new Mobile_Detect;
$query_gs = $file_db->prepare("SELECT * FROM general_settings");
$query_gs->execute();
$data_gs = $query_gs->fetch();
$site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$detect = new Mobile_Detect;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title><?php if (htmlspecialchars(isset($data_gs['page_title']))) {
            echo htmlspecialchars($data_gs['page_title']);
        } ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content="<?php if (htmlspecialchars(isset($data_gs['page_meta_description']))) {
        echo htmlspecialchars($data_gs['page_meta_description']);
    } ?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" type="image/png" href="https://www.appsneak.com/logo.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,800;1,900&family=Poppins&display=swap"
          rel="stylesheet">
    <!-- Open Graph Meta Tags-->
    <meta property="og:title" content="<?php if (htmlspecialchars(isset($data_gs['page_title']))) {
        echo htmlspecialchars($data_gs['page_title']);
    } ?>"/> <!-- Title which is displayed when your site is shared on social networks -->
    <meta property="og:description" content="<?php if (htmlspecialchars(isset($data_gs['page_meta_description']))) {
        echo htmlspecialchars($data_gs['page_meta_description']);
    } ?>"/> <!-- Website description which is displayed when your site is shared on social networks -->
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo $site_url; ?>"/> <!-- Your Website URL -->
    <!-- Twitter Meta -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="<?php if (htmlspecialchars(isset($data_gs['page_title']))) {
        echo htmlspecialchars($data_gs['page_title']);
    } ?>"/>
    <meta name="twitter:description" content="<?php if (htmlspecialchars(isset($data_gs['page_meta_description']))) {
        echo htmlspecialchars($data_gs['page_meta_description']);
    } ?>"/>
    <meta name="twitter:image" content="http://www.mywebsiteurl.com/twitter-share-image.jpg"/>
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Two+Tone|" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/animate.css" rel="stylesheet"/>
    <link href="assets/css/magnific-popup.css" rel="stylesheet"/>
    <link href="assets/css/slick.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet"/>
    <?php
    $query_dcs = $file_db->prepare("SELECT * FROM design_colors");
    $query_dcs->execute();
    $data_dcs = $query_dcs->fetch();
    if (htmlspecialchars(isset($data_dcs['color_mode'])) && $data_dcs['color_mode'] == 'light') {
        echo '<link href="assets/css/lm.css" rel="stylesheet" />';
    } else if (htmlspecialchars(isset($data_dcs['color_mode'])) && $data_dcs['color_mode'] == 'dark') {
        echo '<link href="assets/css/dm.css" rel="stylesheet" />';
    }
    $query_sacc = $file_db->prepare("SELECT * FROM accent_color");
    $query_sacc->execute();
    $data_sacc = $query_sacc->fetch();
    echo '<link href="assets/css/' . $data_sacc['accent_color'] . '.css" rel="stylesheet" />';

    $query_ga = $file_db->prepare("SELECT * FROM ga_id");
    $query_ga->execute();
    $data_ga = $query_ga->fetch();
    if (htmlspecialchars(isset($data_ga['ga_id'])) && $data_ga['ga_id'] != '') {
        ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async
                src="https://www.googletagmanager.com/gtag/js?id=<?php echo htmlspecialchars($data_ga['ga_id']); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());
            gtag('config', '<?php if ($data_ga['ga_id'] != '') {
                echo htmlspecialchars($data_ga['ga_id']);
            }?>');
            </br>
        </script>
        <?php
    }
    ?>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-C8CGTJGKNK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-C8CGTJGKNK');
    </script>

</head>
<style>
    .listing-item-by-val {
        color: #d9b400;
    }

    #s-p-c-title {
        color: #25ff22;
    }

    h1.header-title {
        font-family: Montserrat;
    }

    .header-logo-img {
        max-width: 120px;
        max-height: none;
    }
</style>

<?php
$query_daccs = $file_db->prepare("SELECT * FROM d_acc");
$query_daccs->execute();
$data_daccs = $query_daccs->fetch();
if (htmlspecialchars(isset($data_daccs['d_acc'])) && $data_daccs['d_acc'] == 'desktop') {
    require 'includes/i-d.php';
} else if (htmlspecialchars(isset($data_daccs['d_acc'])) && $data_daccs['d_acc'] == 'mobile') {
    if ($detect->isMobile()) {
        require 'includes/i-d.php';
    } else {
        require 'includes/i-nd.php';
    }
}
?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="assets/js/slick.min.js"></script>
<?php if (htmlspecialchars(isset($data_hs['header_particles'])) && htmlspecialchars($data_hs['header_particles']) == '1') { ?>
    <script type="text/javascript" src="assets/js/particles.min.js"></script>
<?php } ?>
<script type="text/javascript" src="assets/js/main.js"></script>

</html>