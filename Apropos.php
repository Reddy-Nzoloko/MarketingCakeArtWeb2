<?php
$Apropos = true;
include_once("Header.php");
include_once("main.php");
$count = 0;
?>
<div class="container bg">
    <h1 class="h3"> Admin</h1>
    <a class="h2" href="#"><i class="bi bi-person-plus"></i></a>
    <a class="h2" href="#"><i class="bi bi-eye"></i>
</a>
</div>


<!-- Porto Folio -->
 <!-- petit paragraphe-->
    <div class="container-fluid" id="quiSuisJe">
        <div class="row gy-4 align-items-center mt-3">
            <div class="col col-6 mt-5 text-center">
                <h1 class="h2">Je suis Reddy Nzoloko développeur Web et Desktop </h1>
            </div>
            <div class="col w-25 float-start">
                <img class="img-fluid rounded" src="image/JproPictures-72.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- grand titre -->
    <div class="container mt-4">
        <div class="row">
            <div class="col col-12 text-center">
                <h1 class="h1">Bienvenue dans mon Univers Créatif</h1>
            </div>
        </div>
    </div>
    <!-- Bouton pour ramener quelqu'un quelque pars sur la page -->
<div class="container mt-4 ">
    <button class="btn btn-outline-dark btn-lg">Mon expertise </button>
</div>
<!-- Mon Expertise -->
<section id="expertise" class="py-4 bg-light mt-3">
    <div class="container">
        <h2 class="mb-0">Mon expertise </h2>
        <h3 class="fw-light fs-5">Développement web </h3>
        <div class="row mt-4 gy-4">
            <div class="col-12 col-md-7 rounded-4">

                <div class="mb-3 p-3 bg-white">
                    <div class="row align-items-center">
                      <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                        <div class="d-flex align-items-center">
                          <i class="fab fa-html5 fa-2x me-3 text-success"></i>
                          <p class="fw-light fs-5 m-0">HTML</p>
                        </div>
                      </div>
                      <div class="col">
                        <div class="progress">
                          <div class="progress-bar bg-primary" style="width: 70%;" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                               aria-valuemax="100">70%
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="mb-3 p-3 bg-white">
                    <div class="row align-items-center">
                      <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-css3-alt fa-2x me-3 text-success"></i>
                            <p class="fw-light fs-5 m-0">CSS</p>
                        </div>
                      </div>
                      <div class="col">
                        <div class="progress">
                          <div class="progress-bar bg-primary" style="width: 50%;" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                               aria-valuemax="100">50%
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="mb-3 p-3 bg-white">
                    <div class="row align-items-center">
                      <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-js fa-2x me-3 text-success"></i>
                            <p class="fw-light m-0">JS</p>
                        </div>
                      </div>
                      <div class="col">
                        <div class="progress">
                          <div class="progress-bar bg-primary" style="width: 40%;" role="progressbar" aria-valuenow="30" aria-valuemin="0"
                               aria-valuemax="100">40%
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="mb-3 p-3 bg-white">
                    <div class="row align-items-center">
                      <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-php fa-2x me-3 text-success"></i>
                            <p class="fw-light m-0">PHP</p>
                        </div>
                      </div>
                      <div class="col">
                        <div class="progress">
                          <div class="progress-bar bg-primary" style="width: 20%;" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                               aria-valuemax="100">20%
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

            </div>
            <div class="col-12 offset-md-1 col-md-4">
                <img src="image/code.PNG" alt="écran montrant du code php" width="100%">
            </div>
        </div>

        <div class="row gy-4 mt-4">
            <div class="col-12 col-md-4">
              <!-- <img src="image/C#.PNG" alt="écran montrant des designs" width="100%"> -->
              <img src="image/design.PNG" alt="" width="100%">
            </div>
            <div class="col-12 order-first offset-md-1 col-md-7 order-md-last">
  
              <!-- Progress bar -->
              <div class="mb-3 p-3 bg-white">
                <div class="row align-items-center">
                  <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                    <div class="d-flex align-items-center">
                      <i class="fab fa-figma fa-2x me-3 text-success"></i>
                      <p class="fw-light m-0">C#</p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="progress">
                      <div class="progress-bar w-75 bg-primary" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                           aria-valuemax="100"> 75%
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="mb-3 p-3 bg-white">
                <div class="row align-items-center">
                  <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                    <div class="d-flex align-items-center">
                      <i class="fas fa-photo-video fa-2x me-3 text-success"></i>
                      <p class="fw-light m-0">Boostrap</p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="progress">
                      <div class="progress-bar w-100 bg-primary" role="progressbar" aria-valuenow="75" aria-valuemin="90"
                           aria-valuemax="75"> 100%
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="mb-3 p-3 bg-white">
                <div class="row align-items-center">
                  <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                    <div class="d-flex align-items-center">
                      <i class="fas fa-palette fa-2x me-3 text-success"></i>
                      <p class="fw-light m-0">CSS</p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="progress">
                      <div class="progress-bar w-75 bg-primary" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                           aria-valuemax="100"> 75%
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="mb-3 p-3 bg-white">
                <div class="row align-items-center">
                  <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                    <div class="d-flex align-items-center">
                      <i class="fas fa-vial fa-2x me-3 text-success"></i>
                      <p class="fw-light m-0">Vd makers</p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="progress">
                      <div class="progress-bar w-75 bg-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                           aria-valuemax="100"> 40%
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="mb-3 p-3 bg-white">
                <div class="row align-items-center">
                  <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                    <div class="d-flex align-items-center">
                      <i class="fas fa-video fa-2x me-3 text-success"></i>
                      <p class="fw-light m-0">Logo</p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="progress">
                      <div class="progress-bar w-50 bg-primary" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                           aria-valuemax="100"> 25%
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
        </div>
    </div>
