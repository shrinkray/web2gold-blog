<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 2/24/18
 * Time: 9:53 PM
 */


$optin_title = get_sub_field('left_optin_section_title' );
$optin_copy = get_sub_field( 'left_optin_paragraph_text' );
$toggle = get_sub_field( 'left_optin_toggle');
$button = get_sub_field( 'optin_button' );
$link_target = get_sub_field( 'optin_link_target' );
$button_style = get_sub_field( 'optin_button_style' );
$link_type = get_sub_field( 'optin_link_type' );
$internal_link = get_sub_field( 'optin_internal_link' );
$custom_link = get_sub_field( 'optin_custom_link' );
?>

<?php // Image Right - Checklist  ?>
<div class="cta-list">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 py-5">
        <h3 class="col-12 col-lg-11 mt-0 mb-4 ml-lg-5 text-primary"><?php echo $optin_title ?></h3>

        <?php

        $left_content_toggle = get_sub_field( 'left_optin_toggle_sub_content' );
        $left_para = get_sub_field( 'left_optin_paragraph_text' ); ?>

        <div class="mb-4 ml-lg-5">

          <?php if ( $left_content_toggle ) { // display paragraph field ?>

            <div class="col-12 col-md-11 text-grey">
              <?php echo $left_para ?>
            </div>

          <?php } else { // display repeater

            if ( have_rows( 'left_optin_punchlist_repeater' ) ) :
              while ( have_rows( 'left_optin_punchlist_repeater' ) ) : the_row();

                // repeater vars
                $left_subheading = get_sub_field( 'left_optin_sub-heading' );
                $left_subdesc = get_sub_field( 'left_optin_sub_paragraph' );
                $subheading_link = get_sub_field( 'sub_heading_link' );
                ?>


                <div class="col-12 col-md-11 text-grey">

                  <?php if ( $subheading_link ) { // Check items can have a post or page link associated
                    ?>

                    <h4 class="light text-uppercase">
                      <a href="<?= $subheading_link ?>" class="subheading-link" ><i class="fa fa-check text-primary icon-2x"></i><?php echo $left_subheading ?></a>
                    </h4>

                  <?php } else { ?>
                    <h4 class="light text-uppercase">
                      <i class="fa fa-check text-primary icon-2x"></i><?= $left_subheading ?>
                    </h4>
                  <?php } ?>
                  <div class="col-12 ml-3"><p><?= $left_subdesc ?></p></div>
                </div>


              <?php endwhile; // repeater field ?>

            <?php else : ?>
              <?php // no rows found ?>
            <?php endif; // repeater rows ?>


          <?php } ?>
        </div> <!-- end .row -->
        <?php if ( $toggle == 1 ) {
          // echo 'true'; ?>

          <div class="d-flex justify-content-center">
            <?php if ( $toggle ) {
              if ($button) { // display linked button

                if ($link_type == "internal") { // link points to an internal page ?>

                  <a class="btn btn-primary <?php echo $button_style; ?>" href="<?php echo $internal_link; ?>" role="button" target="<?php echo $link_target; ?>"><?php echo $button; ?></a>

                <?php } else  { // ( $link_type == "custom" ) ?>

                  <a class="btn btn-primary <?php echo $button_style; ?>" href="<?php echo $custom_link; ?>" role="button" target="<?php echo $link_target; ?>"><?php echo $button; ?></a>

                <?php } ?>
              <?php } else {
                // do not display button
              }
            } else {
              // toggle off

            } ?>
          </div>

        <?php } else {
          // echo 'false';
        } ?>

      </div> <!-- end .col-* -->

      <?php
      $optin_image = get_sub_field( 'left_optin_background_image' ); // echos URL
      // if( !empty($optin_image) ):
      // vars
      ?>
      <?php // endif; ?>
      <div class="col-lg-6 divider-diagonal cta-diagonal divider-diagonal-r"
           data-image-src="<?php echo $optin_image; ?>">
      </div>
    </div> <!-- end .row -->
  </div> <!-- end .container-fluid -->
</div> <!-- close .cta-list -->

<?php //endif; ?>