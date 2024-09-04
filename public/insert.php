<?php 
        /* connect to databse */
        $link = mysqli_connect('192.168.2.13', 'user1', 'password', 'reservations');

        /* check database connection */
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        /* declare parameters */
        $first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
        $last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);

        /* insert information from index to database */
        $sql = "INSERT INTO bookings (first_name, last_name) VALUES ('$first_name', '$last_name')";
        if(mysqli_query($link, $sql)){
            echo "Your reservation has been successfully submitted!</br>";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        
        mysqli_close($link);
?>

<a class="currentBookings" href="http://192.168.2.11"> Make another reservation</a>