<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
    <title>Reservations</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #4CAF50; color: white; }
        .logout { float: right; }
    </style>
</head>

<body>
<h1>Staff Portal</h1>

<p>Viewing all reservations:</p>

<table>
<tr><th>First Name</th><th>Last Name</th><th>Date</th><th>Time</th></tr>

<?php

$db_host   = "database-3.cuhonx0mb1xs.us-east-1.rds.amazonaws.com";
$db_name   = 'reservations';  
$db_user   = 'user1';    
$db_passwd = 'stella2002';  


$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

try {
    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = $pdo->query("SELECT * FROM bookings");

    while($row = $q->fetch(PDO::FETCH_ASSOC)){
      echo "<tr>
              <td>".htmlspecialchars($row["first_name"])."</td>
              <td>".htmlspecialchars($row["last_name"])."</td>
              <td>".htmlspecialchars($row["booking_date"])."</td>
              <td>".htmlspecialchars($row["booking_time"])."</td>
            </tr>\n";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

?>

</table>
</body>
</html>