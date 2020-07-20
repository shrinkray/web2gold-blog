<?php $slider = $this->sliderContent(); ?>

<div class="jumbotron">
  <div class="jumbo container">



    <?php if ( $slider['image'] ) : ?>
      <h2 class="text-center"><?= $slider['image']; ?> </h2>
    <?php endif; ?>

    <?php if ( $slider['heading'] ) : ?>
      <h2 class="display-4 text-center"><?= $slider['heading']; ?> </h2>
    <?php endif; ?>

    <div id="<?= $slider['ID']; ?>" class="slider-wrap">

      <ul class="slider list-unstyled" role="listbox">
        <?php foreach ( $slider['slides'] as $slide ) : ?>
          <li class="d-flex carousel-item">

            <img class="img-fluid d-md-block align-self-center" src="<?= $slide['url']; ?>" alt="<?= $slide['alt']; ?>">

            <div class="carousel-caption <?= $slide['location'] ?> <?= $slide['height'] ?> d-md-block align-self-center">

              <img class="slider-logo m-auto img-fluid" src="<?=
              get_template_directory_uri(); ?>" alt="" >

              <?php if ( $slide['title'] ) : ?>
                <h2 class="display-5 pt-2"><?= $slide['title']; ?> </h2>
              <?php endif; ?>



              <?php if ( $slide['lead'] ) : ?>
                <p class="lead"><?= $slide['lead']; ?></p>
              <?php endif; ?>

              <?php if ( $slide['content'] ): ?>

                <div class="slide-content">
                  <?= $slide['content']; ?>
                </div>
              <?php endif; ?>

              <?php if ( $slide['button'] ) : ?>
                <p class="lead">
                  <?= $slide['button']; ?>
                </p>
              <?php endif; ?>
            </div>

          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

</div>
