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
                    <h1 style="color: white">Ray tracing from scratch</h1>
                    <div class="main-subtitle-bottom on-dark mt-4">Python, Computer Graphics</div>
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
            <a class="col-md-4" href="https://github.com/selimbat/bubble_beam" target="_blank">
                <img src="img/logos/d9.png">
            </a>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="services-box-2 text-left" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
                    <h6 class="mt-4">Project description</h6>
                    <p class="mt-3">
                        I started this project some years ago, when I didn't even know what I was really doing and without
                        any idea about what I was going to end up with. In april 2019, I decided to dust the whole thing and
                        started over. And that's how I ended up having this little rendering program that only uses basic Python
                        libraries and the magic of linear algebra.
                    </p>
                    <p class="mt-3">
                        The idea is to defines some basic objects like cameras, rays, lights, scenes and scene objects and implement
                        functions to determine where should a ray intersect an object and how should it reflect (I didn't
                        handle the case of refraction here). For my case, I only implemented this for spheres but the same
                        can be done for other simple solids. I then used the <a target="_blank" href="https://en.wikipedia.org/wiki/Phong_shading">
                        Phong shading</a> to build up the final image pixel by pixel
                    </p>
                    <h6 class="mt-4">Future enhancements</h6>
                    <p class="mt-3">
                        This small rendering pipeline, even fully functional, has a major flaw : its processing time per image!
                        The amount of calculus necessary to render even one pixel does a lot heavy operations like vector
                        normalization and the whole thing is done on the CPU (lol) since I didn't know how to use my GPU at the
                        time. Two ways of optimizing the process could parallelizing, using the GPU and lighten the normalization
                        operation by using an <a target="_blank" href="https://en.wikipedia.org/wiki/Fast_inverse_square_root">approximation
                        of the inverse square root</a>.
                    </p>
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
                    <a href="./wolpAIre.php"><div class="left-nav" data-scroll-reveal="enter left move 60px over 0.7s after 0.1s">old<div class="text-on-hover">older project</div></div></a>
                    <a href="./feerik-internship.php"><div class="right-nav" data-scroll-reveal="enter right move 60px over 0.7s after 0.1s">new<div class="text-on-hover">new project</div></div></a>
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
