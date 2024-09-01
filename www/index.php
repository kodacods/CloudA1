<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
    <title>Welcome to My Restaurant Booking System</title>
</head>
<body>
    <h1>Welcome to My Restaurant Booking System</h1>
    
    <?php

    $currentDate = date("Y-m-d");
    $currentTime = date("H:i:s");
    ?>

    <p>Current Date: <?php echo $currentDate; ?></p>
    <p>Current Time: <?php echo $currentTime; ?></p>

    <p>meow <a href="test-database.php">purrr</a> (Click to view reservations)</p>

    <?php
    ?>

</body>
</html>