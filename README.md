# Happy API
Minimal Restful API built with PHP & Silex 

![](http://i.imgur.com/5icdezF.jpg)

###Routes
**1)** HTTP 200 when GET on /  

**2)** User id infos on `http://host/users/{id}` or `http://host//user/{id}` if user existst
   Data is return in JSON format with HTTP Content-Type: "application/json"  

**3)** If user does not exists, return error HTTP 404.  
   If request on `http://host/users/{id}` ou `http://host/users/{id}/`  
   but user is "admin", return HTTP error 401.  
   Generally in case of server-side error, return error HTTP 500.  

**4)** Search a user by his email address  
   GET on `http://host/search/users?q=user_email`  
   Will return an array of json elements.  
 
##Install
Clone this repository  

Configure your Web server of choice to point inside /web directory  
If you want a working exemple with Apache 2.2 check `/platform/happy_api_apache_vhost`  
Make sure you enable rewrite_mod and active the vhost  
With your package manager install php5, mysql ...etc  
Install composer if you haven't already  
cd into the project directory  
composer install  

**Database (MySQL / MariaDB):**  
To install MariaDB you will have to add Maria's repository in `/etc/apt/sources.list`  
Check MariaDB documentation for more informations on how to do this  
Additional useful repository for more up to date packages: `https://www.dotdeb.org`  

You're free to change the config at the start of the file `/web/index.php`  
By default you could config the Database like so:  

Create a database `happy_api`  
Create a user `rest` with password `happy little api` to the `happy_api` db   
Import the test db in `/platform/db.sql`  


###This project was built with:
    - Debian Linux 7 Wheezy
    - PHP 5.4.42
    - Silex 1.3.0
    - Apache 2.2
    - MariaDB 10.0.20

Author
------
Jean-Baptiste Bouhier
