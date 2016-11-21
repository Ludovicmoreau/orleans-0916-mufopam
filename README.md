GDR3625
=======

A Symfony project created on September 27, 2016, 11:03 am.

![](http://www.mufopam.cnrs.fr/images/logoGDR.png?raw=true )


## /!\ <br/>Attention avant d'effectuer un 'composer install',<br/> faire une sauvegarde du fichier : vendor/paragonie/random_compat/lib/random.php<br/>
Si le fichier random.php n'existe plus ou qu'il y a eu un problème, modifier le code à la ligne 178 :
        
        if (!function_exists('random_bytes')) {
            /*
             * We don't have any more options, so let's throw an exception right now
             * and hope the developer won't let it fail silently.
             */
            function random_bytes($length)
            {
                // modification car pb de config du serveur
                $strong = false;
                $bytes = openssl_random_pseudo_bytes(32, $strong);
        
            }
        }


## Installation

* Pour une mise en production via ftp/sftp:<br/>
  -> Se connecter au serveur<br/>
  -> 

* Pour une mise en production du site via le terminal du serveur :<br/>
 -> Se mettre dans le dossier choisit<br/>
 -> git clone https://github.com/WildCodeSchool/orleans-0916-mufopam.git<br/>
 -> composer install<br/>
 -> rentrer les informations de la base de donnée et du mail<br/>
 -> Donner les autorisation au dossier app/cache et app/logs : chmod -R 777 app/cache app/logs<br/>

## API
* Nous avons intégré [l'API Google Geocoding](https://developers.google.com/maps/documentation/geocoding/intro#GeocodingRequests) afin de convertir les adresses postales en coordonnées gps.
* Ces coordonnées sont utilisées pour la génération du fichier geojson => umap.json qui permet l'intégration dynamique des équipes dans [la carte du MuFoPAM](http://umap.openstreetmap.fr/fr/map/mufopam_104845#6/47.599/7.152)

## Team :

  * [Mickael LEHOUX](https://github.com/MkLHX)
  * [Joel PILOSEL](https://github.com/jpilosel)
  * [Ludovic MOREAU](https://github.com/ludovicmoreau)
  * [Louis RICHARD](https://github.com/louri45)

### Supervisors :
  
  * Julien KEITA
  * Sylvain BLONDEAU

