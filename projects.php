<?php include_once(__DIR__.'/config.php'); ?>
<?php include_once(ROOT_DIR.'/header.php'); ?>

<!-- Hero Block
================================================== -->

<div class="section padding-top-1st padding-bottom-1st over-hide">
  <div class="parallax" style="background-image: url('./img/selim/cgi-laser-balls.jpg')"></div>
  <div class="light-fade-over-2"></div>
  <div class="container z-bigger">
    <div class="row justify-content-center">
      <div class="col-md-7 parallax-fade-top">
        <div class="main-title on-dark text-center mb-0">
          <h2>My projects</h2>
          <div class="main-subtitle-bottom on-dark mt-4">You can browse through all my recent projects</div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>

<!-- Portfolio Block
================================================== -->

<div class="section padding-top-bottom background-white z-bigger-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="grid-filter">
          <ul class="filter">
            <li><a href="#" class="current" data-filter="*" title="">all</a></li>
            <li><a href="#" data-filter=".professional" title="">professional</a></li>
            <li><a href="#" data-filter=".personal" title="">personal</a></li>
            <li><a href="#" data-filter=".school" title="">school</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid px-4">
    <div class="row">
      <div class="grid-wraper clearfix">
          <?php include_once(ROOT_DIR . '/projects/thumbnails/bubble-beam-thumbnail.php'); ?>
          <?php include(ROOT_DIR . '/projects/thumbnails/project-thumbnail-template.php'); ?>
          <?php include(ROOT_DIR . '/projects/thumbnails/project-thumbnail-template.php'); ?>
          <?php include(ROOT_DIR . '/projects/thumbnails/project-thumbnail-template.php'); ?>
          <?php include(ROOT_DIR . '/projects/thumbnails/project-thumbnail-template.php'); ?>
          <?php include(ROOT_DIR . '/projects/thumbnails/project-thumbnail-template.php'); ?>
          <?php include(ROOT_DIR . '/projects/thumbnails/project-thumbnail-template.php'); ?>
          <?php include(ROOT_DIR . '/projects/thumbnails/project-thumbnail-template.php'); ?>
      </div>
    </div>
  </div>
</div>

<!-- Quotes Block
================================================== -->

<div class="section padding-bottom background-white">
  <div class="container">
    <div class="row justify-content-center" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
      <div class="col-md-8">
        <div class="quote-box-1 text-center">
          <h5 class="mb-5">"Design must reflect the practical and aesthetic in business but above all... good design must primarily serve people."</h5>
          <h4>Thomas J. Watson</h4>
          <p class="mt-2">some magazine</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Separator Line
================================================== -->

<div class="section padding-top-bottom-1 background-white">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="separator-wrap">
          <span class="separator"><span class="separator-line dashed"></span></span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Logos Block
================================================== -->

<div class="section padding-top-bottom-small background-white over-hide">
  <div class="container">
    <div class="row logos-wrap">
      <div class="col-md-2">
        <a href="#">
          <img  src="img/logos/d1.png" class="img-120 mx-auto" alt="" />
        </a>
      </div>
      <div class="col-md-2 mt-4 mt-md-0">
        <a href="#">
          <img  src="img/logos/d2.png" class="img-120 mx-auto" alt="" />
        </a>
      </div>
      <div class="col-md-2 mt-4 mt-md-0">
        <a href="#">
          <img  src="img/logos/d5.png" class="img-120 mx-auto" alt="" />
        </a>
      </div>
      <div class="col-md-2 mt-4 mt-md-0">
        <a href="#">
          <img  src="img/logos/d6.png" class="img-120 mx-auto" alt="" />
        </a>
      </div>
      <div class="col-md-2 mt-4 mt-md-0">
        <a href="#">
          <img  src="img/logos/d7.png" class="img-120 mx-auto" alt="" />
        </a>
      </div>
      <div class="col-md-2 mt-4 mt-md-0">
        <a href="#">
          <img  src="img/logos/d11.png" class="img-120 mx-auto" alt="" />
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Separator Line
================================================== -->

<div class="section padding-top-bottom-1 background-white">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="separator-wrap">
          <span class="separator"><span class="separator-line dashed"></span></span>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once(ROOT_DIR.'/footer.php'); ?>
