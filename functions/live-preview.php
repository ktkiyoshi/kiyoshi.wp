<?php

/* 執筆中プレビューのホットリロード
 *
 * ?preview=true の下書きプレビュー表示に、「別タブに切り替えている間だけ」
 * スクロール位置を保ったまま定期リロードする JS を差し込む。編集画面と
 * プレビューを並べておけば、プレビューボタンを押さずに反映が見える。
 * プレビュータブを手前にするとリロードは止まる。
 *
 * 反映の速さは下書きの自動保存間隔に依存する（wp-config.php の AUTOSAVE_INTERVAL）。
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_footer', 'kiyoshi_live_preview_reload', 99);
function kiyoshi_live_preview_reload()
{
    $is_preview = is_preview() || !empty($_GET['preview']);
    if (!$is_preview || !is_user_logged_in() || !current_user_can('edit_posts')) {
        return;
    }
    ?>
    <script>
    (function () {
        var POLL_MS = 5000;
        var KEY = 'kiyoshiPreviewScroll';

        try {
            var saved = sessionStorage.getItem(KEY);
            if (saved !== null) {
                sessionStorage.removeItem(KEY);
                window.scrollTo(0, parseInt(saved, 10) || 0);
            }
        } catch (e) {}

        setInterval(function () {
            if (document.hidden) {
                try { sessionStorage.setItem(KEY, String(window.scrollY)); } catch (e) {}
                window.location.reload();
            }
        }, POLL_MS);
    })();
    </script>
    <?php
}
