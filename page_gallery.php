<?php
/*
Template Name: Gallery
*/
?>
<?php
require('/var/www/sec/instagram.php');

$uri = array(API_URL_USER, API_URL_MEDIA);
$options = array(
    CURLOPT_POST => false,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_RETURNTRANSFER => true
);
for ($i = 0; $i < count($uri); $i++) {
    $ch = curl_init();
    curl_setopt_array($ch, $options);
    curl_setopt($ch, CURLOPT_URL, $uri[$i]);
    $json[$i] = json_decode(curl_exec($ch), true);
    curl_close($ch);
}
$media = $json[1]['data'];
?>
<?php get_header(); ?>

<body>
    <?php require("parts/header_link.php"); ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">
                <a href="/wp"><img src="<?php bloginfo('template_directory'); ?>/img/gallery_001.png" class="top_img" /></a>
                <section>
                    <?php
                    for ($i = 0; $i < count($media); $i++) {
                        $caption = $media[$i]['caption'];
                        $permalink = $media[$i]['permalink'];
                        $media_url = $media[$i]['media_url'];
                        $timestamp = $media[$i]['timestamp'];
                        $datetime = DateTime::createFromFormat('Y-m-d\TH:i:s+', $timestamp);
                        $datetime->setTimezone(new DateTimeZone('Asia/Tokyo'));
                    ?>
                        <div class="instagram f_left t_center">
                            <time datetime="<?php echo $datetime->format('Y/m/d'); ?>" pubdate><?php echo $datetime->format('Y/m/d');  ?></time>
                            <a href="<?php echo $permalink; ?>" title="<?php echo $caption; ?>">
                                <img src="<?php echo $media_url; ?>" class="thumbnail_E" />
                                <p><?php echo $caption; ?></p>
                            </a>
                        </div>
                        <?php if (($i + 1) == count($media)) { ?>
                            <div class="reset"></div>
                        <?php } elseif (($i % 2) == 1) { ?>
                            <div class="reset box_entry_pc"><br /></div>
                        <?php }
                        if (($i % 2) == 1) { ?>
                            <div class="reset box_entry_sp"><br /></div>
                        <?php } ?>
                    <?php } ?>
                </section>
            </div><!-- /#content -->
            <?php get_sidebar(); ?>
            <div class="reset"></div>
        </div><!-- /#main -->
    </div>
    <?php get_footer(); ?>