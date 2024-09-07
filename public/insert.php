<?php 
$link = mysqli_connect('192.168.2.13', 'user1', 'password', 'reservations');

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$booking_date = mysqli_real_escape_string($link, $_REQUEST['date']);
$booking_time = mysqli_real_escape_string($link, $_REQUEST['time']);

$current_date = date('Y-m-d');
$min_time = '09:00:00';
$max_time = '22:00:00';

if ($booking_date < $current_date) {
    die("Error: Booking date cannot be in the past.");
}

if ($booking_time < $min_time || $booking_time > $max_time) {
    die("Error: Booking time must be between 9:00 AM and 10:00 PM.");
}

$sql = "INSERT INTO bookings (first_name, last_name, booking_date, booking_time) 
        VALUES ('$first_name', '$last_name', '$booking_date', '$booking_time')";

if(mysqli_query($link, $sql)){
    echo "Your reservation has been successfully submitted!</br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>

<a class="currentBookings" href="http://192.168.2.11"> Make another reservation</a>