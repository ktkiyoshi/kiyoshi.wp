<header id="top-head">
    <div class="inner">
        <?php if ( get_post_type() == 'tech' ) { ?>
        <div id="mobile-head" class="tech">
            <h1 class="logo"><a href="/wp/tech">タイトル未定</a></h1>
        <?php } else { ?>
        <div id="mobile-head">
            <h1 class="logo"><a href="/wp">超日記</a></h1>
        <?php } ?>
            <div id="category-list">
                <p>CATEGORY<i class="fa fa-angle-down fa-lg right" aria-hidden="true"></i></p>
                <ul>
                <?php $categories = get_categories('exclude=54','hide_empty=true'); ?>
                <?php foreach($categories as $category): ?>
                    <li><a href="<?php echo get_category_link($category->cat_ID); ?>">
                    <?php echo get_catname($category->cat_ID);?>(<?php echo $category->count; ?>)</a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div id="nav-toggle">
                <div><span></span><span></span><span></span></div>
            </div>
        </div>
        <nav id="global-nav">
            <ul>
            <?php if ( get_post_type() != 'tech' ) { ?>
                <li><span class="">超日記について</span><a href="/wp/about">ABOUT</a></li>
            <?php } ?>
            <?php if ( get_post_type() != 'post' ) { ?>
                <li><span class="">日記エントリー</span><a href="/wp">DIARY</a></li>
            <?php } ?>
                <li><span class="">私のインスタ</span><a href="/wp/gallery">GALLERY</a></li>
            <?php if ( get_post_type() != 'tech' ) { ?>
                <li><span class="">技術エントリー</span><a href="/wp/tech">TECH-BLOG</a></li>
            <?php } ?>
            </ul>
        </nav>
        <?php if ( get_post_type() == 'tech' ) { ?>
        <p>セミアマ・エンジニアによる技術的なあれこれを備忘録的に残すブログ</p>
        <?php } ?>
    </div>
</header>
