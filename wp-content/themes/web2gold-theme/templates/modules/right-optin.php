<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 2/24/18
 * Time: 10:05 PM
 */

$optin_title = get_sub_field('right_optin_section_title' );
$optin_copy = get_sub_field( 'right_optin_copy' );
$toggle = get_sub_field( 'right_optin_toggle');
$button = get_sub_field( 'optin_button' );
$link_target = get_sub_field( 'optin_link_target' );
$button_style = get_sub_field( 'optin_button_style' );
$link_type = get_sub_field( 'optin_link_type' );
$internal_link = get_sub_field( 'optin_internal_link' );
$custom_link = get_sub_field( 'optin_custom_link' );

?>
<?php  ?>
<!-- Image Left - A Handle -->
<div class="cta-list">
  <div class="container-fluid">
    <div class="row">
      <?php
      $optin_image = get_sub_field( 'right_optin_background_image' ); // echos URL

      ?>
      <?php // endif; ?>
      <div class="col-lg-6 divider-diagonal cta-diagonal divider-diagonal-l"
           data-image-src="<?php echo $optin_image; ?>">


      </div> <!-- close background image -->
      <div class="col-lg-6 py-5 " >
        <h3 class="col-12 mt-0 mb-3 text-primary"><?php echo $optin_title ?></h3>
        <div class="mb-3 mr-lg-5">

          <div class="col-12 col-lg-11 text-grey">

            <?php echo $optin_copy ?>

            <div class="d-flex justify-content-center " >
              <?php if ( $toggle ) {
                if ( $button ) { // display linked button

                  if ( $link_type == "internal" ) { // link points to an internal page ?>

                    <a class="btn btn-primary <?php echo $button_style; ?>" href="<?php echo $internal_link; ?>" role="button" target="<?php echo $link_target; ?>"><?php echo $button; ?></a>

                  <?php } else  { // ( $link_type == "custom" ) ?>

                    <a class="btn btn-primary <?php echo $button_style; ?>" href="<?php echo $custom_link; ?>" role="button" target="<?php echo $link_target; ?>"><?php echo $button; ?></a>

                  <?php } ?>
                <?php } else {
                  // do not display button
                }
              }  ?>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div> <!-- close second .cta-list -->