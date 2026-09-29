<?php
/*
Template Name: NSTM Design A
*/
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
<body <?php body_class('nstm-concept-page'); ?>>
<?php wp_body_open(); nstm_render_concept_page('a'); wp_footer(); ?>
</body>
</html>

