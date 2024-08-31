# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile to set up 3 VMs, webservers and database servers,
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"

  #Defining webserver
  config.vm.define "webserver" do |webserver|
 
    webserver.vm.hostname = "webserver"
    webserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

    # private network that the VMs will use to communicate
    # using an specific ip .
    webserver.vm.network "private_network", ip: "192.168.2.11"

    # synced folder to share files between the host and the VM.
    webserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    # webserver commands
    webserver.vm.provision "shell", inline: <<-SHELL
    apt-get update
    apt-get install -y apache2 php libapache2-mod-php php-mysql
          
    # Make sure to change webservers congif for shared folder
    cp /vagrant/test-website.conf /etc/apache2/sites-available/
    a2ensite test-website
    a2dissite 000-default
    service apache2 reload
  SHELL
end


# Defining dbserver, similar to webserver
config.vm.define "dbserver" do |dbserver|
  dbserver.vm.hostname = "dbserver"

  dbserver.vm.network "private_network", ip: "192.168.2.12"
  dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

  dbserver.vm.provision "shell", inline: <<-SHELL
  apt-get update
  
  #Set up mysql

  export MYSQL_PWD='insecure_mysqlroot_pw'

  echo "mysql-server mysql-server/root_password password $PASSWORD" | debconf-set-selections 
  echo "mysql-server mysql-server/root_password_again password $PASSWORD" | debconf-set-selections
  

  apt-get -y install mysql-server
  
  # Creating database
  echo "CREATE DATABASE fvision;" | mysql
 
  echo "CREATE USER 'netuser'@'%' IDENTIFIED BY 'insecure_db_pw';" | mysql
  echo "GRANT ALL PRIVILEGES ON fvision.* TO 'netUser'@'%'" | mysql
..
  export MYSQL_PWD='insecure_db_pw'
  
  cat /vagrant/setup-database.sql | mysql -u netUser fvision
  sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf
 
  service mysql restart
SHELL
end

end