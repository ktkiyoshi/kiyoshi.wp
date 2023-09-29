<div id="side">
    <section>
        <div class="side_title">
            <p>中の人</p>
        </div>
        <p>こんな人が書いてます</p>
        <div class="profile">
            <img src="<?php bloginfo('template_directory'); ?>/img/profile.jpg" alt="">
            <p><a href="https://twitter.com/ktkiyoshi" target="_blank">@ktkiyoshi</a></p>
        </div>
    </section>

    <section>
        <div class="side_title">
            <p>最新ブログ記事</p>
        </div>
        <ul>
            <?php
            $lastposts = get_posts(array('numberposts' => 5, 'orderby' => 'post_date', 'category' => '-113'));
            $counter = 0;
            foreach ($lastposts as $post) :
                $counter++;
                setup_postdata($post);
            ?>
                <?php if ($counter <= 10) { ?>
                    <li>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <img src="<?php echo catch_that_image("thumbnail"); ?>" class="thumbnail" />
                            <time datetime=" <?php the_time('Y/m/d') ?>" pubdate>
                                <?php the_time('Y/m/d') ?>
                            </time>
                            <p class="post_title">
                                <?php echo $post->post_title; ?>
                            </p>
                        </a>
                    </li>
            <?php }
            endforeach; ?>
        </ul>
    </section>

    <section>
        <div class="side_title">
            <p>技術タグ</p>
        </div>
        <p class="cloud"><?php wp_tag_cloud(array('taxonomy' => 'tech_tag')); ?></p>
    </section>

</div>