<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stella's Tacoria 🌮</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #e8f5e9; /* Light green background */
        }
        header {
            background-color: #2e7d32; /* Dark green */
            color: #fff;
            text-align: center;
            padding: 1rem;
        }
        nav {
            background-color: #388e3c; /* Medium green */
            color: #fff;
            padding: 0.5rem;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
        }
        .btn {
            display: inline-block;
            background: #2e7d32; /* Dark green */
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Stella's Tacoria</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>Welcome to Stella's Tacoria</h2>
        <p>Experience the finest Mexican cuisine in town!</p>
        <a href="/index.php" class="btn">Make a Reservation</a>
    </div>
    <div class="container" id="menu">
        <h2>Our Menu</h2>
        <p>Check out our delicious tacos, burritos, and more!</p>
        <p> We only sell tacos, no need for menus folks! </p>
    </div>
    <div class="container" id="about">
        <h2>About Us</h2>
        <p>Stella's Tacoria has been serving authentic Mexican food since 2010.</p>
    </div>
    <div class="container" id="contact">
        <h2>Contact Us</h2>
        <p>Phone: (123) 456-7890</p>
        <p>Email: info@stellasTacoria.com</p>
        <p>Address: 123 Taco Street, Foodville, QT 12345</p>
    </div>
</body>
</html>