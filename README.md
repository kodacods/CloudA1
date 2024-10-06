Stella Yan ID:6876840

# Stella's Tacoria

This application is designed to take reservations for Stella's Tacoria and also admin/staff access to view current bookings.

## Prerequisites

Virtual box and Vagrant must be installed to run the application.

## How to run

1. Clone the repository:

```
git clone https://github.com/kodacods/CloudA1.git
```

2. Open your terminal and navigate to the repo directory

3. Run command:

```
vagrant up
```

4. In your browser navigate to:

```
http://192.168.2.11/website.php
```

## Application design

In the application there are three virtual machines running, one for the user facing web interface, staff portal and database. When a customer makes a reservation through the Public Server (insert.php), it connects to the Database Server at 192.168.2.13 using specific credentials to insert the reservation into the 'bookings' table. Similarly, when a staff member logs in through the Staff Server, it uses the same credentials to verify the user login details against the users in the database and proceeds to display all bookings from the 'bookings' table if successful. The public reservation page on the Public Server includes a link to the Staff Portal, which redirects users to the login page on the Staff Server (http://192.168.2.12/login.php).

Username: staff
Password: staffpass

# AWS Deployment

If you do not wish to use vagrant you can deploy the application on AWS cloud instead. Below are the following steps to get you set up!

## Deploy EC2 Instances

Log into AWS and launch a EC2 instance to host the user-facing server as well as another EC2 instance to host the staff functionality (ensure that they are part of the same security/VPC group). SSH into the user facing instance and install the following packages:

1. Apache HTTP Server (httpd)
2. Mysql-client
3. PHP 8.x
   
Next SSH into the staff instance and download the following packages:

1. Apache HTTP Server (httpd)
2. Mysql-client & MySQLi 
3. PHP 8.x
4. AWS client
5. Cron

Remember run start httpd in each instance after SSHing before proceeding to the public DNS!

## Database set-up

In AWS create a RDS database and connect it to both the EC2 instances. In the staff instance, connect to the database and create coressponding mysql tables and `reservations` database.

## Migrate repo files into EC2

In your local terminal copy the repo files into both the EC2 instances using scp:

`scp -i /path/to/your/key.pem -r /path/to/CloudA1 ec2-user@your-ec2-public-ip:/home/ec2-user/`

Now that the files are on the EC2 instance, you can copy them to the /var/www/html/ directory:

`sudo cp -r /home/ec2-user/CloudA1/public/* /var/www/html/`

Note that because we are manually deploying the application we don't need all the files. Moving the `www` folder into the staff instance and the `public` folder into the user instance will suffice. If you wish to make changes to these files you could either directly edit the files using nano or copy the edited files from Vscode into the corresponding EC2 instance like above.

## S3 set-up

If you would like repo backups create a S3 bucket and ssh into the staff server and set up a cron task to automate the back ups using the backup-script.sh file. You can modify the frequency to your desired amount.
   

   
