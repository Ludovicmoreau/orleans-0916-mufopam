GDR3625
=======

A Symfony project created on September 27, 2016, 11:03 am.



# ![pageres](web/images/logoGDR.png)

## Installation

Pour l'installation du site :
* Sur le terminal du serveur :
 -> Se mettre dans le dossier choisit
 -> git clone https://github.com/WildCodeSchool/orleans-0916-mufopam.git
 -> composer install
 -> rentrer les informations de la base de donnée et du mail
 -> Donner les autorisation au dossier app/cache et app/logs : chmod -R 777 app/cache app/logs

## API

### Pageres([options])


##### css

Type: `string`

Apply custom CSS to the webpage. Specify some CSS or the path to a CSS file.

##### script

Type: `string`

Apply custom JavaScript to the webpage. Specify some JavaScript or the path to a file.

##### cookies

###### Tip

##### filename

Type: `string`

Define a customized filename using [Lo-Dash templates](https://lodash.com/docs#template).  
For example `<%= date %> - <%= url %>-<%= size %><%= crop %>`.

Available variables:

##### selector

##### hide

##### username

Type: `string`

Username for authenticating with HTTP auth.

##### password

Type: `string`

Password for authenticating with HTTP auth.

##### scale

Type: `number`  
Default: `1`

Scale webpage `n` times.

##### format

Type: `string`  
Default: `png`  
Values: `png`, `jpg`

Image format.

##### userAgent

Type: `string`

Custom user agent.

##### headers

Type: `object`

Custom HTTP request headers.


### pageres.src(url, sizes, options)

Add a page to screenshot.

#### url

*Required*  
Type: `string`

URL or local path to the website you want to screenshot. You can also use a data URI.

#### sizes

*Required*  
Type: `array`

Use a `<width>x<height>` notation or a keyword.

A keyword is a version of a device from [this list](http://viewportsizes.com).
You can also pass in the `w3counter` keyword to use the ten most popular
resolutions from [w3counter](http://www.w3counter.com/globalstats.php).

#### options

Type: `object`

Options set here will take precedence over the ones set in the constructor.

### pageres.dest(directory)

Set the destination directory.

#### directory

Type: `string`

### pageres.run()

Run pageres. Returns a promise for an array of streams.

### pageres.on('warning', callback)

Warnings with e.g. page errors.


## Task runners

Check out [grunt-pageres](https://github.com/sindresorhus/grunt-pageres) if you're using Grunt.

For Gulp and Broccoli, just use the API directly. No need for a wrapper plugin.


## Built with Pageres

- [Break Shot](https://github.com/victorferraz/break-shot) - Desktop app for capturing screenshots of responsive websites.


## Team :

  * Mickael LEHOUX
  * Joel PILOSEL
  * Ludovic MOREAU
  * Louis RICHARD

### Supervisors :
  
  * Julien KEITA
  * Sylvain BLONDEAU

