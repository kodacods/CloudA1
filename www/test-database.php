<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Database test page</title>
<style>
th { text-align: left; }

table, th, td {
  border: 2px solid grey;
  border-collapse: collapse;
}

th, td {
  padding: 0.2em;
}
</style>
</head>

<body>
<h1>Database test page</h1>

<p>Showing contents of reservations table:</p>

<table border="1">
<tr><th>Reservation ID</th><th>Customer ID</th><th>Table ID</th><th>Date</th><th>Time</th><th>Party Size</th><th>Special Requests</th></tr>

<?php
 
$db_host   = '192.168.56.12';
$db_name   = 'bookings';  
$db_user   = 'user1';    
$db_passwd = 'password1234';  

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM reservations");

while($row = $q->fetch()){
  echo "<tr>
          <td>".$row["reservation_id"]."</td>
          <td>".$row["customer_id"]."</td>
          <td>".$row["table_id"]."</td>
          <td>".$row["reservation_date"]."</td>
          <td>".$row["reservation_time"]."</td>
          <td>".$row["party_size"]."</td>
          <td>".$row["special_requests"]."</td>
        </tr>\n";
}

?>
</table>
</body>
</html>