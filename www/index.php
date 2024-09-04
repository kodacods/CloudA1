<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Reservations</title></head>

<body>
<h1>Staff Portal</h1>

<p>Viewing all reservations:</p>

<table >
<tr><th>First Name</th><th>Last Name</th></tr>

<?php
 
$db_host   = '192.168.2.13';
$db_name   = 'reservations';  
$db_user   = 'user1';    
$db_passwd = 'password';  

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM bookings");

while($row = $q->fetch()){
  echo "<tr>
          <td>".$row["first_name"]."</td>
          <td>".$row["last_name"]."</td>
        </tr>\n";
}

?>
</table>
</body>
</html>