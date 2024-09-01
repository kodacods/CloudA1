apt-get update
  

  #ROOT PASSWORD
  export MYSQL_PWD='password'
  
  echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
  echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections
  
  apt-get -y install mysql-server
  
  echo "CREATE DATABASE bookings;" | mysql
  echo "CREATE USER 'originuser'@'%' IDENTIFIED BY 'password1';" | mysql
  echo "GRANT ALL PRIVILEGES ON bookings.* TO 'originuser'@'%'" | mysql
  
  export MYSQL_PWD='password1234'
  
  cat /vagrant/setup-database.sql | mysql -u originuser reservations

 #Update MySQL to allow remote connections.
  sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf
  
  service mysql restart