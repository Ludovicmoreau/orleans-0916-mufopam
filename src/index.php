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
        <link rel="stylesheet" href="stylenavbar.css">
        <link rel="stylesheet" href="style.css"
    </head>

    <body>

        <div class="banniere">
            <img src="../web/images/banniere.jpg" alt="banniere_cnrs" height="250px" class="img-responsive"  >
        </div>

        <div class="navigation">
        <nav class="navbar navbar-default">
            <div class="container-fluid"></div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand " id="logoMufo" href="#"><img class="img-responsive" src="../web/images/logoGDRdetour.jpg" alt="logoGDR" ></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">
                        <li class="active "><a href="#">Accueil <span class="sr-only">(current)</span></a></li>
                        <li ><a href="#">Equipes </a></li>
                        <li ><a href="#">News </a></li>
                        <li ><a href="#">Publication </a></li>
                        <li> <a href="#">Emploi </a></li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><img  src="../web/images/icon_mdp.jpg" alt="connexion"  class="logoconnexion img-responsive"></a></li>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->



            <div class="container-fluid ">
                <div class="row-presentation col-lg-offset-1 col-lg-6  ">

                <h1>Présentation du GDR</h1> <br/>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Ad adipisci autem deserunt dolores earum eos excepturi harum iste minima mollitia necessitatibus,
                obcaecati quaerat quisquam quos recusandae soluta veritatis voluptas voluptatum.
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Ad adipisci autem deserunt dolores earum eos excepturi harum iste minima mollitia necessitatibus,
                 obcaecati quaerat quisquam quos recusandae soluta veritatis voluptas voluptatum.   </p>
                    <div class="carte">
                        <iframe width="100%" height="500px" frameBorder="0" src="http://umap.openstreetmap.fr/fr/map/mufopam_104845?sc
                        aleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=false&tilelayersControl=false&embedControl=false&datalayersControl=true&onLoadPanel=undefined&captionBar=false&datalayers=251139&measureControl=false&editinosmControl=
                        false"></iframe><p><a href="http://umap.openstreetmap.fr/fr/map/mufopam_104845">Voir en plein écran</a></p>
                    </div>
                </div>

            <div class="panel-assembly col-lg-4">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                    <div class="panel-title"> <h4> Dernière News</h4></div>
                    </div>
                        <div class="panel-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci aliquid aperiam asperiores assumenda cumque,
                         dicta fuga fugit in incidunt nobis perferendis praesentium provident quo sed sint tempore vitae voluptatem.
                        </div>
                </div>
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <div class="panel-title"> <h4>Dernière publication</h4> </div>
                    </div>
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci aliquid aperiam asperiores assumenda cumque,
                        dicta fuga fugit in incidunt nobis perferendis praesentium provident quo sed sint tempore vitae voluptatem.
                    </div>
                </div>
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <div class="panel-title"> <h4> Dernière Offre</h4> </div>
                    </div>
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci aliquid aperiam asperiores assumenda cumque,
                        dicta fuga fugit in incidunt nobis perferendis praesentium provident quo sed sint tempore vitae voluptatem.
                    </div>
                </div>
            </div>
           </div>
        <footer>
            <div class="container-fluid">
            <div class="row-footer col-lg-12">
                <div class="mentions">
                    <a  data-toggle="modal" data-target=".bs-example-modal-sm">Mentions légales</a>

                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                Mentions légales
                            </div>
                        </div>
                    </div>
                    <br/>
                    <a  data-toggle="modal" data-target=".bs-example-modal-sm2">Contact</a>

                    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                Celine LANDON
                            </div>
                        </div>
                    </div>
                    <br/>
                    <a  data-toggle="modal" data-target=".bs-example-modal-sm3">Siège</a>

                    <div class="modal fade bs-example-modal-sm3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                ...
                            </div>
                        </div>
                    </div>

                </div>
                <div class="logo">
                    <img src="../web/images/logo_wcs.jpg" alt="logo WCS" height="100px" width="100px" class="img-responsive logowcs">
                </div>
            </div>
            </div>
        </footer>



    </body>





</html>