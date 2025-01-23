<!DOCTYPE html>
<html lang="en">
<?php
require_once 'config.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit(); // Important to stop script execution after redirect
}

// Initialize user data to prevent undefined variable
$user = ['name' => 'Guest']; // Default fallback

// Fetch user data
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM customers WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Update user data if found
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
}
?>
<head>

    <meta charset="utf-8">
    <title>TravelKaro - Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #df3908;
            --secondary-color: #007bff;
            --bg-light: #f8f9fa;
            --text-dark: #333;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, var(--bg-light) 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            color: var(--primary-color);
            font-weight: bold;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .dashboard-container {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .dashboard-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            padding: 3rem;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .welcome-title {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .dashboard-actions {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
        }

        .btn-book {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-book:hover {
            background-color: #0056b3;
        }

        .btn-logout {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-logout:hover {
            background-color: #ff5722;
        }

        .user-stats {
            margin-top: 1.5rem;
            background-color: #f1f3f5;
            padding: 1rem;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="index.html" class="navbar-brand">
            <img src="img/logo.png" alt="TravelKaro Logo">
            TravelKaro
        </a>
    </nav>

    <div class="dashboard-container">
        <div class="dashboard-card">
            <h2 class="welcome-title">Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
            
            <div class="dashboard-actions">
                <a href="index.html#package" class="btn btn-book">Book Your Next Adventure</a>
                <a href="logout.php" class="btn btn-logout">Logout</a>
            </div>

            <div class="user-stats">
                <h3>Your Travel Profile</h3>
                <p>Total Trips: 0</p>
                <p>Upcoming Bookings: 0</p>
            </div>
        </div>
    </div>
</body>
</html>