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
          <?php include_once(ROOT_DIR . '/projects/thumbnails/mux104.php'); ?>
          <?php include_once(ROOT_DIR . '/projects/thumbnails/mux205.php'); ?>
          <?php include_once(ROOT_DIR . '/projects/thumbnails/3d-engine-thumbnail.php'); ?>
          <?php include_once(ROOT_DIR . '/projects/thumbnails/gmtk-game-jam-thumbnail.php'); ?>
          <?php include_once(ROOT_DIR . '/projects/thumbnails/feerik-internship-thumbnail.php'); ?>
          <?php include_once(ROOT_DIR . '/projects/thumbnails/bubble-beam-thumbnail.php'); ?>
          <?php include_once(ROOT_DIR . '/projects/thumbnails/wolpAIre-thumbnail.php'); ?>
          <?php include_once(ROOT_DIR . '/projects/thumbnails/hungrog-games-thumbnail.php'); ?>
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
