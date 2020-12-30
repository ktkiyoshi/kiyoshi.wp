</div><!-- /#wrapper -->
<footer>
    <div id="footer" class="clearfix">
    <?php if ( get_post_type() == 'tech' ) { ?>
        <div class="f_frame tag_list">
            <p class="title">タグ一覧</p>
            <ul>
            <?php
                $taxo_tags = get_terms(
                    array(
                        'taxonomy' => 'tech_tag',
                        'hide_empty' => true,
                    ));
                foreach($taxo_tags as $taxo_tag):
            ?>
                <li class="f_minLink">
                    <a href="<?php echo get_term_link($taxo_tag->term_id); ?>">
                    <?php echo get_term($taxo_tag->term_id)->name;?>(<?php echo $taxo_tag->count; ?>)
                    </a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <?php } else { ?>
        <div class="f_frame archive_list">
            <p class="title">アーカイブ一覧</p>
            <?php $archives = get_archives_array(); $this_year = ''; ?>
            <?php if($archives): ?>
            <ul>
            <?php foreach($archives as $archive): ?>
            <?php if($this_year == '' || $this_year != $archive->year) { ?>
                <p><?php echo $archive->year; ?>年</p>
                <?php $m_cnt = 0; } ?>
                <li><a href="<?php echo get_month_link($archive->year, $archive->month); ?>">
                    <?php echo $archive->month; ?>月(<?php echo $archive->posts; ?>)
                </a></li>
                <?php if($m_cnt == 5) { echo "<br class='display_pc' />"; } ?>
                <?php if($m_cnt == 3 || $m_cnt == 7) { echo "<br class='display_sp' />"; } ?>
                <?php $this_year = $archive->year; $m_cnt++; ?>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
        <div class="f_frame category_list">
            <p class="title">カテゴリ一覧</p>
            <ul>
            <?php $categories = get_terms(
                array(
                    'taxonomy' => 'category',
                    'hide_empty' => true,
                ));
                foreach($categories as $category):
            ?>
                <li>
                    <a href="<?php echo get_term_link($category->term_id); ?>">
                    <?php echo get_cat_name($category->term_id);?>(<?php echo $category->count; ?>)
                    </a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <?php } ?>
        <?php require("footer_profile_parts.php"); ?>
    </div>
    <div class="copyright">Copyright(C) <script type="text/javascript">myDate = new Date();myYear = myDate.getFullYear();document.write(myYear);</script> Kiyoshi All Rights Reserved.</div>
</footer>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-31926749-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-31926749-1');
</script>
<script>
// hljs.initHighlightingOnLoad();
$('div code').each(function(i, block) {
  hljs.highlightBlock(block);
});
</script>
<script type="text/javascript" charset="utf-8" src="<?php echo get_javascript_uri() ?>side-fixed.js"></script>
<script>
(function($) {
    $(function() {
        var $header = $('#top-head');
        $(window).scroll(function() {
            if ($(window).scrollTop() > 50) {
                $header.addClass('fixed');
            } else {
                $header.removeClass('fixed');
            }
        });
    });
})(jQuery);
</script>
<script>
(function($) {
    var tap = window.ontouchstart===null?"touchstart":"click";
    $(function() {
        $('#category-list p').click(function(){
            $('#category-list ul').toggleClass('show');
            $('#category-list i').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
        });
    });
    $(document).on(tap, function(event) {
        if (!$(event.target).closest('#category-list').length) {
            $('#category-list ul').removeClass('show');
            $('#category-list i').removeClass('fa-angle-up').addClass('fa-angle-down');
      }
    });

    $(function() {
        $('#nav-toggle').click(function(){
            $('#top-head').toggleClass('open');
        });
    });
    $(function(){
        $('.catNav li a').each(function(){
            var $href = $(this).attr('href');
            if(location.href.match($href)) {
                $(this).parent().addClass('active');
            } else {
                $(this).parent().removeClass('active');
            }
        });
    });
    $(function() {
        $('#tabs a[href^="#panel"]').click(function(){
            $("#tabs li").removeClass("active");
            $(this).parent().addClass("active");
            $("#tabs .panel").hide();
            $(this.hash).fadeIn();
            return false;
        });
        $('#tabs a[href^="#panel"]:eq(0)').trigger('click');
    });
    $(document).ready(function(){
        $("#old_entry").click(function(){
            $('#box_entry').slideToggle(500)
            return false;
        });
    });
})(jQuery);
// });
</script>
<!-- Twitter -->
<script>
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
</script>
<!-- Facebook -->
<div id="fb-root"></div>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.async = true;
    js.src = "//connect.facebook.net/en_EN/all.js#xfbml=1&appId=112219258880440";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php wp_footer(); ?>
</body>
</html>