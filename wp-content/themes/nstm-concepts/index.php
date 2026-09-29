<?php
if (!defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex,nofollow">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<main class="nstm-section"><div class="nstm-container"><h1><?php bloginfo('name'); ?></h1><p><a href="<?php echo esc_url(home_url('/design-a/')); ?>">A案を見る</a></p><p><a href="<?php echo esc_url(home_url('/design-b/')); ?>">B案を見る</a></p></div></main>
<?php wp_footer(); ?>
</body>
</html>

