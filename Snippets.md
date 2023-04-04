For Addon Domain Name

cd /etc/apache2/sites-available/

cp 000-default.conf dev1.unowl.com.conf

sudo nano dev1.unowl.com.conf

sudo a2ensite dev1.unowl.com.conf

sudo systemctl restart apache2

sudo certbot --apache

sudo chown -R www-data:www-data /var/www/dev1

sudo chmod -R g+rwX /var/www/dev1


To Install PHPMYADMIN

sudo apt update

sudo apt install phpmyadmin php-mbstring php-zip php-gd php-json php-curl

sudo phpenmod mbstring

sudo systemctl restart apache2

sudo ln -s /usr/share/phpmyadmin/ /var/www/html/phpmyadmin

sudo mysql

CREATE USER 'owl'@'localhost' IDENTIFIED WITH caching_sha2_password BY 'Password';


GRANT ALL PRIVILEGES ON *.* TO 'owl'@'localhost' WITH GRANT OPTION;

exit
