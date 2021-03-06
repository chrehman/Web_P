<?php
session_start();
if(isset($_SESSION['login'])){
    if($_SESSION["login"]===true){
        $_SESSION["login"]=true;
    } else {
        $_SESSION["login"]=false;
    }


} else {
    $_SESSION["login"]=false;

}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hidayah Portal</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
          .specialLi{
            color: aliceblue;
            text-shadow: 3px 3px 8px black,3px 3px 8px snow;
          }
          .specialLii{
            text-shadow: 2px 2px 8px snow,2px 2px 8px black;
          }
          .mcase,.abbey{
            width: 100%;
            height: 420px;
          }

          ::-webkit-scrollbar {
            width: 10px;
          }


          ::-webkit-scrollbar-track {
            background: #f1f1f1;
          }


          ::-webkit-scrollbar-thumb {
            background: #167AC6;
          }


          ::-webkit-scrollbar-thumb:hover {
            background: #024EAF;
          }

          .dropdown{
            position: relative;
          }
          .dropdown-content {
            display: none;
            position: absolute;
            left: 10px;
            background-color: rgba(128,128,128,0.4);
            min-width: 120px;
            /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
            z-index: 1;
          }

          .dropdown-content a {
            text-align: center;
            color: aliceblue;
            text-shadow: 3px 3px 8px black,3px 3px 8px snow;
            padding: 10px 0px;
            text-decoration: none;
            display: block;
          }

          .dropdown-content a:hover {background-color: #f1f1f1}

          .dropdown:hover .dropdown-content {
            display: block;
          }

          .dropdown:hover .dropbtn {
            background-color: #3e8e41;
          }
          .button9248 {
          	display: inline-block;
          	border-radius: 3px;
          	background-color: royalblue;
          	border: none;
          	color: #FFFFFF;
          	text-align: center;
          	font-size: 16px;
          	padding: 8px 20px;
          	transition: all 0.5s;
          	cursor: pointer;
          	margin: 8px 0px;
          }
          .pls{
          	text-shadow: 0px 0px 2px dodgerblue;
           }
          .button9248 .pls {
          	cursor: pointer;
          	display: inline-block;
          	position: relative;
          	transition: 0.5s;
          }

          .button9248 .pls:before {
          	content: '\00BB';
          	position: absolute;
          	opacity: 0;
          	top: 0;
          	right: -20px;
          	transition: 0.5s;
          }

          .button9248:hover .pls {
          	padding-right: 25px;
          }

          .button9248:hover .pls:before {
          	opacity: 1;
          	right: 0;
          }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger specialLi" href="./From/SignUp.php">Sign Up</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger specialLi" href="./Quran/Quran.html">Quran</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger specialLi" href="./hadith.html">Hadith</a></li>
                        <li class="nav-item">
                          <div class="dropdown">
                          <span class="nav-link js-scroll-trigger specialLi">Vidoes</span>
                          <div class="dropdown-content">
                          <a class="" href="Videos/Video.html">Quran</a>
                          <a class="" href="hidayah/hidyah.html">Hidayah</a>
                          <a class="" href="nasheed/nasheed.html">Nasheed</a>

                          </div>
                          </div>
                        </li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger specialLi" href="./product/index1.php ">Products</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger specialLi" href="./From/SignIn.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger specialLi" target="blank" href="./Quran/AboutUs.html">About us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container d-flex h-100 align-items-center">
                <div class="mx-auto text-center">
                    <h1 class="mx-auto my-0 text-uppercase specialLii">Hidayah Portal</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5 specialLi">And hold firmly to the rope of Allah all together and do not become divided.[3:103]</h2>
                    <a class="btn btn-primary js-scroll-trigger " href="#about">Get Started</a>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container">
                <div class="row">
                  <div class="col-lg-8 mx-auto">
                      <h2 class="text-white mb-4">Our Mission</h2>
                      <p class="text-white-50">
                          "Invite to the way of your Lord with wisdom and good instruction, and argue with them in a way that is best. Indeed, your Lord is most knowing of who has strayed from His way, and He is most knowing of who is [rightly] guided."[16:125]
                      </p>
                  </div>
                </div>

            </div>
        </section>
        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
            <div class="container">
                <!-- Featured Project Row-->
                <div class="row align-items-center no-gutters mb-4 mb-lg-5">

                    <div class="col-xl-8 col-lg-7"><a href="./Quran/Quran.html"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/Quran.jpg" alt="" /></a></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Quran</h4>
                            <p class="text-black-50 mb-0">Quran is the Light of guidance for all mankind containing 144 Surahs and a total of 30 Juz.This section Deal with Quranic chapters and their urdu trasnlation</p>
                            <form action="./Quran/Quran.html">
                                <button class="button9248" style="vertical-align:middle"><span class="pls">GoTo Page </span></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                    <div class="col-xl-8 col-lg-7"><a href="./hadith.html"><img class="img-fluid mb-3 mb-lg-0 mcase" src="assets/img/Hadith.jpg" alt="" /></a></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Hadith</h4>
                            <p class="text-black-50 mb-0">"But when he, the Spirit of truth, comes, he will guide you into all the truth. He will not speak on his own; he will speak only what he hears, and he will tell you what is yet to come" Bible-John[16:13]. <br> The saying of Prophet Muhammad(pbuh) are the Ahadiths. They are vital to understand Islam and to have detail about its teachings.</p>
                            <form action="./hadith.html">
                                <button class="button9248" style="vertical-align:middle"><span class="pls">GoTo Page </span></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                    <div class="col-xl-8 col-lg-7"><a href="./videos/Video.html"><img class="img-fluid mb-3 mb-lg-0 abbey" src="assets/img/Videos.jpg" alt="" /></a></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Videos</h4>
                            <p class="text-black-50 mb-0">In this day and age the mainstream prefers to watch videos rather than to read books so this a curcial section which provides Motivational Videos, Naats & Nasheeds, and Quran lectures</p>
                            <form action="./videos/Video.html">
                                <button class="button9248" style="vertical-align:middle"><span class="pls">GoTo Page </span></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                    <div class="col-xl-8 col-lg-7"><a href="./product/index1.php"><img class="img-fluid mb-3 mb-lg-0 abbey" src="Products.jpg" alt="" /></a></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Products</h4>
                            <p class="text-black-50 mb-0">This section contains products that Muslims use in their daily life like Prayer Mat,Counters,Cap and, few more.</p>
                            <form action="./product/index1.php">
                                <button class="button9248" style="vertical-align:middle"><span class="pls">GoTo Page </span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Signup-->
        <section class="signup-section" id="signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                   "By time"[103,1]
                    "Indeed, mankind is in loss"[103,2]
                    "Except for those who have believed and done righteous deeds and advised each other to truth and advised each other to patience."[103,3]
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact -->
        <section class="contact-section bg-black">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">COMSATS University Islamabad</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50"><a href="mailto:chrehman1998@gmail.com">chrehman1998@gmail.com</a></div>
                                <div class="small text-black-50"><a href="mailto:ch.arham1220@gmail.com">ch.arham1220@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">+92 3xxx6701xx</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container">Copyright © All Rights Reserved</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
