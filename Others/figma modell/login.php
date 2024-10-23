<?php
// Start session at the top
session_start();

// Database connection
$servername = "localhost";  // or your DB server
$usernameDB = "root";       // your MySQL username
$passwordDB = "";           // your MySQL password
$dbname = "login_system";    // your database name

// Create a connection
$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate form data
    if (empty($username) || empty($password)) {
        $error = "Please fill in both fields.";
    } else {
        // Prepare SQL query to fetch user data
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // If the user exists
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            
            // Verify password
            if (password_verify($password, $row['password'])) {
                // Password is correct, create a session for the user
                $_SESSION['username'] = $username;
                header("Location: login.php");  // Redirect to the same page (could also go to a dashboard)
                exit();
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "No user found with that username.";
        }

        $stmt->close();
    }
}

// Logout handler
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* General styling for the whole page */
        body {
            margin: 0;
            padding: 0;
            font-family: 'M PLUS 2', sans-serif;
            background-color: #FFFFFF;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

        /* Login form container */
        .login-container {
            border: 1px solid #B9B9B9;
            border-radius: 5px;
            padding: 20px;
            background-color: #FFFFFF;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        /* Title: LOGIN */
        .login-title {
            font-size: 36px;
            margin-bottom: 20px;
            color: #252525;
            text-align: center;
        }

        /* Input boxes */
        .input-box {
            position: relative;
            margin-bottom: 20px;
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #B9B9B9;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }

        .input-box label {
            position: absolute;
            left: 10px;
            top: 10px;
            color: #808080;
            transition: all 0.2s ease;
        }

        .input-box input:focus + label,
        .input-box input:not(:placeholder-shown) + label {
            top: -10px;
            font-size: 12px;
            color: #252525;
        }

        /* Login button */
        .login-button {
            width: 100%;
            height: 48px;
            background: #9AE9FF;
            border-radius: 5px;
            border: none;
            font-size: 18px;
            color: #252525;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-button:hover {
            background: #82d1e5;
        }

        .error-message {
            color: red;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Show different content if logged in -->
        <?php if (isset($_SESSION['username'])): ?>
            <div class="success-message">
                <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
                <p>You are now logged in.</p>
                <a href="login.php?logout=true" class="login-button">Logout</a>
            </div>
        <?php else: ?>
            <!-- Login title -->
            <div class="login-title">LOGIN</div>

            <!-- Display error message if there's any -->
            <?php if (isset($error)): ?>
                <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <!-- Login form -->
            <form action="login.php" method="post">
                <div class="input-box">
                    <input type="text" name="username" id="username" placeholder=" " required />
                    <label for="username">Username</label>
                </div>

                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder=" " required />
                    <label for="password">Password</label>
                </div>

                <button type="submit" class="login-button">LOGIN</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
