#Run Instructions
###Before Project Download:
Requirements: php5.6 or greater, MySql, Composer.

Xampp or php and mysql separately must be installed. Download Xampp from [here](https://www.apachefriends.org/download.html) or php from [here](http://php.net/downloads.php) and mysql from [here](https://dev.mysql.com/downloads/installer/).

Composer must be installed. To download composer click [here](https://getcomposer.org/download/).
###After Project Download:
Create .env file in project folder. Then copy .env.example content and paste it in .env.
Now you have to create a database. 
####For Windows users:
Open Xampp and run MySql. Then click Admin to open PhpMyAdmin. Click New in db tree to create a new database. 

Then go to .env file and in DB_DATABASE=typeYourDbName DB_USERNAME=typePhpMyAdminUserName DB_PASSWORD=typePhpMyAdminPassword
####For Linux users:
Open a terminal and run:

mysql -u root -p

CREATE DATABASE yourDbName;

Then go to .env file and in DB_DATABASE=typeYourDbName DB_USERNAME=typeMySqlUserName DB_PASSWORD=typeMySqlPassword
###Project Setup:
Open a cmd or a terminal go to project folder and run:

composer update

composer dump-auto

php artisan key:generate

It will generate a key like this: base64:D9LjuA5MyVDM9al/+gelRZplXyM41w8cqNPJr3vw+Bg= Copy and paste in .env APP_KEY=

Run **php artisan serve** to run project on Laravel's virtual server. Open a browser and type: **http://localhost:8000/** 
