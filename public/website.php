<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stella's Tacoria - Reservation</title>
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

        .button-container {
            text-align: right;
            margin-bottom: 20px;
        }

        .staff-portal-btn {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }

        .staff-portal-btn:hover {
            background-color: #0056b3;
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

        input[type="text"],
        input[type="date"],
        input[type="time"] {
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
        
        <div class="button-container">
            <a href="http://ec2-3-92-211-67.compute-1.amazonaws.com/index.php" class="staff-portal-btn">Staff Portal</a>
        </div>

        <form method="post" action="insert.php" class="inputForm">  
            <label for="first_name">First Name:</label>
            <input class="submitBooking" type="text" id="first_name" name="first_name" placeholder="e.g. Jane" required>

            <label for="last_name">Last Name:</label>
            <input class="submitBooking" type="text" id="last_name" name="last_name" placeholder="e.g. Doe" required>

            <label for="date">Date:</label>
            <input class="submitBooking" type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <input class="submitBooking" type="time" id="time" name="time" required>
            
            <input class="bookingSubmit" type="submit" value="Submit">
        </form>
    </div>

    <script>
        // Set minimum date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date').setAttribute('min', today);

        function validateForm() {
            const dateInput = document.getElementById('date');
            const timeInput = document.getElementById('time');

            // Validate date
            const selectedDate = new Date(dateInput.value);
            const currentDate = new Date();
            currentDate.setHours(0, 0, 0, 0);

            if (selectedDate < currentDate) {
                alert("Please select a date from today onwards.");
                return false;
            }

            // Validate time
            const selectedTime = timeInput.value;
            const [hours, minutes] = selectedTime.split(':');
            const selectedDateTime = new Date(selectedDate);
            selectedDateTime.setHours(hours, minutes);

            const openingTime = new Date(selectedDate);
            openingTime.setHours(9, 0);

            const closingTime = new Date(selectedDate);
            closingTime.setHours(22, 0);

            if (selectedDateTime < openingTime || selectedDateTime > closingTime) {
                alert("Please select a time between 9:00 AM and 10:00 PM.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>