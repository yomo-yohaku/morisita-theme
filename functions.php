<?php

/**
 * Contact Form 7の自動Pタグ・BRタグ挿入機能を無効化する
 */
add_filter('wpcf7_autop_or_not', '__return_false');


/**
 * ブロックエディタにCSS適用
 */
function my_editor_suport()
{
  add_theme_support('editor-styles');
  add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme', 'my_editor_suport');

/**
 * セキュリティ対策
 */
remove_action('wp_head', 'wp_generator'); // WordPressのバージョン
remove_action('wp_head', 'wp_shortlink_wp_head'); // 短縮URLのlink
remove_action('wp_head', 'wlwmanifest_link'); // ブログエディターのマニフェストファイル
remove_action('wp_head', 'rsd_link'); // 外部から編集するためのAPI
remove_action('wp_head', 'feed_links_extra', 3); // フィードへのリンク
remove_action('wp_head', 'print_emoji_detection_script', 7); // 絵文字に関するJavaScript
remove_action('wp_head', 'rel_canonical'); // カノニカル
remove_action('wp_print_styles', 'print_emoji_styles'); // 絵文字に関するCSS
remove_action('admin_print_scripts', 'print_emoji_detection_script'); // 絵文字に関するJavaScript
remove_action('admin_print_styles', 'print_emoji_styles'); // 絵文字に関するCSS
