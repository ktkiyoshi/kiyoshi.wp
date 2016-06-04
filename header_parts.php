<header id="top-head">
    <div class="inner">
        <?php if ( get_post_type() == 'tech' ) { ?>
        <div id="mobile-head" class="tech">
            <h1 class="logo"><a href="/wp/tech">タイトル未定</a></h1>
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
                <li><a href="/wp">HOME</a></li>
                <li><a href="/wp/about">ABOUT</a></li>
                <li><a href="/wp/gallery">GALLERY</a></li>
                <li><a href="/wp/tech">TECH</a></li>
            </ul>
        </nav>
        <?php if ( get_post_type() == 'tech' ) { ?>
        <p>セミアマ・エンジニアによる技術的なあれこれを備忘録的に残すブログ</p>
        <?php } ?>
    </div>
</header>