apt-get update
apt-get install -y apache2 php libapache2-mod-php php-mysql
    
# Change VM's clientserver's configuration to use shared folder.
cp /vagrant/public.conf /etc/apache2/sites-available/

# activate website configuration ...
a2ensite public
# ... and disable the default website provided with Apache
a2dissite 000-default
# Reload the clientserver configuration, to pick up changes
service apache2 reload