<?php

if ( have_rows( 'content_sections' ) ): ?>
  <?php while ( have_rows( 'content_sections' ) ) : the_row(); ?>


   <?php //  LEFT CTA ROW ?>

    <?php if ( get_row_layout() == 'layout_cta_left_optin' ) :

      include "modules/left-optin.php";

      ?>



     <?php // RIGHT CTA ROW ?>

    <?php elseif ( get_row_layout() == 'layout_cta_right_optin' ) :

      include "modules/right-optin.php";

      ?>


     <?php // FULL-WIDTH BLOCK ?>


    <?php elseif ( get_row_layout() == 'standard_block' ) :

      include "modules/standard-block.php";

      ?>


      <?php // CARD BUILDER ROW ?>

    <?php elseif ( get_row_layout() == 'card_builder' ) :

      include "modules/card-builder.php";

     ?>


      <!--    POSTS BUILDER ROW Secondary    -->

    <?php elseif ( get_row_layout() == 'post_builder' ) :

      include "modules/posts-builder.php";

     ?>



      <?php
    endif; // last if layout
  endwhile; // big loop ?>
<?php else: ?>
  <?php // no layouts found ?>
<?php endif; // content_section


