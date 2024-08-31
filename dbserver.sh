  # Updates ubuntu.
  apt-get update
  
  # Creating shell that contains the root password for mysql
  export MYSQL_PWD='password'
  echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
  echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections
  
  # Install the MySQL database server.
  apt-get -y install mysql-server
  
  # Setup mysql database and user
  echo "CREATE DATABASE reservations;" | mysql
  echo "CREATE USER 'originUser'@'%' IDENTIFIED BY 'password1';" | mysql
  echo "GRANT ALL PRIVILEGES ON reservations.* TO 'originUser'@'%'" | mysql

  export MYSQL_PWD='password1'
  
  # Connecting user and database
  cat /vagrant/setup-database.sql | mysql -u originUser reservations

  # Stop mysql from just listening on localhost
  sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf
  
  service mysql restart