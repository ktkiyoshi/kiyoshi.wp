<?php
/*
Template Name: Gallery
*/
?>
<?php require_once('parts/insta.php'); ?>
<?php get_header(); ?>

<body>
    <?php require_once("parts/header_link.php"); ?>
    <main>
        <?php get_sidebar(); ?>
        <div id="content">
            <!-- <a href="/wp">
                <img src="<?php bloginfo('template_directory'); ?>/img/top/gallery_001.png" class="top_img" />
            </a> -->
            <section class="entries grid">
                <?php
                for ($i = 0; $i < count($media); $i++) :
                    $caption = $media[$i]['caption'];
                    $media_type = $media[$i]['media_type'];
                    $media_url = $media[$i]['media_url'];
                    $permalink = $media[$i]['permalink'];
                    $timestamp = $media[$i]['timestamp'];
                    $datetime = DateTime::createFromFormat('Y-m-d\TH:i:s+', $timestamp);
                    $datetime->setTimezone(new DateTimeZone('Asia/Tokyo'));
                ?>
                    <article>
                        <section class="thumbnail">
                            <a href="<?php echo $permalink; ?>" title="<?php echo $caption; ?>">
                                <?php if ($media_type == 'VIDEO') : ?>
                                    <video controls src="<?php echo $media_url; ?>"></video>
                                <?php else : ?>
                                    <img src="<?php echo $media_url; ?>" />
                                <?php endif; ?>
                            </a>
                        </section>
                        <section class="entry_meta">
                            <p class="description">
                                <?php echo mb_strimwidth($caption, 0, 140, "...", "UTF-8"); ?>
                            </p>
                        </section>
                    </article>
                <?php endfor; ?>
            </section>

        </div><!-- /#content -->
    </main>
    <?php get_footer(); ?>