</section>

<!-- nos projet ou portoFolio -->
<section class="py-5" id="portoFolio">
  <div class="container">
      <h2 class="mb-0 ">Mon Portofolio</h2>
      <h3 class="fw-light fs-5">Mes projets</h3>
      <div class="row gy-4 gy-md-0 mt-4">
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-3">
              <div class="card">
                  <img src="https://picsum.photos/300/150?random=1" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Projet 1</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#infoProjet1"
                    aria-controls="infoProjet1">En savoir plus</a>
                  </div>


                  <div class="offcanvas offcanvas-bottom h-100" tabindex="-1" id="infoProjet1"
                  aria-labelledby="titelProjet1">
                 <div class="offcanvas-header">
                     <h5 class="offcanvas-title" id="titelProjet1">Projet 1</h5>
                     <button type="button" class="btn-close btn-primary text-reset" data-bs-dismiss="offcanvas"
                             aria-label="Close"></button>
                 </div>
                 <div class="offcanvas-body">
                     <!-- Carousel -->
                     <div id="carouselProject1" class="carousel slide shadow h-100"
                          data-bs-ride="carousel" data-bs-touch="true">
                         <div class="carousel-inner h-100">
                             <div class="carousel-item h-100 active" data-bs-interval="10000">
                                 <img src="https://picsum.photos/1920/1080?random=1"
                                      class="d-block w-100" alt="Image slide 1">
                                 <div class="carousel-caption d-none d-md-block">
                                     <h5>Slide 1</h5>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
                                         sollicitudin.</p>
                                 </div>
                             </div>
                             <div class="carousel-item h-100" data-bs-interval="2000">
                                 <img src="https://picsum.photos/1920/1080?random=2"
                                      class="d-block w-100" alt="Image slide 2">
                                 <div class="carousel-caption d-none d-md-block">
                                     <h5>Slide 2</h5>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
                                         sollicitudin.</p>
                                 </div>
                             </div>
                             <div class="carousel-item h-100">
                                 <img src="https://picsum.photos/1920/1080?random=3"
                                      class="d-block w-100" alt="Image slide 3">
                                 <div class="carousel-caption d-none d-md-block">
                                     <h5>Slide 3</h5>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
                                         sollicitudin.</p>
                                 </div>
                             </div>
                         </div>
                         <button class="carousel-control-prev" type="button"
                                 data-bs-target="#carouselProject1" data-bs-slide="prev">
                             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                             <span class="visually-hidden">Previous</span>
                         </button>
                         <button class="carousel-control-next" type="button"
                                 data-bs-target="#carouselProject1" data-bs-slide="next">
                             <span class="carousel-control-next-icon" aria-hidden="true"></span>
                             <span class="visually-hidden">Next</span>
                         </button>
                     </div>
                 </div>
                </div>
              </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-3">
              <div class="card">
                  <img src="https://picsum.photos/300/150?random=2" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Projet 2</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#infoProjet1"
                    aria-controls="infoProjet1">En savoir plus</a>
                  </div>


                  <div class="offcanvas offcanvas-bottom h-100" tabindex="-1" id="infoProjet1"
                  aria-labelledby="titelProjet1">
                 <div class="offcanvas-header">
                     <h5 class="offcanvas-title" id="titelProjet1">Projet 1</h5>
                     <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                             aria-label="Close"></button>
                 </div>
                 <div class="offcanvas-body">
                     <!-- Carousel -->
                     <div id="carouselProject1" class="carousel slide shadow h-100"
                          data-bs-ride="carousel" data-bs-touch="true">
                         <div class="carousel-inner h-100">
                             <div class="carousel-item h-100 active" data-bs-interval="10000">
                                 <img src="https://picsum.photos/1920/1080?random=1"
                                      class="d-block w-100" alt="Image slide 1">
                                 <div class="carousel-caption d-none d-md-block">
                                     <h5>Slide 1</h5>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
                                         sollicitudin.</p>
                                 </div>
                             </div>
                             <div class="carousel-item h-100" data-bs-interval="2000">
                                 <img src="https://picsum.photos/1920/1080?random=2"
                                      class="d-block w-100" alt="Image slide 2">
                                 <div class="carousel-caption d-none d-md-block">
                                     <h5>Slide 2</h5>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
                                         sollicitudin.</p>
                                 </div>
                             </div>
                             <div class="carousel-item h-100">
                                 <img src="https://picsum.photos/1920/1080?random=3"
                                      class="d-block w-100" alt="Image slide 3">
                                 <div class="carousel-caption d-none d-md-block">
                                     <h5>Slide 3</h5>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
                                         sollicitudin.</p>
                                 </div>
                             </div>
                         </div>
                         <button class="carousel-control-prev" type="button"
                                 data-bs-target="#carouselProject1" data-bs-slide="prev">
                             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                             <span class="visually-hidden">Previous</span>
                         </button>
                         <button class="carousel-control-next" type="button"
                                 data-bs-target="#carouselProject1" data-bs-slide="next">
                             <span class="carousel-control-next-icon" aria-hidden="true"></span>
                             <span class="visually-hidden">Next</span>
                         </button>
                     </div>
                 </div>
             </div>
              </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-3">
              <div class="card">
                  <img src="https://picsum.photos/300/150?random=3" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Projet 3</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#infoProjet1"
                    aria-controls="infoProjet1">En savoir plus</a>
                  </div>


                  <div class="offcanvas offcanvas-bottom h-100" tabindex="-1" id="infoProjet1"
                  aria-labelledby="titelProjet1">
                 <div class="offcanvas-header">
                     <h5 class="offcanvas-title" id="titelProjet1">Projet 1</h5>
                     <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                             aria-label="Close"></button>
                 </div>
                 <div class="offcanvas-body">
                     <!-- Carousel -->
                     <div id="carouselProject1" class="carousel slide shadow h-100"
                          data-bs-ride="carousel" data-bs-touch="true">
                         <div class="carousel-inner h-100">
                             <div class="carousel-item h-100 active" data-bs-interval="10000">
                                 <img src="https://picsum.photos/1920/1080?random=1"
                                      class="d-block w-100" alt="Image slide 1">
                                 <div class="carousel-caption d-none d-md-block">
                                     <h5>Slide 1</h5>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
                                         sollicitudin.</p>
                                 </div>
                             </div>
                             <div class="carousel-item h-100" data-bs-interval="2000">
                                 <img src="https://picsum.photos/1920/1080?random=2"
                                      class="d-block w-100" alt="Image slide 2">
                                 <div class="carousel-caption d-none d-md-block">
                                     <h5>Slide 2</h5>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
                                         sollicitudin.</p>
                                 </div>
                             </div>
                             <div class="carousel-item h-100">
                                 <img src="https://picsum.photos/1920/1080?random=3"
                                      class="d-block w-100" alt="Image slide 3">
                                 <div class="carousel-caption d-none d-md-block">
                                     <h5>Slide 3</h5>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
                                         sollicitudin.</p>
                                 </div>
                             </div>
                         </div>
                         <button class="carousel-control-prev" type="button"
                                 data-bs-target="#carouselProject1" data-bs-slide="prev">
                             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                             <span class="visually-hidden">Previous</span>
                         </button>
                         <button class="carousel-control-next" type="button"
                                 data-bs-target="#carouselProject1" data-bs-slide="next">
                             <span class="carousel-control-next-icon" aria-hidden="true"></span>
                             <span class="visually-hidden">Next</span>
                         </button>
                     </div>
                 </div>
             </div>
              </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-3">
              <div class="card">
                  <img src="https://picsum.photos/300/150?random=4" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Projet 4</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#infoProjet1"
                    aria-controls="infoProjet1">En savoir plus</a>
                  </div>


                  <div class="offcanvas offcanvas-bottom h-100" tabindex="-1" id="infoProjet1"
                  aria-labelledby="titelProjet1">
                 <div class="offcanvas-header">
                     <h5 class="offcanvas-title" id="titelProjet1">Projet 1</h5>
                     <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                             aria-label="Close"></button>
                 </div>
                 <div class="offcanvas-body">
                     <!-- Carousel -->
                     <div id="carouselProject1" class="carousel slide shadow h-100"
                          data-bs-ride="carousel" data-bs-touch="true">
                         <div class="carousel-inner h-100">
                             <div class="carousel-item h-100 active" data-bs-interval="10000">
                                 <img src="https://picsum.photos/1920/1080?random=1"
                                      class="d-block w-100" alt="Image slide 1">
                                 <div class="carousel-caption d-none d-md-block">
                                     <h5>Slide 1</h5>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
                                         sollicitudin.</p>
                                 </div>
                             </div>
                             <div class="carousel-item h-100" data-bs-interval="2000">
                                 <img src="https://picsum.photos/1920/1080?random=2"
                                      class="d-block w-100" alt="Image slide 2">
                                 <div class="carousel-caption d-none d-md-block">
                                     <h5>Slide 2</h5>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
                                         sollicitudin.</p>
                                 </div>
                             </div>
                             <div class="carousel-item h-100">
                                 <img src="https://picsum.photos/1920/1080?random=3"
                                      class="d-block w-100" alt="Image slide 3">
                                 <div class="carousel-caption d-none d-md-block">
                                     <h5>Slide 3</h5>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
                                         sollicitudin.</p>
                                 </div>
                             </div>
                         </div>
                         <button class="carousel-control-prev" type="button"
                                 data-bs-target="#carouselProject1" data-bs-slide="prev">
                             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                             <span class="visually-hidden">Previous</span>
                         </button>
                         <button class="carousel-control-next" type="button"
                                 data-bs-target="#carouselProject1" data-bs-slide="next">
                             <span class="carousel-control-next-icon" aria-hidden="true"></span>
                             <span class="visually-hidden">Next</span>
                         </button>
                     </div>
                 </div>
             </div>
              </div>
          </div>
      </div>
  </div>
