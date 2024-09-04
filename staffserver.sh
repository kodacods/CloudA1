apt-get update
apt-get install -y apache2 php libapache2-mod-php php-mysql
    
# Change VM's adminserver's configuration to use shared folder.
cp /vagrant/staff.conf /etc/apache2/sites-available/

# activate admin configuration ...
a2ensite staff
# ... and disable the default website provided with Apache
a2dissite 000-default
# Reload the adminserver configuration, to pick up changes
service apache2 reload