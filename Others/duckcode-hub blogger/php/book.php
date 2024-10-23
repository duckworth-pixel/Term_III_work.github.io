<?php
$errors = [];
$success = '';

// Initialize variables to avoid undefined variable warnings
$name = $email = $phone = $address = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    // Validate required fields
    if (empty($name)) {
        $errors['name'] = 'Name is required.';
    }
    if (empty($email)) {
        $errors['email'] = 'Email is required.';
    }
    if (empty($phone)) {
        $errors['phone'] = 'Phone number is required.';
    }
    if (empty($address)) {
        $errors['address'] = 'Address is required.';
    }

    // Validate email format and uniqueness
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format.';
    } else {
        $connection = mysqli_connect('localhost', 'root', '', 'book_db');
        if (!$connection) {
            die('Connection failed: ' . mysqli_connect_error());
        }
        $email = mysqli_real_escape_string($connection, $email);
        $result = mysqli_query($connection, "SELECT * FROM users_tbl WHERE email='$email'");
        if (mysqli_num_rows($result) > 0) {
            $errors['email'] = 'Email is already used. Please use a different email.';
        }
        mysqli_close($connection);
    }

    // Validate phone number
    if (!preg_match('/^\+254[1-9][0-9]{8}$/', $phone)) {
        $errors['phone'] = 'Invalid phone number. It must start with +254 and cannot have 0 immediately after the country code.';
    }

    // If there are no errors, proceed with insertion
    if (empty($errors)) {
        $connection = mysqli_connect('localhost', 'root', '', 'book_db');
        if (!$connection) {
            die('Connection failed: ' . mysqli_connect_error());
        }
        $name = mysqli_real_escape_string($connection, $name);
        $email = mysqli_real_escape_string($connection, $email);
        $phone = mysqli_real_escape_string($connection, $phone);
        $address = mysqli_real_escape_string($connection, $address);

        $query = "INSERT INTO users_tbl (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
        if (mysqli_query($connection, $query)) {
            $success = 'Your details have been submitted successfully!';
        } else {
            $errors['general'] = 'Error: ' . mysqli_error($connection);
        }
        mysqli_close($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- swiper css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- fontawesome cdn links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- my custom css -->
    <link rel="stylesheet" href="./css/styles.css">
    <title>home</title>
</head>
<body>

<!-- header starts -->
<section class="header">
    <a href="home.php" class="logo"><img src="./images/duckcodelogo.jpg" alt="duckcodelogo" height="50px" width="50px" style="border-radius: 50%;"></a>
    <nav class="navbar">
        <a href="home.php">home</a>
        <a href="about.php">about</a>
        <a href="package.php">package</a>
        <a href="book.php">book</a>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
</section>
<!-- header ends -->

<div class="heading" style="background: url('./images/th (2).jpeg') no-repeat">
    <h1>Book now</h1>
</div>

<!-- booking section starts here -->
<section class="booking">
    <h1 class="heading-title">Reserve Your Spot and Showcase Your Business Today!</h1>
    <form action="book.php" method="POST" class="book-form">
        <div class="flex">
            <div class="inputBox">
                <span>name:</span>
                <input type="text" placeholder="enter your name" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>">
                <span id="name-error" style="color: red;"><?php echo $errors['name'] ?? ''; ?></span>
            </div>
            <div class="inputBox">
                <span>email:</span>
                <input type="email" placeholder="enter your email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
                <span id="email-error" style="color: red;"><?php echo $errors['email'] ?? ''; ?></span>
            </div>
            <div class="inputBox">
                <span>phone number:</span>
                <input type="text" placeholder="enter your phone number" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>" onfocus="prependCountryCode()">
                <span id="phone-error" style="color: red;"><?php echo $errors['phone'] ?? ''; ?></span>
            </div>
            <div class="inputBox">
                <span>address:</span>
                <input type="text" placeholder="enter your address" name="address" id="address" value="<?php echo htmlspecialchars($address); ?>">
                <span id="address-error" style="color: red;"><?php echo $errors['address'] ?? ''; ?></span>
            </div>
        </div>
        <input type="submit" value="submit" class="btn" name="send">
        <?php if ($success): ?>
            <p style="color: green;"><?php echo $success; ?></p>
        <?php endif; ?>
        <?php if (isset($errors['general'])): ?>
            <p style="color: red;"><?php echo $errors['general']; ?></p>
        <?php endif; ?>
    </form>
</section>
<!-- booking ends here -->

<!-- footer section starts here -->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
            <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i>about</a>
            <a href="book.php"><i class="fas fa-angle-right"></i>book</a>
            <a href="package.php"><i class="fas fa-angle-right"></i>package</a>
        </div>
        <div class="box">
            <h3> extra links </h3>
            <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
            <a href="#"><i class="fas fa-angle-right"></i>privacy policy</a>
            <a href="#"><i class="fas fa-angle-right"></i>terms of use</a>
        </div>
        <div class="box">
            <h3> contact info </h3>
            <a href="#"> <i class="fas fa-phone"></i><br> +254 111 531 686</a>
            <a href="#"><i class="fas fa-envelope"></i><br>duckcodes671@gmail.com</a>
            <a href="#"><i class="fas fa-map"></i><br>Virtual office,Nairobi - Kenya</a>
        </div>
        <div class="box">
            <h3> follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i><br>facebook</a>
            <a href="#"> <i class="fab fa-instagram"></i><br>instagram</a>
            <a href="#"> <i class="fab fa-twitter"></i><br>twitter</a>
            <a href="#"> <i class="fab fa-linkedin"></i><br>linkedin</a>
        </div>
    </div>
    <div class="credit"> &copy; 2024 || <span>duckcode-hub&reg;</span> || all rights reserved.<br>Sponsored by Kenswed Org.</div> 
</section>
<!-- footer section ends here -->

<!-- swiper js -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- custom js -->
<script src="./js/app.js"></script>
</body>
</html>
