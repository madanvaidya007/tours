<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to TravelKaro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        }

        body {
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .welcome-container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background-color: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 50px;
        }

        .welcome-message {
            color: white;
            margin-bottom: 20px;
        }

        .redirect-message {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .pulse-animation {
            animation: pulse 1.5s infinite;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    include '../connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];

            if ($password == $storedPassword) {
                $_SESSION['username'] = $username;
    ?>
    <div class="welcome-container">
        <div class="success-icon pulse-animation">✓</div>
        <h2 class="welcome-message">Login Successful!</h2>
        <p class="welcome-message">Welcome, <?php echo $_SESSION['username']; ?></p>
        <p class="redirect-message">You will be redirected to the dashboard shortly...</p>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = './dash.php';
        }, 3000);
    <?php
            } else {
                echo "<div class='welcome-container'><p class='text-danger'>Invalid username or password.</p></div>";
            }
        } else {
            echo "<div class='welcome-container'><p class='text-warning'>User Not Found</p></div>";
        }
        $con->close();
    ?>
    </script>
    <?php
        }
    ?>
</body>
</html>