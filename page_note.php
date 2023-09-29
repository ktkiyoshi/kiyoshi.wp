<?php
/*
Template Name: note
*/
?>
<?php get_header(); ?>

<body>
    <?php require_once("parts/header_link.php"); ?>
    <main>
        <?php get_sidebar(); ?>
        <div id="content">
            <section class="logo">
                <a href="https://note.com/ktkiyoshi" target="_blank">
                    <img src="<?php bloginfo('template_directory'); ?>/img/note/logo.svg" width="300px" />
                </a>
            </section>
            <section class="entries grid">
                <?php
                $rss_items = my_note_feed('https://note.com/ktkiyoshi/rss', '24');
                foreach ($rss_items as $item) :
                    $eyecatch = $item->data["child"]["http://search.yahoo.com/mrss/"]["thumbnail"][0]["data"];
                    // $creatorImg = $item->data["child"]["https://note.com"]["creatorImage"][0]["data"];
                    // $creatorName = $item->data["child"]["https://note.com"]["creatorName"][0]["data"];
                ?>
                    <article>
                        <section class="thumbnail">
                            <a href="<?php echo $item->get_permalink() ?>" title="<?php echo $item->get_title(); ?>">
                                <img src="<?php echo $eyecatch; ?>" />
                            </a>
                        </section>
                        <section class="entry_meta">
                            <p class="postdate">
                                <time datetime="<?php echo $item->get_date('Y/m/d (D) G:i'); ?>" pubdate>
                                    <?php echo $item->get_date('Y/m/d (D) G:i'); ?>
                                </time>
                            </p>
                            <h1>
                                <a href="<?php echo $item->get_permalink(); ?>" target="_blank"><?php echo $item->get_title(); ?></a>
                            </h1>
                            <p class="description">
                                <?php echo mb_strimwidth(strip_tags($item->get_description()), 0, 140, "...", "UTF-8"); ?>
                            </p>
                        </section>
                    </article>
                <?php endforeach; ?>
            </section>
            <section class="more">
                <a href="https://note.com/ktkiyoshi" target="_blank">noteをもっと見る</a>
            </section>
        </div><!-- /#content -->
    </main>
    <?php get_footer(); ?>