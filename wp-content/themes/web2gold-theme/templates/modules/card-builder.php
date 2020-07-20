<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 2/24/18
 * Time: 9:55 PM
 */

    $section_title = get_sub_field( 'section_title' );
    $no_gutters = get_sub_field( 'remove_gutters' );
    $gap = get_sub_field( 'set_gap' );

      if ( $section_title ) { ?>
        <div class="row">
          <div class="col">

            <div class="block-title">
              <h2 class=""><?php echo  $section_title ?></h2>
            </div>

          </div>
        </div>
      <?php } else {
        // pass through
      } ?>

      <div class="row">

      <?php if ( $no_gutters ) { ?>

      <div class="card-group mb-<?php echo $gap; ?> no-gutters">

    <?php } else { ?>
      <div class="card-group mb-<?php echo $gap; ?>">
    <?php } ?>


      <?php if ( have_rows( 'assemble_card' ) ) :

      while ( have_rows( 'assemble_card' ) ) : the_row();

        // This was made more complicated to add options for appearance.

        // vars
        $card_title = get_sub_field( 'card_title' );
        $card_text = get_sub_field( 'card_text' );
        $image = get_sub_field( 'card_image' );
        $over_image = get_sub_field( 'over_image' );
        $text_color = get_sub_field( 'text_color' );

        //CTA Button
        $toggle = get_sub_field( 'button_toggle' );
        $button = get_sub_field( 'button_name' );
        $type = get_sub_field( 'type' );
        $target = get_sub_field( 'target' );
        $internal = get_sub_field( 'internal_link' );
        $custom = get_sub_field( 'custom_link' );
        $style = get_sub_field( 'style' );



        ?>

        <div class="col-12 col-sm-6 col-lg d-flex flex-wrap">
          <div class="card">
            <div class="image-block">
              <?php if( ! empty($image) ) : { ?>
                <?php $pic = wp_get_attachment_image( $image, "secondary_image", false, $attr=array('class' => 'align-self-center card-image-top img-fluid')); ?>

                <?php if ($type == "internal") { // Title link to internal page
                  ?>
                  <a href="<?php echo $internal; ?>" target="<?php echo $target; ?>">
                    <?php echo $pic; ?></a>

                <?php } elseif ( $type == "custom" ) { // Title link to external page
                  ?>

                  <a href="<?php echo $custom; ?>" target="<?php echo $target; ?>">
                    <?php echo $pic; ?></a>

                <?php } else { // No link
                  echo $pic;
                } ?>

              <?php } else :  // with no image display placeholder ?>
                <img class="card-img-top" src="holder.js/600x200">
              <?php endif; ?>

              <?php if ( $over_image ) {
                // add card header text here ?>
                <header>
                  <h3 class="card-title over-image checkScrollHeightOverflow" style="color: <?= $text_color ?>;">
                    <?php echo $card_title ?>
                  </h3>
                </header>

              <?php } else {
                // text heading appears below image
              } ?>

            </div>



            <div class="card-block">

              <?php if ( ! $over_image ) { ?>
                <?php if ($type == "internal") { // Title link to internal page
                  ?>
                  <header>
                    <h3 class="card-title text-center checkScrollHeightOverflow">
                      <a href="<?php echo $internal; ?>" target="<?php echo $target; ?>">
                        <?php echo $card_title ?></a>
                    </h3>
                  </header>
                <?php } elseif ( $type == "custom" ) { // Title link to external page
                  ?>
                  <header>
                    <h3 class="card-title text-center checkScrollHeightOverflow">
                      <a href="<?php echo $custom; ?>" target="<?php echo $target; ?>">
                        <?php echo $card_title ?></a>
                    </h3>
                  </header>
                <?php } else { // No link
                  ?>
                  <header>
                    <h3 class="card-title text-center checkScrollHeightOverflow">
                      <?php echo $card_title ?>
                    </h3>
                  </header>
                <?php } ?>
              <?php } else {
                // Heading appears on top of image
              } ?>

              <div class="card-summary card-text">
                <p class=""><?php echo $card_text ?></p>
              </div>

            </div> <!-- /.card-block -->
            <footer class="d-flex justify-content-end align-self-end">

                  <?php if ( $toggle ) {
                    if ($button) { // display linked button

                      if ($type == "internal") { ?>

                        <a class="<?php echo $style; ?> internal" href="<?php echo $internal; ?>"
                           role="button" target="<?php echo $target; ?>"><?php echo $button; ?></a>

                      <?php } elseif ($type == "custom") { ?>

                        <a class="<?php echo $style; ?> external" href="<?php echo $custom; ?>"
                           role="button" target="<?php echo $target; ?>"><?php echo $button; ?></a>

                      <?php } else {
                        // no link
                      }
                    } else {
                      // no button
                    }
                  } else {
                    // toggle off
                  } ?>

              </footer>
          </div> <!-- .card -->
        </div> <!-- /.col -->

      <?php  endwhile; ?>
      </div> <!-- .card-group -->
      </div> <!-- .row -->

    <?php else : ?>
      <?php // no rows found ?>
    <?php endif; // assemble_card ?>

