<?php
/**
 * Created by PhpStorm.
 * User: louri45
 * Date: 30/09/16
 * Time: 09:16
 */
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Page d'accueil GDR3625</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="banniere">
            <img src="../web/images/banniere.jpg" alt="banniere_cnrs" height="250px" class="img-responsive"  >
        </div>

        <nav class="navbar navbar-default">
            <div class="container-fluid">


                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="../web/images/logoGDRdetour.png" alt="logoGDR" height="90px" width="350px"  ></a>
            </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Accueil <span class="sr-only">(current)</span></a></li>
                        <li ><a href="#">Equipes </a></li>
                        <li ><a href="#">News </a></li>
                        <li ><a href="#">Publication </a></li>
                        <li> <a href="#">Emploi </a></li>
                        <li><a href="#"></a></li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><img src="../web/images/icon_mdp.jpg" alt="connexion" height="15px" width="15px" class="img-responsive"></a></li>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

            <div class="container-fluid ">
                <div class="row-présentation col-lg-offset-1 col-lg-6 ">

                <h1>Présentation du GDR</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Ad adipisci autem deserunt dolores earum eos excepturi harum iste minima mollitia necessitatibus,
                obcaecati quaerat quisquam quos recusandae soluta veritatis voluptas voluptatum.
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Ad adipisci autem deserunt dolores earum eos excepturi harum iste minima mollitia necessitatibus,
                 obcaecati quaerat quisquam quos recusandae soluta veritatis voluptas voluptatum.   </p>

                    <iframe width="100%" height="500px" frameBorder="0" src="http://umap.openstreetmap.fr/fr/map/mufopam_104845?scaleControl=false&miniMap=false&scrollWheelZoom=true&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false&datalayers=250827#7/46.932/1.884">
                    </iframe><p><a href="http://umap.openstreetmap.fr/fr/map/mufopam_104845">Voir en plein écran</a></p>
                </div>


              <div class="row-news1 col-lg-4">
                  <a href="#" class="thumbnail" >
                      <h2>Dernière news</h2>
                  </a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Architecto cumque dolore ex numquam provident quam rem voluptate.
                          Blanditiis consequuntur id illo minus
                          modi perspiciatis qui. At perferendis tempore voluptatem voluptates.</p>
               </div>

                <div class="row-news2 col-lg-4">
                  <a href="#" class="thumbnail">
                      <h2>Dernière publication</h2>
                  </a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Architecto cumque dolore ex numquam provident quam rem voluptate.
                          Blanditiis consequuntur id illo minus
                          modi perspiciatis qui. At perferendis tempore voluptatem voluptates.</p>
                </div>
                <div class="row-news3 col-lg-4">
                  <a href="#" class="thumbnail">
                      <h2>Dernière offre</h2>
                  </a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Architecto cumque dolore ex numquam provident quam rem voluptate.
                          Blanditiis consequuntur id illo minus
                          modi perspiciatis qui. At perferendis tempore voluptatem voluptates.</p>


              </div>


            </div>
        <footer>
            <div class="row-footer col-lg-12">

                <button type="button" class="btn btn-info mentionslégales" data-toggle="modal" data-target=".bs-example-modal-sm">Mentions légales</button>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            ...
                        </div>
                    </div>
                </div>

                <img src="../web/images/logo_wcs.jpg" alt="logo WCS" height="100px" width="100px" class="img-responsive logowcs">
            </div>

        </footer>



    </body>





</html>