Pig 1
1) Firstly, you must clone repository. If you have ssh keys, use following command in the terminal "git clone git@github.com:Hidgi/pig.git", else use "git clone https://github.com/Hidgi/pig.git" (recommended to add in gitignore file string "/api/vendor/" to ingore allready downoladed packages by composer + if you will use git flow, do in repository "git init")

2) Before start installation, you have to update your packages on ubuntu using below command "sudo apt-get update"

3) Install apache2 "sudo apt-get install apache2". go to the browser and enter http://localhost (or server address - depends of what do you using) for checking apache2 installed successfully or not.

4) Install MySQL and secure installation by following commands - "sudo apt-get install mysql-server" "mysql_secure_installation"

5) Install PHP7.2 and important extension by using instruction there "https://hostadvice.com/how-to/how-to-install-php7-2-on-ubuntu-18-04/"

6) Install PHPMyAdmin "sudo apt-get install phpmyadmin"

7) For editing apache file use vim using commands "sudo apt-get install vim", "cd /etc/apache2/", "sudo vim apache2.conf" and add on the last line "Include /etc/phpmyadmin/apache.conf" after that restart apache server "sudo service apache2 restart"

8) Install Composer by guide here "https://getcomposer.org/download/" and use command "composer install"

9) use "nano /etc/apache2/sites-available/000-default.conf " and rewrite there "/var/www" to "repository address (if you have moved files in "root space" do "mv currency-exchangng ~"). If you have any problems after that use commands "a2ensite 000-default" and "sudo systemctl restart apache2"

10) if you have anymore issues recommend you check this guide about webserver installation https://www.pontin.ru/technical/linux/web-server-ubuntu

11) To configure phpmyadmin try use https://serverfault.com/questions/144095/phpmyadmin-on-ubuntu-lamp-login-without-a-password-is-forbidden-by-configurat and this - https://devanswers.co/phpmyadmin-access-denied-for-user-root-localhost/

API have two options: to get names of all available currencies - "get /currencies" and to get prices of currencies - "get /currencies/prices". You can check API in Swager_description.yaml file or via link https://app.swaggerhub.com/apis/Kr0GG/Currencies-api/0.0.1/

With this tips you can use project. Have a nice day!
