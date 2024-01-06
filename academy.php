<?php
session_start();
require_once('fonction.php');
require_once('fonctions/fnDB.php');
require_once('core/Model.php');

//UNE INSTANCE DU Model Pour l'interaction avec la Base de données
$db = new Model();
$pdo = $db->getPdo();

$formations = $db->getFormations();
$categories = $db->getCategories();
?>
<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Links of CSS files -->
        <link rel="stylesheet" href="assetss/css/bootstrap.min.css">
        <link rel="stylesheet" href="assetss/css/boxicons.min.css">
        <link rel="stylesheet" href="assetss/css/odometer.min.css">
        <link rel="stylesheet" href="assetss/css/nice-select.min.css">
        <link rel="stylesheet" href="assetss/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assetss/css/meanmenu.min.css">
        <link rel="stylesheet" href="assetss/css/magnific-popup.min.css">
        <link rel="stylesheet" href="assetss/css/style.css">
        <link rel="stylesheet" href="assetss/css/responsive.css">
        
        <title>Online Courses & Education Bootstrap Template</title>
        <link rel="icon" type="image/png" href="assetss/img/all-img/favicon.png">
    </head>
    <body>
        <!-- Start EduMim Navbar Area -->
        <div class="edu-navbar-area navbar-area edu-fixed-nav">
            <div class="edumim-responsive-nav">
                <div class="container">
                    <div class="edumim-responsive-menu">
                        <div class="logo">
                            <a href="index.html"><img src="assetss/img/logo/logo.svg" alt="logo"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="edumim-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.html"><img src="assetss/img/logo/logo.svg" alt="logo"></a>
                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="index.html" class="nav-link dropdown-toggle">Home</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="index.html" class="nav-link">Home One</a></li>
                                        <li class="nav-item"><a href="index2.html" class="nav-link">Home Two</a></li>
                                        <li class="nav-item"><a href="index3.html" class="nav-link">Home Three</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link dropdown-toggle">Pages</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="about.html" class="nav-link">About 1</a></li>
                                        <li class="nav-item"><a href="about2.html" class="nav-link">About 2</a></li>
                                        <li class="nav-item"><a href="instructor.html" class="nav-link">Instructor 1</a></li>
                                        <li class="nav-item"><a href="instructor2.html" class="nav-link">Instructor 2</a></li>
                                        <li class="nav-item"><a href="instructor-details.html" class="nav-link">Instructor Single</a></li>
                                        <li class="nav-item"><a href="event.html" class="nav-link">Event</a></li>
                                        <li class="nav-item"><a href="event-single.html" class="nav-link">Event Single</a></li>
                                        <li class="nav-item"><a href="error-404.html" class="nav-link">404 Error Page</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#" class="dropdown-toggle nav-link">Courses</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="courses.html" class="nav-link">Courses</a></li>
                                        <li class="nav-item"><a href="courses-sidebar.html" class="nav-link">Courses Sidebar</a></li>
                                        <li class="nav-item"><a href="single-course.html" class="nav-link">Single Courses</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#" class="dropdown-toggle nav-link">Blog</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                                        <li class="nav-item"><a href="blog-full.html" class="nav-link">Full Width</a></li>
                                        <li class="nav-item"><a href="blog-standard.html" class="nav-link">Blog Standard</a></li>
                                        <li class="nav-item"><a href="blog-single.html" class="nav-link">Single Blog</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                            </ul>
                        </div>
                        <div class="nav-btn">
                            <a href="#" class="default-btn">Start Free Trial</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End EduMim Navbar Area -->

        <!-- Start EduMim Page Title Area -->
        <section class="page-title-area item-bg1">
            <div class="container">
                <div class="page-title-content">
                    <h2>Formations</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Accueil</a></li>
                        <li class="breadcrumb-item"></li>
                        <li class="primery-link">Formations</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End EduMim Page Title Area -->

         <!-- Start EduMim Courses Area -->
         <div class="edu-courses-area pt-70 pb-100">
            <div class="container">
                <div class="edu-grid-sorting row align-items-center">
                    <div class="col-lg-6 col-md-7 result-count">
                        <a href="courses.html" class="courbtn"><i class='bx bx-grid-alt'></i></a>
                        <a href="courses2.html" class="courbtn active-courbtn"><i class='bx bx-list-ul'></i></a>
                        <p>Showing 12 Courses of 52</p>
                    </div>

                   
                    <div class="col-lg-6 col-md-5 ordering">
                        <div class="select-box">
                            <label></label>
                            <select id="categorie">
                                <option>Trier par catégorie</option>
                                <?php foreach($categories as $categorie){ ?>
                                <option value="<?php echo $categorie->categorie_id; ?>"><?php echo $categorie->categorie_nom; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="row justify-content-center">
                    
                    <?php foreach($formations as $formation){ ?>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <!--a href="formation-<?php echo $formation->formation_id; ?>-<?php echo slugify($formation->formation_titre); ?>.html" class="single-courses-link"-->
                        <a href="details-formation.php?id=<?php echo $formation->formation_id; ?>" class="single-courses-link">
                            <div class="single-courses-box02">
                                <div class="image">
                                    <img src="assetss/img/all-img/c1.png" alt="image">
                                </div>
                                <div class="content">
                                    <div class="content-herd">
                                        <span class="cr-price" ><?php echo number_format($formation->formation_prix, 0, ',', ' '); ?> <span style="color:gray;" class="badge badge-warning">FCFA</span></span>
                                        <ul class="ratings">
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                        </ul>
                                    </div>
                                    
                                    <h3><?php echo $formation->formation_titre; ?></h3>
                                    <ul class="cr-items" >
                                        <li><i class='bx bx-cogs'></i> <span><?php echo $formation->categorie_nom; ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>

                    <div class="section-button">
                        <a href="#" class="default-btn">Load More <i class='bx bx-revision'></i></a>
                    </div>
                </div>

            </div>
        </div>
        <!-- End EduMim Courses Area -->

        <!-- Start EduMim Footer Area -->
        <footer class="edu-footer-area">
            <div class="container">
                <div class="footer-top-area ptb-100">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <a href="index.html" class="logo">
                                    <img src="assetss/img/logo/footer-logo.svg" alt="image">
                                </a>
                                <p>Lorem ipsum amet, consectetur adipiscing elit. Suspendis varius enim eros elementum tristique. Duis cursus.</p>
                                <ul class="social-links">
                                    <li><a href="#" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                                    <li><a href="#" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                                    <li><a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                                    <li><a href="#" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="single-footer-widget pl-5">
                                <h3>Links</h3>
                                <ul class="links-list">
                                    <li><a href="services-details.html">Home</a></li>
                                    <li><a href="services-details.html">About Us</a></li>
                                    <li><a href="services-details.html">Pricing</a></li>
                                    <li><a href="services-details.html">Courses</a></li>
                                    <li><a href="services-details.html">Contact Us</a></li>
                                    <li><a href="services-details.html">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h3>Legal</h3>
                                <ul class="links-list">
                                    <li><a href="index.html">Legal</a></li>
                                    <li><a href="about.html">Tearms of Use</a></li>
                                    <li><a href="portfolio.html">Tearm & Condition</a></li>
                                    <li><a href="blog-grid.html">Payment Method</a></li>
                                    <li><a href="contact.html">Privacy Policy</a></li>
                                    <li><a href="contact.html">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h3>Newsletter</h3>
                                <div class="footer-newsletter-info">
                                    <p>Join over <span>68,000</span> people getting our emails Lorem ipsum dolor sit amet consectet </p>
                                    <form class="newsletter-form" data-toggle="validator">
                                        <label><i class='bx bx-envelope-open'></i></label>
                                        <input type="text" class="input-newsletter" placeholder="Enter your email address" name="EMAIL" required autocomplete="off">
                                        <button type="submit" class="default-btn"><i class='bx bx-paper-plane'></i> Subscribe Now</button>
                                        <div id="validator-newsletter" class="form-result"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pr-line"></div>
                <div class="footer-bottom-area">
                    <p>© Copyright 2023 | <a href="#" target="_blank">Edumim Template</a>  | All Rights Reserved is Proudly </p>
                </div>
            </div>
        </footer>
        <!-- End EduMim Footer Area -->
        <div class="go-top active">
            <i class="bx bx-up-arrow-alt"></i>
        </div>

        <!-- Links of JS files -->
        <script src="assetss/js/jquery.min.js"></script>
        <script src="assetss/js/bootstrap.min.js"></script>
        <script src="assetss/js/magnific-popup.min.js"></script>
        <script src="assetss/js/nice-select.min.js"></script>
        <script src="assetss/js/jquery.mixitup.min.js"></script>
        <script src="assetss/js/appear.min.js"></script>
        <script src="assetss/js/sticky-sidebar.min.js"></script>
        <script src="assetss/js/odometer.min.js"></script>
        <script src="assetss/js/owl.carousel.min.js"></script>
        <script src="assetss/js/meanmenu.min.js"></script>
        <script src="assetss/js/wow.min.js"></script>
        <script src="assetss/js/main.js"></script>
    </body>
</html>