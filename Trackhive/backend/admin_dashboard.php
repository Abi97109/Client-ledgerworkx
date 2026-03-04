<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../frontend/signinup.html?msg=Access+denied");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">c
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f7fa;
            margin: 0;
        }

        header {
            background: #243B55;
            color: white;
            padding: 20px;
            text-align: center;
        }

        main {
            padding: 40px;
        }

        h1 {
            color: #3b82f6;
        }

        .welcome {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .logout-btn {
            background: #f43f5e;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #e11d48;
        }
    </style>
</head>

<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <main>
        <div class="welcome">
            Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! You are logged in as <strong>Admin</strong>.
        </div>
        <p>Here you can manage users, view reports, and control application settings.</p>
        <form action="logout.php" method="post">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </main>
</body>

</html>