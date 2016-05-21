<div id="side">
  <div id="sidefixed">
    <div class="r_frameTech">
      <p class="title">超日記</p>
    </div>

    <section>
        <?php
        $lastposts = get_posts('numberposts=1&orderby=post_date&post_type=post');
        foreach($lastposts as $post) :
        setup_postdata($post);
        ?>
        <style>
        *::before,
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .panel-in::before,
        .panel {
            background: url("<?php echo catch_that_image(); ?>") no-repeat center;
            -webkit-background-size: cover;
            background-size: cover;
        }
        .panel {
            position: relative;
            margin: 5px 15px 25px;
        }
        .panel-in::before {
            content: "";
            position: absolute;
            background-clip: content-box;
            width: 100%;
            height: 100%;
            padding: 15px;
            top: 0;
            left: 0;
            -webkit-filter: blur(5px);
            filter: blur(5px);
        }
        .panel-in {
            padding: 15px;
            position: relative;
        }
        .panel-main {
            padding: 7px 10px;
            z-index: 30;
            position: relative;
            margin-bottom: 0;
            border: solid 1px rgba(255,255,255,0.4);
            background: rgba(255,255,255,0.4);
        }
        .panel-main p {
          text-align: center;
          font-size: 80%;
          font-weight: bold;
        }
        </style>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <div class="panel">
            <div class="panel-in">
              <div class="panel-main">
                <time datetime="<?php the_time('Y/m/d/D') ?>" pubdate><?php the_time('Y/m/d/D') ?></time>
                <p>
                <?php
                  if(mb_strlen($post->post_title)>50) {
                    $title= mb_substr($post->post_title,0,50);
                    echo $title. ･･･ ;
                  } else {
                    echo $post->post_title;
                  }
                ?>
                </p>
              </div>
            </div>
          </div>
        </a>
        <?php
        endforeach;
        ?>
    </section>

    <div class="r_frameTech">
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

    <div class="r_frameTech">
      <p class="title">タグ</p>
    </div>
    <p class="tags"><?php wp_tag_cloud( array( 'taxonomy' => 'tech_tag' ) ); ?></p>
  </div><!-- /#sidefixed -->
</div><!-- /#side -->
