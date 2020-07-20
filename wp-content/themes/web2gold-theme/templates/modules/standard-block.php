<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 2/24/18
 * Time: 9:20 PM
 */


$full_row = get_sub_field( 'full_row_block' );
$section_title = get_sub_field( 'section_title' );
$wysiwyg = get_sub_field( 'text_block' );
$break_block = get_sub_field( 'break_block' );
$background = get_sub_field( 'background_options' );
$pallet = get_sub_field( 'theme_pallet' );
$pattern = get_sub_field( 'theme_pattern' );
$credit = get_sub_field( 'credited_to' );
$bg_pattern   = get_sub_field( 'background_pattern' );
$gap = get_sub_field( 'set_gap' ); // margin-bottom spacing





if ( $full_row  == 'media' ) { ?>

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

  <div class="row">
    <div class="col">

      <div class="standard-block mb-<?php echo $gap; ?>">

        <div class="">
          <?php echo $wysiwyg; ?>
        </div>

      </div> <!-- .standard-block -->
    </div>
  </div>

<?php } else if ( $full_row  == 'break' ) { ?>

  <div class="row align-items-center">
    <div class="col">

<?php

if ( $bg_pattern ) { ?>

      <div class="break-block mb-<?php echo $gap; ?>" data-image-src="<?= get_template_directory_uri(); ?>/dist/images/<?php echo $bg_pattern; ?>.jpg">

      <?php } else { //  ?>

      <div class="break-block mb-<?php echo $gap; ?>">

      <?php }  ?>

        <blockquote class="text-center"><?php echo $break_block; ?></blockquote>

        <?php if ( $credit ) { // display only if the quotation has an author
          ?>
          <div class="credit">&mdash;&nbsp;<?php echo $credit; ?></div>
        <?php }  ?>


      </div> <!-- .standard-block -->
    </div>
  </div>

<?php } else { // $full_row  == 'mixed' ?>

  <?php while (have_rows('stack_layouts')) : the_row();

    $stack = get_sub_field( 'stack_layouts' );
    $prop = get_sub_field( 'prop' );
    $image = get_sub_field( 'icon' );
    $heading = get_sub_field( 'title' );

    $pic = wp_get_attachment_image($image, 'full', false, $attr = array('class' => 'img-fluid prop-icon'));

    ?>

    <div class="row no-gutters props">
      <div class="col-lg-11 offset-lg-1">
        <h3><?php echo $heading; ?></h3>
      </div>
      <div class="col-md-1 offset-lg-1">
        <?php if ($image) { ?>
          <?php echo $pic; ?>
        <?php } ?>
      </div>
      <div class="col-7 prop">
        <?php echo $prop; ?>
      </div>
    </div>

  <?php endwhile;

}