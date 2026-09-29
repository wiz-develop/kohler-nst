<?php
/**
 * Plugin Name: NSTM Concept Bootstrap
 * Description: Creates the two concept pages and applies the concept theme once.
 */

if (!defined('ABSPATH')) {
    exit;
}

function nstm_bootstrap_concept_pages() {
    if (get_option('nstm_concepts_bootstrapped')) {
        return;
    }

    if (wp_get_theme('nstm-concepts')->exists()) {
        switch_theme('nstm-concepts');
    }

    $pages = array(
        'design-a' => array(
            'title' => 'デザインA｜ダーク・フォトグラフィック',
            'template' => 'page-design-a.php',
        ),
        'design-b' => array(
            'title' => 'デザインB｜ライト・ジャーナル',
            'template' => 'page-design-b.php',
        ),
    );

    foreach ($pages as $slug => $config) {
        $existing = get_page_by_path($slug, OBJECT, 'page');
        $page_id = $existing ? $existing->ID : wp_insert_post(array(
            'post_title' => $config['title'],
            'post_name' => $slug,
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => '',
        ));

        if (!is_wp_error($page_id)) {
            update_post_meta($page_id, '_wp_page_template', $config['template']);
        }
    }

    update_option('blog_public', '0');
    update_option('permalink_structure', '/%postname%/');
    flush_rewrite_rules(false);
    update_option('nstm_concepts_bootstrapped', '1');
}
add_action('init', 'nstm_bootstrap_concept_pages', 1);

function nstm_finalize_https_urls() {
    if (get_option('nstm_https_urls_finalized')) {
        return;
    }

    $https_url = 'https://xs885095.xsrv.jp/cms';
    update_option('home', $https_url);
    update_option('siteurl', $https_url);
    update_option('nstm_https_urls_finalized', '1');
}
add_action('init', 'nstm_finalize_https_urls', 2);
