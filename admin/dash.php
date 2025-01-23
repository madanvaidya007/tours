<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'connection.php';
$total_clients = mysqli_num_rows(mysqli_query($con, "SELECT * FROM clients"));
$latest_package = mysqli_fetch_assoc(mysqli_query($con, "SELECT `Package-Name`, COUNT(*) as package_count FROM clients GROUP BY `Package-Name` ORDER BY package_count DESC LIMIT 1"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TravelKaro - Advanced Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            --secondary-gradient: linear-gradient(to right, #8e2de2, #4a00e0);
            --card-background: rgba(255,255,255,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f0f2f5;
            font-family: 'Inter', sans-serif;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 20px;
            padding: 20px;
        }

        .sidebar {
            background: var(--secondary-gradient);
            border-radius: 15px;
            padding: 25px;
            color: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .dashboard-card {
            background: var(--card-background);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            display: flex;
            align-items: center;
            color: white;
            transition: transform 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-10px);
        }

        .content-section {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255,255,255,0.3);
        }

        .table-responsive {
            max-height: 500px;
            overflow-y: auto;
        }

        @media (max-width: 1024px) {
            .dashboard-grid, .dashboard-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body style="background: var(--primary-gradient);">
    <div class="container-fluid">
        <div class="row">
            <div class="dashboard-grid">
                <div class="sidebar text-center">
                    <img src="../img/logo.png" class="profile-image mb-3" alt="TravelKaro Logo">
                    <h3>TravelKaro</h3>
                    <p class="text-white-50">Admin Dashboard</p>
                    
                    <div class="mt-4">
                        <a href="../index.html" class="btn btn-outline-light w-100 mb-2">
                            <i class="bi bi-house me-2"></i>Home
                        </a>
                        <a href="logout.php" class="btn btn-outline-light w-100">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </a>
                    </div>
                    
                    <div class="mt-5">
                        <small class="text-white-50">
                            Designed by Madan Vaidya
                        </small>
                    </div>
                </div>

                <div>
                    <div class="dashboard-cards">
                        <div class="dashboard-card">
                            <div>
                                <h4>Total Clients</h4>
                                <h2><?php echo $total_clients; ?></h2>
                            </div>
                            <i class="bi bi-people ms-auto fs-2"></i>
                        </div>
                        <div class="dashboard-card">
                            <div>
                                <h4>Popular Package</h4>
                                <h2><?php echo $latest_package['Package-Name']; ?></h2>
                            </div>
                            <i class="bi bi-star ms-auto fs-2"></i>
                        </div>
                        <div class="dashboard-card">
                            <div>
                                <h4>Recent Bookings</h4>
                                <h2><?php echo date('M Y'); ?></h2>
                            </div>
                            <i class="bi bi-calendar-check ms-auto fs-2"></i>
                        </div>
                    </div>

                    <div class="content-section">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Client List</h2>
                            <div class="btn-group">
                                <a href="deleteall.php" class="btn btn-danger">
                                    <i class="bi bi-trash me-2"></i>Delete All
                                </a>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Package</th>
                                        <th>Arrival</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM clients ORDER BY id DESC LIMIT 50";
                                    $result = $con->query($sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '
                                        <tr>
                                            <td>' . $row['id'] . '</td>
                                            <td>' . $row['Name'] . '</td>
                                            <td>' . $row['Email'] . '</td>
                                            <td>' . $row['Package-Name'] . '</td>
                                            <td>' . $row['Arrival'] . '</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-danger btn-sm" href="delete.php?id=' . $row['id'] . '">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>