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
                    <h1 style="color: white">WolpAIre, an AI for a turn-based strategy game</h1>
                    <div class="main-subtitle-bottom on-dark mt-4">Artificial Intelligence</div>
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
            <a class="col-md-4" href="https://github.com/wolvampire/wolpAIre" target="_blank">
                <img src="img/logos/d9.png">
            </a>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="services-box-2 text-left" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
                    <h6 class="mt-4">Project description</h6>
                    <p class="mt-3">
                        This project took place during my AI course at CentraleSupélec in a <strong>team</strong> of five.
                        We had to come up with an <strong>AI that plays a turn based strategy game</strong> designed by
                        our professor and implement a communication system to exchange information with the professor's
                        server that hosted the game. The conditions were <strong>to consider the enemy's possible future
                        moves</strong>, ideally using the <a target="_blank" href="https://en.wikipedia.org/wiki/Alpha%E2%80%93beta_pruning">
                        alpha-beta pruning</a>, and computing and giving an answer to the server within <strong>2 seconds
                        each turn</strong>. This time limit was really challenging and it oriented our AI design a lot.
                        A tournament took place for the final test and students confronted their AIs for the title of
                        Almighty AI.
                    </p>
                    <h6 class="mt-4">Game rules</h6>
                    <p class="mt-3">
                        The game opposes werewolves to vampires. <strong>The winner is the last specie alive</strong>.
                        The board is a grid of <strong>any possible size</strong> and a tile can carry <strong>any number
                        of creatures</strong> as long as they are of the same species. Each player can move
                        <strong>as many of their creatures as they want</strong> on as <strong>many</strong> of the 8
                        adjacent tiles as they like (diagonally, vertically and horizontally). At the beginning of the game, some
                        tiles carry human units that can be <strong>converted</strong> if attacked by player units. Without going in the
                        details, he output of a confrontation between the two players or a player and a human tile is
                        decided randomly by the server, with the greater victory chance for the more numerous creature.
                    </p>
                    <h6 class="mt-4">Our approach</h6>
                    <p class="mt-3">
                        We started by playing the game ourselves to gain better knowledge about its rules and quickly
                        implemented a <strong>greedy</strong> algorithm and a <strong>local game server</strong> with
                        all the rules to try our little AIs. Our first goal was to try and do better than the greedy
                        algorithm, which turned out to be not that simple. We knew that going with the classic
                        <a target="_blank" href="https://en.wikipedia.org/wiki/Minimax">minimax algorithm</a> wouldn't
                        be a great idea because of the huge number of possible movements of each player (9 to the power n for each
                        allied tile of n units). We had to narrow down these possibilities and started thinking in terms
                        of possible paths and targets instead of possible movements.
                    </p>
                    <p class="mt-3">
                        From that idea, we experimented with different approaches within my group so, for the sake of brevity,
                        I will only expose <a target="_blank" href="https://github.com/wolvampire/wolpAIre/blob/master/oracle.py">
                        the one I most contributed to</a>. In that approach, each node of the tree of possibilities represented
                        a scenario as follow (A for allies, E for enemies and H for humans):
                        <ul class="circle">
                            <li> A4 targets H2 with 4 units </li>
                            <li> A5 targets E1 with 5 units </li>
                            <li> E1 targets E4 with 1 units </li>
                            <li> E4 targets H3 with 4 units </li>
                        </ul>
                        The algorithm then simulates all the movements until there is a confrontation between units. It resolves
                        the confrontation with a simplistic non-random model that we decide (for example, if allies greater then
                        enemies then win) and continues recursively until one of the players wins.
                    </p>
                    <p class="mt-3">
                        This approach gave pretty good results after trying several heuristics and bug fixing. The down
                        side though was that it took way longer than 2 seconds to find out the best move to do.
                        So to counter that, we run some hundreds of games on our local server with different board sizes,
                        different numbers of human tiles and different maximum depths for our algorithm. With these collected data,
                        we could <strong>dynamically set the maximum depth for our algorithm</strong> no matter what situation we were in
                        to stay below the time limit of 2 seconds per turn. This turned out to be quite helpful since
                        the professor gave us the worst possible scenarios to stress-test our little fragile AIs.
                    </p>
                    <p class="mt-3">
                        Finally, if there are no human tiles left on the board, we adopt the simple strategy of gathering
                        all of our troops and attacking the enemy starting by their weakest tile.
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

<!-- Video block --------->

<div class="section padding-top-bottom background-white z-bigger-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h5>The AI in action<br>during the tournament:</h5>
                <p>
                    Here we can see the two players starting at on each side of a symmetrical board for even chances.
                    This board shows some of the traps that the AI must avoid. For example, the 9 human tiles close to their
                    starting positions could kill them if they fight it without enough units.
                </p>
            </div>
            <div class="col-lg-7 mt-4 mt-lg-0">
                <div class="video-section">
                    <figure class="youtube rounded-2 over-hide">
                        <a href="https://www.youtube.com/embed/gBLgrns4PuM">
                            <img src="img/selim/project-thumbnails/wolpAIre.jpg" alt="image" class="rounded-2 over-hide">
                        </a>
                    </figure>
                </div>
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
                    <a href="#" style="pointer-events: none; display: inline-block;"><div class="left-nav" data-scroll-reveal="enter left move 60px over 0.7s after 0.1s">old<div class="text-on-hover">older project</div></div></a>
                    <a href="./bubble-beam.php"><div class="right-nav" data-scroll-reveal="enter right move 60px over 0.7s after 0.1s">new<div class="text-on-hover">new project</div></div></a>
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
