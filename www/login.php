<?php
error_log("Script started");
session_start();
error_log("Session started");

// If already logged in, redirect to index.php
if (isset($_SESSION['user_id'])) {
    error_log("User already logged in, redirecting to index.php");
    header("Location: index.php");
    exit();
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_log("Form submitted via POST");
    $db_host   = '192.168.2.13';
    $db_name   = 'reservations';
    $db_user   = 'user1';
    $db_passwd = 'password';

    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

    try {
        error_log("Attempting database connection");
        $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        error_log("Database connection successful");

        $username = $_POST['username'];
        $password = $_POST['password'];

        error_log("Attempting login with username: " . $username);
        error_log("Password length: " . strlen($password));

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        error_log("User found: " . ($user ? "Yes" : "No"));

        if ($user) {
            error_log("Attempting to verify password for user: " . $username);
            error_log("Input password: " . $password);
            error_log("Stored hash: " . $user['password']);
            $passwordVerified = password_verify($password, $user['password']);
            error_log("password_verify() result: " . var_export($passwordVerified, true));
            if ($passwordVerified) {
                error_log("Login successful for user: " . $username);
                $_SESSION['user_id'] = $user['id'];
                error_log("Session created with user_id: " . $user['id']);
                header("Location: index.php");
                exit();
            } else {
                error_log("Password verification failed for user: " . $username);
                error_log("Password hash info: " . print_r(password_get_info($user['password']), true));
                $error = "Invalid username or password";
            }
        } else {
            error_log("User not found: " . $username);
            $error = "Invalid username or password";
        }
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        $error = "Database error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Staff Login</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { width: 300px; margin: 100px auto; padding: 20px; background-color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #333; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"] { width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
        .error { color: red; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Staff Login</h1>
        <?php 
        if ($error) {
            error_log("Displaying error message to user: " . $error);
            echo "<p class='error'>$error</p>";
        }
        ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>