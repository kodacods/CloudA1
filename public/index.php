<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stella's Tacoria - Reservation</title>
        <link rel="stylesheet" href="style.css">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background-color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }

            h1 {
                text-align: center;
                color: #333;
            }

            a.currentBookings {
                display: inline-block;
                margin-bottom: 20px;
                font-size: 14px;
                color: #007bff;
                text-decoration: none;
                font-weight: bold;
            }

            a.currentBookings:hover {
                text-decoration: underline;
            }

            form {
                display: flex;
                flex-direction: column;
            }

            label {
                font-size: 14px;
                margin-bottom: 8px;
                color: #333;
            }

            input[type="text"] {
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 14px;
            }

            input[type="submit"] {
                padding: 12px;
                background-color: #28a745;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }

            input[type="submit"]:hover {
                background-color: #218838;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>Make a Reservation</h1>
            
            <!-- Link to current bookings (Staff Portal) -->
            <a class="currentBookings" href="http://192.168.2.12">
                <button type="button">Staff Portal</button>
            </a>
            <!-- Reservation form -->
            <form method="post" action="insert.php" class="inputForm">  
                <label for="first_name">First Name:</label>
                <input class="submitBooking" type="text" name="first_name" placeholder="e.g. Jane" required>

                <label for="last_name">Last Name:</label>
                <input class="submitBooking" type="text" name="last_name" placeholder="e.g. Doe" required>

                <input class="bookingSubmit" type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
