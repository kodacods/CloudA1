#!/bin/bash


apt-get update
apt-get install -y apache2 php libapache2-mod-php php-mysql

cp /vagrant/testweb.conf /etc/apache2/sites-available/


a2ensite testweb
a2dissite 000-default

echo "ServerName localhost" | tee /etc/apache2/conf-available/fqdn.conf
a2enconf fqdn

mkdir -p /vagrant/www

systemctl restart apache2