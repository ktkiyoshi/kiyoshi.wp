<header id="top-head">
    <div class="inner">
        <?php if ( get_post_type() == 'tech' ) { ?>
        <div id="mobile-head" class="tech">
            <h1 class="logo"><a href="/wp/tech">タイトル未定</a></h1>
        <?php } else if ( get_post_type() == 'dump' ) { ?>
        <div id="mobile-head" class="dump">
            <h1 class="logo"><a href="/wp/dump">はきだめ日記</a></h1>
        <?php } else { ?>
        <div id="mobile-head">
            <h1 class="logo"><a href="/wp">超日記</a></h1>
        <?php } ?>
            <div id="nav-toggle">
                <div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <nav id="global-nav">
            <ul>
            <?php if ( get_post_type() != 'tech' ) { ?>
                <li><span class="">超日記について</span><a href="/wp/about">ABOUT</a></li>
            <?php } ?>
                <li><span class="">日記エントリー</span><a href="/wp">DIARY</a></li>
                <li><span class="">私のインスタ</span><a href="/wp/gallery">GALLERY</a></li>
                <!-- <li><span class=""></span><a href="/wp/dump">DUMP</a></li> -->
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
