#!/bin/bash

apt-get update
apt-get install -y apache2 php libapache2-mod-php php-mysql
            
# Change VM's webserver's configuration to use shared folder.
# (Look inside test-website.conf for specifics.)
cp /vagrant/test-website.conf /etc/apache2/sites-available/

# activate our website configuration ...
a2ensite test-website
# ... and disable the default website provided with Apache
a2dissite 000-default
# Restart the webserver, to pick up our configuration changes
service apache2 restart
