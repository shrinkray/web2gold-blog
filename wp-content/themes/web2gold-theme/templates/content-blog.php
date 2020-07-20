

<?php
// Setting up the $args
// http://www.wpbeginner.com/wp-themes/how-to-exclude-sticky-posts-from-the-loop-in-wordpress/
// https://www.billerickson.net/code/wp_query-arguments/
// https://www.mhthemes.com/blog/wordpress-sticky-posts/
?>



<?php
$args = array(
    'numberposts' => 2,
    'offset' => 0,
    'category' => 0,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'include' => '',
    'exclude' => '',
    'meta_key' => '',
    'meta_value' =>'',
    'post_type' => 'post',
    'post_status' => 'draft, publish, future, pending, private',
    'suppress_filters' => true
);

$recent_posts = wp_get_recent_posts( $args, ARRAY_A );

// vars
$limit = get_sub_field( 'excerpt_limit' );
$excerpt = get_sub_field( 'show_excerpt' );
$set_length = get_sub_field( 'set_excerpt_length' );

$the_query = new WP_Query( $args );

// The Loop

?>

<div class="row">

<?php

$lastposts = get_posts( $args );
foreach($lastposts as $post) : setup_postdata($post); ?>

    <div class="col col-sm-6">
      <div class="card-block block">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
      </div>
    </div>

<?php endforeach; ?>

</div>


  <?php
 //endwhile;
?>

<?php
// vars
$limit = get_sub_field( 'excerpt_limit' );
$excerpt = get_sub_field( 'show_excerpt' );
$set_length = get_sub_field( 'set_excerpt_length' );

$args = array(
    'order'               => 'DESC',
    'posts_per_page'      =>  -1,
    'post_type'            => 'post',
    'no_found_rows'       => 'true',
);

$the_query = new WP_Query( $args );

// The Loop

while ( $the_query->have_posts() ) {
  $the_query->the_post();

  if (is_sticky()) { ?>
    <div class="row">
      <div class="col sticky">
        <article <?php post_class(); ?>>
          <?php if (has_post_thumbnail()) : ?>
            <a class="" href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
          <?php else : ?>
<!--            <a class="" href="--><?php //the_permalink() ?><!--"><img class="card-img-top" src="holder.js/800x200"></a>-->
          <?php endif; ?>
          <div class="card-block block">
            <header>
              <h4 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
              <?php // displays just the date meta
              get_template_part('templates/entry-meta-date'); ?>
            </header>
            <div class="entry-content">
              <?php the_excerpt(); ?>
            </div>
          </div>
        </article>
      </div>
    </div><!-- .row -->


  <?php } // end if
} // endwhile

wp_reset_query(); //reset the original WP_Query


echo "<div class=\"row\">" ;

$args = array(
    'order'               => 'DESC',
    'posts_per_page'      =>  -1,
    'post_type'            => 'post',
    'no_found_rows'       => 'true',
);

$the_query = new WP_Query( $args );

// The Loop

while ( $the_query->have_posts() ) {
  $the_query->the_post();



  if ( ! (is_sticky()) ) { ?>

    <div class="col-12 col-md-4 non-stick">
      <article <?php post_class(); ?>>
        <?php if(has_post_thumbnail()) : ?>
          <a class="" href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
        <?php else : ?>
<!--          <a class="" href="--><?php //the_permalink() ?><!--"><img class="card-img-top" src="holder.js/800x200"></a>-->
        <?php endif; ?>
        <div class="card-block block">
          <header>
            <h4 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
            <?php // displays just the date meta
            get_template_part('templates/entry-meta-date-cat'); ?>
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

 <?php } // endif

} // endwhile;

  echo "</div>" ; // close .row
?>


<?php wp_reset_query(); //reset the  WP_Query
?>

