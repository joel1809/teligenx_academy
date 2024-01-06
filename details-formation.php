<?php
session_start();
require_once('fonction.php');
require_once('fonctions/fnDB.php');
require_once('core/Model.php');

//UNE INSTANCE DU Model Pour l'interaction avec la Base de données
$db = new Model();
$pdo = $db->getPdo();

$formation_id = intval($_GET['id']);
$formation = $db->getFormation($formation_id);
$autres_formations = $db->getFormationsByCategorie($formation->categorie_id);
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

        <!-- jQuery (obligatoire pour Bootstrap) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <!-- Popper.js (obligatoire pour Bootstrap) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <!-- Liens vers les fichiers CSS et JavaScript de Toastr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <script>
        $(document).ready(function() {
            
            toastr.options = {
				'closeButton': true,
				'debug': false,
				'newestOnTop': false,
				'progressBar': false,
				'positionClass': 'toast-top-right',
				'preventDuplicates': false,
				'showDuration': '1000',
				'hideDuration': '1000',
				'timeOut': '5000',
				'extendedTimeOut': '1000',
				'showEasing': 'swing',
				'hideEasing': 'linear',
				'showMethod': 'fadeIn',
				'hideMethod': 'fadeOut',
			}

            // Attacher un gestionnaire d'événement au formulaire
            $('#form_inscription').submit(function(event) {
                // Empêcher le comportement par défaut du formulaire
                event.preventDefault();

                // Envoyer les données au serveur via Ajax
                $.ajax({
                    type: 'POST',
                    url: $('#form_inscription').attr('action'),
                    data: $('#form_inscription').serialize(),
                    success: function(response) {
                        // Traiter la réponse du serveur en cas de succès
                        console.log(response);
                        //toastr.success('Inscription effectuée avec succès!');
                        alert("Inscription effectuée avec succès !");
                        location.href = '';
                        
                        $('#modalInscription').modal('hide');

                    },
                    error: function(error) {
                        // Traiter les erreurs
                        alert('Erreur lors de l\'inscription, veuillez reéssayer svp');

                        console.error('Erreur lors de l\'envoi des données :', error);
                    }
                });
            });
        });
        </script>

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
                    <h2><?php echo $formation->categorie_nom; ?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="academy">Formations</a></li>
                        <li class="breadcrumb-item"></li>
                        <li class="primery-link">Détails de la formation</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End EduMim Page Title Area -->

        <!-- Start Edu Single Course Area -->
        <div class="single-course-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="single-course-desc">
                            <div class="single-course-image">
                                <img src="assetss/img/all-img/single-course-thumb.png" alt="image">
                            </div>
                            <div class="single-course-content">
                                <p class="course-catgy"><?php echo $formation->categorie_nom; ?></p>
                                <h2><?php echo $formation->formation_titre; ?></h2>

                                <div class="user-details">
                                    <img src="assetss/img/all-img/author-1.png" alt="image">
                                    <p><span>Du :</span> <a href="#"><?php echo $formation->formation_date_debut; ?></a></p>
                                    <p class="course-date"><span>Au:</span> <a href="#"><?php echo $formation->formation_date_fin; ?></a></p>
                                </div>
                            </div>
                            <div class="course-tabs">
                                <nav>
                                    <div class="nav course-nav" id="nav-tab" role="tablist">
                                        <button class="course-link active" id="nav-overview-tab" data-bs-toggle="tab" data-bs-target="#nav-overview" type="button" role="tab" aria-controls="nav-overview" aria-selected="true">Description</button>
                                        <button class=" course-link" id="nav-instructor-tab" data-bs-toggle="tab" data-bs-target="#nav-instructor" type="button" role="tab" aria-controls="nav-instructor" aria-selected="false">Le formateur</button>
                                    </div>
                                </nav>
                                <div class="single-course-tab" id="nav-tabContent">
                                    <div class="overview-panel fade active show" id="nav-overview" role="tabpanel" aria-labelledby="nav-overview-tab">
                                        <div class="overview-content cmb-30">
                                            <!--h3 class="course-desc-heading">Description de la formation</h3-->
                                            <p><?php echo $formation->formation_description; ?></p>
                                        </div>
                                        <!--div class="overview-otp cmb-30">
                                            <h3 class="course-desc-heading">What You will Learn?</h3>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <div class="course-single-otp">
                                                        <img src="assetss/img/icon/ck.svg" alt="icon">
                                                        <p>Learn how perspective works and how to incorporate your art</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <div class="course-single-otp">
                                                        <img src="assetss/img/icon/ck.svg" alt="icon">
                                                        <p>Learn how perspective works and how to incorporate your art</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <div class="course-single-otp">
                                                        <img src="assetss/img/icon/ck.svg" alt="icon">
                                                        <p>Learn how perspective works and how to incorporate your art</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <div class="course-single-otp">
                                                        <img src="assetss/img/icon/ck.svg" alt="icon">
                                                        <p>Learn how perspective works and how to incorporate your art</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div-->
                                        
                                    </div>
                                    <div class="instructor-panel fade" id="nav-instructor" role="tabpanel" aria-labelledby="nav-instructor-tab">
                                        <div class="single-instructor-content">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="instructor-img">
                                                        <img src="assetss/<?php echo $formation->formateur_photo ; ?>" alt="image">
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="single-instructor-info">
                                                        <h2><?php echo $formation->formateur_nom . ' ' . $formation->formateur_prenoms ; ?></h2>
                                                        <p class="sub-title" ><?php echo $formation->formateur_specialite ; ?></p>
                                                        <ul>
                                                            <li><img src="assetss/img/icon/star.svg" alt="icon"><?php echo $formation->formateur_experience ; ?> <span> ans d'expérience</span> </li>
                                                            <!--li><img src="assetss/img/icon/file2.svg" alt="icon"> <span>65+ formations</span> </li-->
                                                        </ul>
                                                        <ul class="social-links">
                                                            <li><a href="#"><img src="assetss/img/social/fb.svg" alt="icon"></a></li>
                                                            <li><a href="#"><img src="assetss/img/social/ln.svg" alt="icon"></a></li>
                                                            <li><a href="#"><img src="assetss/img/social/twiiter.svg" alt="icon"></a></li>
                                                            <li><a href="#"><img src="assetss/img/social/instra.svg" alt="icon"></a></li>
                                                            <li><a href="#"><img src="assetss/img/social/youtube.svg" alt="icon"></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-instructor-desc">
                                                <p><?php echo $formation->formateur_presentation; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reviews-panel fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                                        <div class="lesseon-review-section">
                                            <div class="student-reating">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-6">
                                                        <div class="lession-review-items">
                                                            <ul>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star disstar"></i></li>
                                                                <li><i class="bx bxs-star disstar"></i></li>
                                                            </ul>
                                                            <div class="progress-section">
                                                                <div class="progress">
                                                                    <div class="progress-bar psc02" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="67" style="max-width: 67%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-title">
                                                                <span class="title">67%</span>
                                                            </div>
                                                        </div>
                                                        <div class="lession-review-items">
                                                            <ul>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star disstar"></i></li>
                                                                <li><i class="bx bxs-star disstar"></i></li>
                                                            </ul>
                                                            <div class="progress-section">
                                                                <div class="progress">
                                                                    <div class="progress-bar psc02" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="67" style="max-width: 67%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-title">
                                                                <span class="title">67%</span>
                                                            </div>
                                                        </div>
                                                        <div class="lession-review-items">
                                                            <ul>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star disstar"></i></li>
                                                                <li><i class="bx bxs-star disstar"></i></li>
                                                            </ul>
                                                            <div class="progress-section">
                                                                <div class="progress">
                                                                    <div class="progress-bar psc02" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="67" style="max-width: 67%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-title">
                                                                <span class="title">67%</span>
                                                            </div>
                                                        </div>
                                                        <div class="lession-review-items">
                                                            <ul>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star disstar"></i></li>
                                                                <li><i class="bx bxs-star disstar"></i></li>
                                                            </ul>
                                                            <div class="progress-section">
                                                                <div class="progress">
                                                                    <div class="progress-bar psc02" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="67" style="max-width: 67%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-title">
                                                                <span class="title">67%</span>
                                                            </div>
                                                        </div>
                                                        <div class="lession-review-items">
                                                            <ul>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star disstar"></i></li>
                                                                <li><i class="bx bxs-star disstar"></i></li>
                                                            </ul>
                                                            <div class="progress-section">
                                                                <div class="progress">
                                                                    <div class="progress-bar psc02" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="67" style="max-width: 67%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-title">
                                                                <span class="title">67%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="lession-total-review">
                                                            <h3>4.9</h3>
                                                            <ul>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star"></i></li>
                                                                <li><i class="bx bxs-star disstar"></i></li>
                                                                <li><i class="bx bxs-star disstar"></i></li>
                                                            </ul>
                                                            <p>(2 Review)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="student-review-section">
                                                <h4>Reviews</h4>
                                                <div class="student-review-items">
                                                    <img src="assetss/img/all-img/cmnt-1.png" alt="image">
                                                    <ul>
                                                        <li><i class="bx bxs-star"></i></li>
                                                        <li><i class="bx bxs-star"></i></li>
                                                        <li><i class="bx bxs-star"></i></li>
                                                        <li><i class="bx bxs-star disstar"></i></li>
                                                        <li><i class="bx bxs-star disstar"></i></li>
                                                    </ul>
                                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p>
                                                    <h3>Daniel Smith</h3>
                                                    <span>Jan 24, 2023</span>
                                                </div>
                                                <div class="student-review-items">
                                                    <img src="assetss/img/all-img/cmnt-2.png" alt="image">
                                                    <ul>
                                                        <li><i class="bx bxs-star"></i></li>
                                                        <li><i class="bx bxs-star"></i></li>
                                                        <li><i class="bx bxs-star"></i></li>
                                                        <li><i class="bx bxs-star disstar"></i></li>
                                                        <li><i class="bx bxs-star disstar"></i></li>
                                                    </ul>
                                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p>
                                                    <h3>Daniel Smith</h3>
                                                    <span>Jan 24, 2023</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="single-course-sidebar">
                            <div class="course-widget">
                                <div class="course-video">
                                    <a href="https://www.youtube.com/watch?v=PWvPbGWVRrU" class="popup-youtube">
                                        <img src="assetss/img/all-img/thumb.png" alt="image">
                                        <i class='bx bx-image cr-video-btn'></i>
                                    </a>
                                </div>
                                
                                
                                <div class="sidebar-content">
                                    <h3><?php echo number_format($formation->formation_prix, 0, ',', ' ');  ?> <span style="color:gray;" class="badge badge-warning">FCFA</span></h3>
                                    <a href="#" data-toggle="modal" data-target="#modalInscription" class="default-btn course-btn">S'inscrire</a>
                                    <ul class="courses-details">
                                        <li><div class="icon"><img src="assetss/img/icon/user.svg" alt="icon"> Formateur</div> <p><?php echo $formation->formateur_nom . ' ' . $formation->formateur_prenoms ; ?></p></li>
                                        <li><div class="icon"><img src="assetss/img/icon/file2.svg" alt="icon"> Date début</div> <p><?php echo $formation->formation_date_debut ; ?></p></li>
                                        <li><div class="icon"><img src="assetss/img/icon/clock.svg" alt="icon"> Date fin</div> <p><?php echo $formation->formation_date_fin ; ?></p></li>
                                        <li><div class="icon"><img src="assetss/img/icon/star.svg" alt="icon"> Nombre d'inscrits</div> <p>2k étudiants</p></li>
                                    </ul>
                                    <ul class="course-shared">
                                        <li class="title">Partager:</li>
                                        <li><a href="#"><img src="assetss/img/icon/fb.svg" alt="icon"></a></li>
                                        <li><a href="#"><img src="assetss/img/icon/tw.svg" alt="icon"></a></li>
                                        <li><a href="#"><img src="assetss/img/icon/ins.svg" alt="icon"></a></li>
                                        <li><a href="#"><img src="assetss/img/icon/pn.svg" alt="icon"></a></li>
                                    </ul>
                                </div>

                                <!-- Modal d'inscription -->
                                <div class="modal fade" id="modalInscription" tabindex="-1" role="dialog" aria-labelledby="modal_inscription_label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal_inscription_label">Inscription à la Formation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Formulaire d'inscription -->
                                            <form id="form_inscription" method="post" action="inscription_formation.php">
                                                <input type="hidden" class="form-control" name="formation_id" value="<?php echo $formation->formation_id; ?>">   
                                                <input type="hidden" class="form-control" name="formation_titre" value="<?php echo $formation->formation_titre; ?>">   
                                                
                                                <div class="form-group">
                                                    <label for="nom">Nom</label>
                                                    <input type="text" class="form-control" name="nom" placeholder="Votre nom" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="prenom">Prénoms</label>
                                                    <input type="text" class="form-control" name="prenoms" placeholder="Votre prénoms">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Adresse e-mail</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Votre adresse e-mail" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="telephone">Téléphone</label>
                                                    <input type="text" class="form-control" name="telephone" placeholder="Téléphone">
                                                </div>
                                                <button type="submit" class="btn btn-primary">S'inscrire</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="widget widget-resent-course">
                                <h3 class="widget-title">Autes formations</h3>
                                <?php foreach($autres_formations as $formation){ ?>
                                <article class="item">
                                    <a href="#" class="thumb"><img src="assetss/img/all-img/rc-1.png" alt="iamge"></a>
                                    <ul>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star disstar"></i></li>
                                        <li><i class="bx bxs-star disstar"></i></li>
                                    </ul>
                                    <div class="info">
                                        <h4 class="title"><a href="details-formation.php?id=<?php echo $formation->formation_id; ?>" class="single-courses-link"><?php echo $formation->formation_titre; ?></a></h4>
                                        <span><?php echo number_format($formation->formation_prix, 0, ',', ' ');  ?> <span style="color:gray;" class="badge badge-warning">FCFA</span></span>
                                    </div>
                                </article>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Edu Single Course Area -->


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