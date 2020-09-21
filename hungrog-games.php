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
                    <h1 style="color: white">Roguelite multiplayer game</h1>
                    <div class="main-subtitle-bottom on-dark mt-4">Unity, OOP</div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

<!-- Block
================================================== -->

<div class="section padding-top-small padding-bottom-small background-white z-bigger-2">
    <div class="container">
        <div class="row justify-content-center">
            <a class="col-md-4" href="https://atchafalaya.itch.io/hungrog-games" target="_blank">
                <img src="img/logos/itch.png">
            </a>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="services-box-2 text-left" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
                    <h6 class="mt-4">Project description</h6>
                    <p class="mt-3">
                        For an advanced object-oriented programming course, I suggested to our professor to do a
                        video game project. Upon his agreement, I went to some other students to form a 
                        <strong>team of 3</strong>.
                        As the main restriction was that the project had to include some network aspect,
                        we decided to go for a multiplayer roguelite game.
                    </p>
                    <h6 class="mt-4">Game concept</h6>
                    <p class="mt-3">
                        The game starts with the different players, up to a maximum of four, 
                        spawning at different locations in a procedurally generated dungeon.
                        Then, players have to rush throught the dungeon to defeat enemies and gather the most 
                        upgrades they can to defeat other players when they encounter them.
                        Each dungeon room holds an upgrade protected by a monster. The upgrade is only available
                        when the monster who protects it dies.
                    </p>
                    <h6 class="mt-4">What I have worked on</h6>
                    <p class="mt-3">
                        We devided the tasks depending on everyone's preferences. As was interested in
                        the algorithmic aspect of the game, I volunteered to do the procedural generation of
                        the dungeon.<br>
                        The level is made of rooms of different sizes and lays on a 5x5 square grid where each tile
                        can be the center of a room. The algorithm starts with the room at the center of the level
                        and runs a random walk on each of the four directions and creates a room at each tile it walks on
                        until it reaches the side of the grid.<br>
                        This part done and working, I helped with some polish for the UI and created a sound manager 
                        to add some audio elements to the game.
                    </p>
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

<!-- Block
================================================== -->

<div class="section padding-bottom-big padding-top-small background-white z-bigger-2">
    <div class="container">
        <div class="row justify-content-start padding-bottom-smaller">
            <div class="col-md-4">
                <h5>Some results :</h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 mt-4 mt-lg-0">
                <img src="img/selim/projects/first%20reflection.png" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <img src="img/selim/projects/thee%20spheres%20reflection.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<!-- Nex Prev Block
================================================== -->

<div class="section padding-bottom background-white over-hide">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="project-nav-wrap">
                    <a href="#" style="pointer-events: none; display: inline-block;">
                        <div class="left-nav" data-scroll-reveal="enter left move 60px over 0.7s after 0.1s">
                            old<div class="text-on-hover">older project</div>
                        </div>
                    </a>
                    <a href="./wolpAIre.php">
                        <div class="right-nav" data-scroll-reveal="enter right move 60px over 0.7s after 0.1s">
                            new<div class="text-on-hover">new project</div>
                        </div>
                    </a>
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

<?php include_once(ROOT_DIR . '/footer.php'); ?>