</section>

<!-- <div class="container-fluid mt-4"id="apropos" >
    <div class="row">
        <div class="col col-3 float-start">
            <img class="img-fluid rounded" src="image/design.PNG" alt="">
            <h2 class="h4">Projet 1</h2>
            <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur amet corrupti doloremque.</p>
            <button class="btn btn-outline-primary btn-sm ">En savoir plus</button>
        </div>
        <div class="col col-3 float-start ">
            <img class="img-fluid rounded" src="image/Capture.PNG" alt="">
            <h2 class="h4">Projet 2</h2>
            <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur amet corrupti doloremque.</p>
            <button class="btn btn-outline-primary btn-sm ">En savoir plus</button>
        </div>
        <div class="col col-3 float-start ">
            <img class="img-fluid rounded" src="image/TXBR9751.JPG" alt="">
            <h2 class="h4">Projet 3</h2>
            <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur amet corrupti doloremque.</p>
            <button class="btn btn-outline-primary btn-sm ">En savoir plus</button>
        </div>
        <div class="col col-3 float-start">
            <img class="img-fluid rounded" src="image/C.PNG" alt="">
            <h2 class="h4 h3-4">Projet 4</h2>
            <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur amet corrupti doloremque.</p>
            <button class="btn btn-outline-primary btn-sm ">En savoir plus</button>
        </div>
    </div>
