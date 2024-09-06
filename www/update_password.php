<?php
$db_host   = '192.168.2.13';
$db_name   = 'reservations';
$db_user   = 'user1';
$db_passwd = 'password';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

try {
    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = 'staff';
    $new_password = 'staffpass';

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE username = ?");
    $result = $stmt->execute([$hashed_password, $username]);

    echo "Password update attempt completed.<br>";
    echo "Result: " . ($result ? "Success" : "Failure") . "<br>";
    echo "New hash: " . $hashed_password . "<br>";

    // Verify the update
    $verify_stmt = $pdo->prepare("SELECT password FROM users WHERE username = ?");
    $verify_stmt->execute([$username]);
    $stored_hash = $verify_stmt->fetchColumn();

    echo "Stored hash after update: " . $stored_hash . "<br>";
    echo "Hashes match: " . ($hashed_password === $stored_hash ? "Yes" : "No") . "<br>";

    // Verify the password works
    echo "Password verification test: " . (password_verify($new_password, $stored_hash) ? "Success" : "Failure");

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>