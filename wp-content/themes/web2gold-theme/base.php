<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
use Roots\Sage\Controllers\Jumbotron\Jumbotron;
use Roots\Sage\Controllers\Slider\Slider;

$ID = get_the_ID();
if ( get_field( 'display_jumbotron' ))
  new Jumbotron( $ID );

if ( get_field( 'slider_show_slider' ))
  new Slider( $ID);
?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      acf_form_head();
      do_action('get_header');
      get_template_part('templates/header');
      do_action('after_header');
    ?>
    <div class="wrap container" role="document">

      <?php //Great example: https://www.codeply.com/go/bBMOsvtJhD/bootstrap-4-reverse-column-order ?>
      <div class="content row flex-column-reverse flex-md-row">

        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar col-md-12">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif;
        ?>

        <main class="main col-md-12">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->

      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      do_action('after_footer');
      wp_footer();
    ?>



  </body>
</html>
