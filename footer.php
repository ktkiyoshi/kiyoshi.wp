<footer>
    <div id="footer-wrapper">
        <section class="archive_list">
            <h1>アーカイブ一覧</h1>
            <?php
            $archives = get_archives_array();
            $this_year = ''; ?>
            <?php if ($archives) : ?>
                <ul>
                    <?php foreach ($archives as $archive) : ?>
                        <?php if ($this_year == '' || $this_year != $archive->year) { ?>
                            <p class="year">
                                <a href="<?php echo get_year_link($archive->year); ?>">
                                    <?php echo $archive->year; ?>年</a>
                            </p>
                        <?php } ?>
                        <li class="month">
                            <a href="<?php echo get_month_link($archive->year, $archive->month); ?>">
                                <?php echo $archive->month; ?>月(<?php echo $archive->posts; ?>)
                            </a>
                        </li>
                        <?php $this_year = $archive->year; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>
        <section class="category_list">
            <h1>カテゴリ一覧</h1>
            <ul>
                <?php $categories = get_terms(
                    array(
                        'taxonomy' => 'category',
                        'hide_empty' => true,
                    )
                );
                foreach ($categories as $category) :
                ?>
                    <li class="category">
                        <a href="<?php echo get_term_link($category->term_id); ?>">
                            <?php echo get_cat_name($category->term_id); ?>(<?php echo $category->count; ?>)
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </div>
    <div class="copyright">Copyright(C) <script type="text/javascript">
            myDate = new Date();
            myYear = myDate.getFullYear();
            document.write(myYear);
        </script> Kiyoshi All Rights Reserved.</div>
</footer>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script async src="https://cdn.st-note.com/js/social_button.min.js"></script><!-- note -->
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script>
    // hljs.initHighlightingOnLoad();
    $('div code').each(function(i, block) {
        hljs.highlightBlock(block);
    });
</script>
<script>
    (function($) {
        $(function() {
            $('#nav-toggle').click(function() {
                $('header').toggleClass('open');
            });
        });
    })(jQuery);
    // });
</script>
<!-- Twitter -->
<script>
    ! function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'twitter-wjs');
</script>
<!-- Facebook -->
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.async = true;
        js.src = "//connect.facebook.net/en_EN/all.js#xfbml=1&appId=112219258880440";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<?php wp_footer(); ?>
</body>

</html>