</div> -->

 <!-- notion des carousel à mettre dans un bouton -->
 <!-- <div class="container-fluid mt-4  ">
    <div id="diaporama" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/JproPictures-177.jpg" alt="" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="image/JproPictures-77.jpg" alt="" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="image/JproPictures-72.jpg" alt="" class="d-block w-100">
            </div>
        </div>
        pour ajouter les bouton à mon carousel
        <button class="carousel-control-prev" type="button" data-bs-target="#diaporama" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#diaporama" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div> -->

<!-- <div class="container-fluid mt-4 py-5 bg-light">
    <div class="row gy-4">
        <div class="col col-12 col-md-5 float-start">
            <h1 class="h3">Nous retrouver dans le web</h1>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
            <img class="img-fluid rounded" src="image/JproPictures-177.jpg" alt="">
        </div> -->
        <!-- petit formulaire -->

        <!-- <div class="col col-6 my-2">
            <h3 class="h3">LAISSER UN MESSAGE</h3>

            <form action="" class="row g-3 container-fluid py-4 ">
                <div class="col-md-6">
                    <label class="form-label" for="name">Nom</label>
                    <input class="form-control" type="text" id="name" name="name">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="email">email</label>
                    <input class="form-control" type="email" id="email" name="email">
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="adress">Adress</label>
                    <input class="form-control" type="text" id="adress" name="adress">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="ville">ville</label>
                    <input class="form-control" type="text" id="ville" name="ville">
                </div>
                <div class="col-md-8">
                    <label class="form-label" for="codePostal">code postal</label>
                    <textarea class="form-control" name="mesage" id="message" cols="20" rows="5"></textarea>
                </div>
                <div class="col-md-12 py-3 col-12">
                    <button class="btn btn-primary col-12" type="submit"> Envoyer </button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- espace pour formulaire -->
