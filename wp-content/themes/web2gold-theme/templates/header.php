<?php
  //vars
  $tdc_header = 'tdc-header';
  $top_image = get_field('default_image', 'option');
  $image = get_field( 'background_image', 'option' );
  $pic =  wp_get_attachment_image($image, 'full', false, $attr=array('class' => 'img-fluid d-flex mx-auto'));
  $alt = get_field( 'image_alt_attr', 'option' );
  $url = site_url();
?>

<header class="header">

  <div class="static-header">
    <?php
    /**
     * Removed custom_logo function implementation because the site design has a flattened banner
     * This is set as the logo instead. Check version control for the previous layout.
     */
    ?>

    <a href="<?php echo $url; ?>" title="<?php bloginfo(); ?>"><?php  echo $pic; ?></a>


    <!-- Top Bar -->
    <nav id="anchored" class="topmenu">


      <?php // This displays social media items added from Customizer interface. We're not implementing this now
      use Roots\Sage\Controllers\Navigation;
      $social_args = Navigation\social_nav( 'stack square brand' );

    //  Removed code that added an optional row of elements to header   ?>

      <div class="container d-flex justify-content-end align-items-center">

        <?php if ( has_nav_menu( 'social_navigation' ) ) : ?>
          <div class="social-nav-wrap">
            <nav class="social-nav">
              <?php //wp_nav_menu( $social_args ); ?> <!-- Displays contents of Social Media Menu -->
            </nav>
          </div>
        <?php endif; ?>
      </div>
    </nav>
    <!-- End Top Bar -->



  </div><!-- /.static-header -->

  <!-- Navigation Row -->
  <div class="main-nav">
    <div class="container">
      <?php if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('primary_navigation') ) : ?>
        <?php wp_nav_menu( ['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav ml-auto d-flex flex-wrap'] ); ?>

      <?php else: ?>
        <nav class="navbar navbar-toggleable-md">
          <button class="navbar-toggler navbar-inverse navbar-toggler-right " type="button" data-toggle="collapse"
                  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon ml-auto"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav ml-auto d-flex flex-wrap']);
            endif; ?>
          </div><!-- #site-navigation -->
        </nav>
      <?php endif; ?>
    </div>
  </div>
</header>
