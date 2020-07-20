<?php
/**
 * Template Name: Home / Landing Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'secondary-page'); ?>
<?php endwhile; ?>
