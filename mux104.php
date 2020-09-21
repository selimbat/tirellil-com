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
                    <h1 style="color: white">Ray marching voxel engine</h1>
                    <div class="main-subtitle-bottom on-dark mt-4">Processing, GLSL, Computer Graphics</div>
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
            <a class="col-md-4" href="https://github.com/selimbat/r_dodeca_vox_builder" target="_blank">
                <img src="img/logos/d9.png">
            </a>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="services-box-2 text-left" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
                    <h6 class="mt-4">Context</h6>
                    <p class="mt-3">
                        During the first year after my graduation, I enrolled in some online courses at the <a target="_blank" href="https://www.cnam.fr"/>CNAM intitute</a>. This project is my final submission for the "Image synthesis and virtual reality" course.
                    </p>
                    <h6 class="mt-4">Project description</h6>
                    <p class="mt-3">
                        This project is an implementation of a <strong>ray-marching algorithm</strong>. It revolves around the fact that <a href="https://en.wikipedia.org/wiki/Rhombic_dodecahedron" target="_blank">
                        the rhombic dodecahedron</a> can tessalate the Euclidean space. The elementary brick of this 
                        engine, the voxel, thus takes the shape of a rhombic dodecahedron and can be placed at integer coordinates on a grid of the same shape.
                    </p>
                    <p class="mt-3">
                        In this project, the entire scene is rendered on a rectangle of the size of the
                        window and to which we attach a <a href="https://fr.wikipedia.org/wiki/Shader#Fragment_shaders_ou_Pixel_shaders" target="_blank">fragment shader</a> that will take care of calculating the color of each pixel according to the ray-marching algorithm.
                    </p>
                    <p class="mt-3">
                        For a given pixel and once all the data is linked to the shader, the algorithm simulates a ray starting at the position of the camera and oriented in the direction of the pixel to be rendered and runs through the scene in several iterations. At each iteration, it computes the distance scene and progresses along the ray by that distance according to the ray direction. When the distance becomes smaller than a certain threshold, it means that the ray found a surface of the scene. It then calculates the output color of the given pixel.
                    </p>
                    <p class="mt-3">
                        Given a function that returns, for a point in space, the distance to the scene, this algorithms is able to output a complex rendering of the scene. Furthermore, by differentiating the distance function, it can access the gradient, i.e. the normal, at each point in space, wich is very useful in shading and ligthing calculations.
                    </p>
                    <h6 class="mt-4">Limits and possible enhancements</h6>
                    <p class="mt-3">
                        A limitation of this algorithm compared to its cousins that rely on stochastic methods such as path tracing is that it simulates only certain rays of light and therefore misses on effects such as light bouncing off surfaces, global illumination or caustics caused by transparent matter.
                    </p>
                    <p class="mt-3">
                        To impove this engine, it would be possible to add reflections, transparency in materials, a real skybox to highlight the reflection, a more fluid camera movement as well as a better user interaction for adding and removing voxels.
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
                <h5>Some structures:</h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 mt-4 mt-lg-0">
                <img src="img/selim/projects/dodeca1.PNG" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <img src="img/selim/projects/dodeca2.PNG" alt="" class="img-fluid">
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
                    <a href="./mux205.php"><div class="left-nav" data-scroll-reveal="enter left move 60px over 0.7s after 0.1s">old<div class="text-on-hover">older project</div></div></a>
                    <a href="#" style="pointer-events: none; display: inline-block;"><div class="right-nav" data-scroll-reveal="enter right move 60px over 0.7s after 0.1s">new<div class="text-on-hover">new project</div></div></a>
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
