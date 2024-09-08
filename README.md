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

## Note (important!)

I could not get the login feature to work fully, to login into the staff portal you must navigate to:

```
192.168.2.12\update_password.php
```

This is to make sure the password hashing/verification works and that you can login with the default staff account:

```
Username: staff
Password: staffpass
```
