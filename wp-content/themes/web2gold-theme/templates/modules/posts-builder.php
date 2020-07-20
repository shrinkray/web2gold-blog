<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 2/24/18
 * Time: 9:53 PM
 */

// vars
$post_type = get_sub_field( 'post_type' );
$categories_ids = get_sub_field( 'categories' );
// $dump =  var_dump( $categories_ids );
$num_columns = get_sub_field( 'number_of_columns' );
$num_posts = get_sub_field( 'number_of_posts' );
$section_title = get_sub_field( 'section_title' );
$excerpt = get_sub_field( 'show_excerpt' );
$featured = get_sub_field( 'display_featured_image' );
$show_meta = get_sub_field( 'display_meta_content' );
$which_meta = get_sub_field( 'which_meta' );
$set_length = get_sub_field( 'set_excerpt_length' );
$limit = get_sub_field( 'excerpt_limit' );
$gap = get_sub_field( 'set_gap' );

// Setting up the $args
// http://www.wpbeginner.com/wp-themes/how-to-exclude-sticky-posts-from-the-loop-in-wordpress/
$args = array(
    'order'               => 'DESC',
    'posts_per_page'      =>  $num_posts,
    'post_type'            =>  $post_type,
    'no_found_rows'       => 'true',
    'ignore_sticky_posts' => 1
);
?>

<?php
if ( $post_type ) {
  ?>

  <?php if ( $section_title ) { ?>
    <div class="row">
      <div class="col">
        <div class="block-title">
          <h2><?php echo $section_title; ?></h2>
        </div>
      </div>
    </div>
  <?php } else {
    // don't display a title row
  }
  ?>


  <?php // http://www.problogdesign.com/how-to/the-2-methods-of-showing-excerpts/
  // https://codex.wordpress.org/Class_Reference/WP_Query
  // query for the blog archive page

  $your_query = new WP_Query( $args );

  // "loop" through query (even though it's just one page)
  ?>

<div class="row mb-<?php echo $gap; ?>">

  <?php
  while ($your_query->have_posts()) : $your_query->the_post(); ?>

    <div class="col-12 col-sm-6 col-md">
      <article <?php post_class(); ?>>

        <?php if ( $featured ) {
          if(has_post_thumbnail()) : ?>
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
          <?php else : ?>
            <a href="<?php the_permalink() ?>"><img class="card-img-top" src="holder.js/600x200"></a>
          <?php endif;
        } else { // we've selected not to display a featured image
          // skip the image
        }
        ?>

        <div class="card-block">
          <header>
            <a href="<?php the_permalink() ?>"><h3 class="entry-title card-title checkScrollHeightOverflow"><?php the_title(); ?></h3></a>

            <?php // Do we show meta tags? If so, display from two combinations
            if ( $show_meta ) {
              // decide which meta
              switch ( $which_meta ) {
                case "all" :
                  get_template_part('templates/partials/entry-meta');
                  break;
                case "date" :
                  get_template_part('templates/partials/entry-meta-date');
                  break;
                case "date_author" :
                  get_template_part('templates/partials/entry-meta-date-author');
                  break;
                case "date_cat" :
                  get_template_part('templates/partials/entry-meta-date-cat');
                  break;
              }
            } else {
              // no meta to display on post
            } ?>
          </header>

          <?php if( $excerpt ) {
            if ( $set_length ) { // helps set consistency in displayed posts ?>
              <div class="entry-content">
                <?php echo excerpt($limit); ?>
              </div>
            <?php } else { ?>
              <div class="entry-content">
                <?php the_excerpt(); ?>
              </div>
            <?php }
            ?>

          <?php } else {
            // there will be no excerpt
          } ?>

        </div>

      </article>
    </div>

  <?php
  endwhile;

 ?>

</div>

 <?php

  // reset post data (important!)
  wp_reset_postdata();
  ?>
  <!-- .row -->

  <?php
} // close post_type ?>