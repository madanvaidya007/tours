<?php
require_once 'config.php';
session_start();

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index1.php");
}

$email = $_POST['email'];
$password = $_POST['password'];

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email format');
}

// Check if user exists in the database
$sql = "SELECT * FROM customers WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die('User not found');
}

$user = $result->fetch_assoc();

// Verify password
if (!password_verify($password, $user['password'])) {
    die('Invalid password');
}

// Set session variables
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];

// Redirect to index.php
header("Location: index1.php");

$stmt->close();
$conn->close();
?>