<section id="contact" class="py-5 bg-light">
    <div class="container">
      <h2 class="mb-0">Un projet de création web ?</h2>
      <h3 class="fw-light fs-5">Allons en discuter autour d'un café</h3>
      <div class="row gy-4 mt-4">
        <div class="col-12 col-md-5">
          <img src="image/grab-a-coffee.jpg" alt="photo avec café" width="100%">
        </div>
        <div class="col-12 offset-md-1 col-md-6">
<!-- TAdministrateur(idAdmi INT primary key, NomAdmi VARCHAR(100)NOT NULL, MailAdmi varchar(200) not null, PhoneAdmi varchar(200) not null, Motdepass varchar(500)not null); -->

          <form method="POST" class="row">
            <div class="col-6 my-2">
              <label for="nom" class="form-label">N° Agent</label>
              <input name="nom" type="NUM" class="form-control" id="nom">
            </div>
            <div class="col-6 my-2">
              <label for="nom" class="form-label">Nom</label>
              <input name="nom" type="text" class="form-control" id="nom">
            </div>
            <div class="col-6 my-2">
              <label for="email" class="form-label">email</label>
              <input name="email" type="email" class="form-control" id="email">
            </div>
            <div class="col-6 my-2">
              <label for="nom" class="form-label">Num Phone</label>
              <input name="nom" type="tel" class="form-control" id="nom">
            </div>
            <div class="col-6 my-2">
              <label for="nom" class="form-label">PassWord </label>
              <input name="MotPass" type="password" class="form-control" id="nom">
            </div>
            <div class="col-12 my-2">
              <button type="submit" class="btn btn-primary w-100 my-2">Envoyer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</section>





<?php
  include_once("Footer.php");
  ?>