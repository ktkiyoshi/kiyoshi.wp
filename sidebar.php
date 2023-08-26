<div id="side">
    <div id="sidefixed">
        <div class="r_frame">
            <p class="title">最新ブログ記事</p>
        </div>
        <section id="fixed-point">
            <ul>
                <?php
                $lastposts = get_posts(array('numberposts' => 10, 'orderby' => 'post_date', 'category' => '-113'));
                $counter = 0;
                foreach ($lastposts as $post) :
                    $counter++;
                    setup_postdata($post);
                ?>
                    <?php if ($counter <= 10) { ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo catch_that_image("thumbnail"); ?>" class="thumbnail_C f_left" />
                                <time datetime="<?php the_time('Y/m/d/D') ?>" pubdate><?php the_time('Y/m/d/D') ?></time>
                                <p class="postTitle">
                                    <?php if (mb_strlen($post->post_title) > 80) {
                                        $title = mb_substr($post->post_title, 0, 80);
                                        echo $title . ･･･;
                                    } else {
                                        echo $post->post_title;
                                    } ?>
                                </p>
                            </a>
                        </li>
                <?php }
                endforeach; ?>
            </ul>
        </section>

    </div><!-- /#sidefixed -->
</div><!-- /#side -->