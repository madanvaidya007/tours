<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelKaro - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%);
            --secondary-gradient: linear-gradient(to right, #8e2de2, #4a00e0);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: var(--primary-gradient);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1000px;
        }

        .login-wrapper {
            width: 400px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            transform: rotateX(15deg) rotateY(-15deg);
            transition: all 0.5s ease;
        }

        .login-wrapper:hover {
            transform: rotateX(0) rotateY(0);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid white;
            object-fit: cover;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.1) rotate(360deg);
        }

        .login-title {
            color: white;
            text-align: center;
            font-weight: 600;
            letter-spacing: 1px;
            margin-top: 15px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            padding: 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
            outline: none;
        }

        .form-label {
            color: white;
            opacity: 0.8;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .login-btn {
            background: var(--secondary-gradient);
            border: none;
            color: white;
            padding: 12px 25px;
            border-radius: 10px;
            width: 100%;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.4s ease;
        }

        .login-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="logo-container">
            <img src="../img/logo.png" alt="TravelKaro Logo" class="logo pulse-animation">
            <h2 class="login-title">TravelKaro</h2>
        </div>
        <form action="welcome.php" method="POST">
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="login-btn" name="submit">Log In</button>
        </form>
    </div>
</body>
</html>