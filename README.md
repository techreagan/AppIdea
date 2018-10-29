# App Idea

It's a simple web app that store users ideas, to avoid been forgetten. 

## Installation
Import the appidea.sql to your mysql database 


### Configuration File

Modify the app/config/config.php file according to your needs.

``` PHP
//Database Configuration
define('DB_HOST', '_YOUR_HOST');
define('DB_USER', '_YOUR_DATABSE_USERNAME');
define('DB_PASS', '_YOUR_DATABASE_PASSWORD');
define('DB_NAME', '_YOUR DATABASE_NAME');
// App Root 
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root
define('URLROOT', '_YOUR_URL_');
// Site Name
define('SITENAME', '_YOUR_SITENAME_');
```


### Htaccess file

Modify the .htaccess file inside the public folder to match the name of your installation folder, Modify only the RewriteBase.

```
<IfModule mod_rewrite.c>
  Options -Multiviews
  RewriteEngine On 
  RewriteBase /boss/public 
  RewriteCond %{REQUEST_FILENAME} !-d 
  RewriteCond %{REQUEST_FILENAME} !-f 
  RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```

## Development
Built with [Boss PHP mini Framework](https://github.com/techreagan/Boss)