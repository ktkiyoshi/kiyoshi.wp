<div id="side">
  <div id="sidefixed">
    <div class="r_frame">
      <p class="title">最新記事</p>
    </div>
    <section>
      <ul>
        <?php
        $lastposts = get_posts('numberposts=10&orderby=post_date&post_type=tech');
        foreach($lastposts as $post) :
        $counter++;
        setup_postdata($post);
        ?>
        <?php if ($counter <= 5) { ?>
        <li>
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <img src="<?php echo catch_that_image(); ?>" class="thumbnail_C f_left"/>
            <time datetime="<?php the_time('Y/m/d/D') ?>" pubdate><?php the_time('Y/m/d/D') ?></time>
            <p class="postTitle">
            <?php
              if(mb_strlen($post->post_title)>80) {
                $title= mb_substr($post->post_title,0,80);
                echo $title. ･･･ ;
              } else {
                echo $post->post_title;
              }
            ?>
            </p>
          </a>
        </li>
        <?php } endforeach; ?>
      </ul>
    </section>

    <div class="r_frame">
      <p class="title">タグ</p>
    </div>
    <section>
      <p class="tags"><?php wp_tag_cloud( array( 'taxonomy' => 'tech_tag' ) ); ?></p>
    </sction>

  </div><!-- /#sidefixed -->
</div><!-- /#side -->
