# Set up variables
RDS_ENDPOINT="database-1.cuhonx0mb1xs.us-east-1.rds.amazonaws.com"
RDS_USERNAME="user1"
RDS_PASSWORD="stella2002"
DATABASE="database-1"

# Create database and user
echo "CREATE DATABASE IF NOT EXISTS $DATABASE;" | mysql -h $RDS_ENDPOINT -u $RDS_USERNAME -p$RDS_PASSWORD
echo "CREATE USER IF NOT EXISTS 'user1'@'%' IDENTIFIED BY '$RDS_PASSWORD';" | mysql -h $RDS_ENDPOINT -u $RDS_USERNAME -p$RDS_PASSWORD
echo "GRANT ALL PRIVILEGES ON $DATABASE.* TO 'user1'@'%';" | mysql -h $RDS_ENDPOINT -u $RDS_USERNAME -p$RDS_PASSWORD

  
cat /home/ec2-user/setup-database.sql | mysql -h $RDS_ENDPOINT -u $RDS_USERNAME -p$RDS_PASSWORD $DATABASE
