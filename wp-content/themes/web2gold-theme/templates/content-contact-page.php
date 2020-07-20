<?php

/**
 * Build for Contact Us for a centered eight column page. Add multiple rows.
 * Originally thought to have more pieces to it. Construction was
 * more complicated than necessary.
 */

if ( have_rows( 'contact_us_page_column_layouts' ) ):  ?>
  <?php while ( have_rows( 'contact_us_page_column_layouts' ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'row_layout' ) : ?>
      <?php if ( have_rows( 'column_layouts' ) ) : ?>

        <div class="row mb-4 d-flex justify-content-center">

          <?php while ( have_rows( 'column_layouts' ) ) : the_row();

            // vars
            $editor = get_sub_field( 'wysiwyg_editor' );

          ?>

            <div class="col-12  col-md-8 ">
              <?php echo $editor; ?>
            </div>

          <?php endwhile; ?>

        </div> <!-- /.row -->

      <?php else : ?>
        <?php // no rows found ?>
      <?php endif; ?>
    <?php endif; ?>
  <?php endwhile; ?>
<?php else: ?>
  <?php // no layouts found ?>
<?php endif; 