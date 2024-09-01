  apt-get update
  
  #ROOT PASSWORD
  export MYSQL_PWD='password'
  
  echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
  echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections
  
  apt-get -y install mysql-server
  
  echo "CREATE DATABASE IF NOT EXISTS reservations;" | mysql
  echo "CREATE USER IF NOT EXISTS 'user1'@'%' IDENTIFIED BY 'password';" | mysql  
  echo "GRANT ALL PRIVILEGES ON reservations.* TO 'user1'@'%'" | mysql
  
    cat /vagrant/setup-database.sql | mysql -u user1 reservations

  #Update MySQL to allow remote connections.
  sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf
  
  service mysql restart

  
